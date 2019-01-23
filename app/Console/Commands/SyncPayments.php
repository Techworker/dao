<?php

namespace App\Console\Commands;

use App\Contract;
use App\FoundationPayment;
use App\Payment;
use Illuminate\Console\Command;
use Illuminate\Foundation\Application;

class SyncPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dao:sync-payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function rpc($node, string $method, array $params = [])
    {
        static $id = 0;

        $rpc = [
            'id' => $id++,
            'jsonrpc' => '2.0',
            'method' => $method,
            'params' => $params,
        ];

        $ch = curl_init($node);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($rpc));

        $response = curl_exec($ch);
        \curl_close($ch);
        if ($response === false) {
            die('Unable to connect to ' . NODE_ENDPOINT);
        }

        $result = json_decode($response, true);
        if(isset($result['result'])) {
            return $result['result'];
        }

        if(isset($result['error'])) {
            throw new \Exception($result['error']['message'], $result['error']['code']);
        }

        die('Invalid result: ' . print_r($result, true));
    }

    private function getAccountOperations($node, $account, $opTypes = null, $untilBlock = 0)
    {
        $start = 0;
        $allOps = [];
        do {
            $ops = $this->rpc($node, 'getaccountoperations', [
                'account' => $account,
                'depth' => 500000,
                'start' => $start,
                'max' => 100
            ]);
            $newOps = [];
            if($opTypes === null) {
                $newOps = $ops;
            } else {
                foreach($ops as $op) {
                    if(in_array($op['optype'], $opTypes)) {
                        $newOps[] = $op;
                    }
                }
            }
            $allOps = array_merge($allOps, $newOps);
            foreach($newOps as $newOp) {
                if ($newOp['block'] < $untilBlock) {
                    return $allOps;
                }
            }
            $start += 100;

            if($start % 1000 === 0) {
                echo 'gao: ' . $start . "\n";
            }
            if($start % 15000 === 0) {
                echo "sleeping..";
                sleep(10);
            }

        } while(count($ops) > 0 && count($ops) === 100);

        return $allOps;

    }


    /**
     * Transforms a string to a HexaString.
     *
     * @param string $str
     * @return string
     */
    function fromHexaString(string $hexa): string
    {
        $ascii = '';
        $length = \strlen($hexa);
        for ($position = 0; $position < $length; $position += 2) {
            $ascii .= \chr(\hexdec(\substr($hexa, $position, 2)));
        }

        return $ascii;

    }

    function decryptPayload($node, $payload) {
        $decrypted = $this->fromHexaString($payload);
        $readable = true;
        for($i = 0; $i < strlen($decrypted); $i++) {
            if(ord($decrypted[$i]) < 32 || ord($decrypted[$i]) > 127) {
                $readable = false;
            }
        }

        if($readable) {
            return $decrypted;
        }

        $data = $this->rpc($node, 'payloaddecrypt', ['payload' => $payload]);
        if($data['result'] === true) {
            return $data['unenc_payload'];
        }

        return 'enc';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach([1001, 1000, 1002] as $acc) {
            $latestPayment = FoundationPayment::where('from_pasa', $acc)->orderBy('time', 'DESC')->first();
            $block = 0;
            if($latestPayment !== null) {
                $block = $latestPayment->block - 1000;
            }

            $ops = $this->getAccountOperations('http://127.0.0.1:4003', $acc, [1], $block);
            foreach ($ops as $op)
            {
                $payment = FoundationPayment::whereOphash($op['ophash'])->first();
                if ($payment === null && $acc == $op['senders'][0]['account']) {
                    $payload = $this->decryptPayload('http://127.0.0.1:4003', $op['senders'][0]['payload']);
                    if ($payload === 'enc') {
                        $payload = $op['senders'][0]['payload'];
                    }
                    $payment = new FoundationPayment();
                    $payment->payload = $payload;
                    $payment->block = $op['block'];
                    $payment->from_pasa = $acc;
                    $payment->to_pasa = $op['receivers'][0]['account'];
                    $payment->amount = $op['receivers'][0]['amount'];
                    $payment->ophash = $op['ophash'];
                    $payment->time = $op['time'];
                    $payment->save();
                }

                if($payment !== null) {
                    $contracts = Contract::wherePasa($payment->to_pasa)->get();
                    foreach ($contracts as $contract) {
                        if ($contract->payload() === $payment->payload) {
                            $contract->payment_id = $payment->id;
                            $contract->save();
                        }
                    }
                }
            }
        }
    }
}
