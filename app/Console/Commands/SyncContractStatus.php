<?php

namespace App\Console\Commands;

use App\Contract;
use App\Proposal;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SyncContractStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dao:sync-contract-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncronizes the status of a contract with the runtime.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // these are status flags that are set manually
        // we cannot simply active such a contract again
        $allowed = [Contract::STATUS_INACTIVE, Contract::STATUS_ACTIVE, Contract::STATUS_FINISHED];

        /** @var Contract[] $contracts */
        $contracts = Contract::currentStatus($allowed)->get();
        foreach($contracts as $contract) {

            $now = Carbon::now()->setTime(0, 0, 0, 0);
            $newStatus = null;
            $msg = 'Contract should be %s, is %s. Current date: %s. Runtime: %s - %s. Setting contract ID %d';
            if ($contract->end !== null && $contract->end->lt($now)) {
                // contract finished (end date < current date)
                $newStatus = Contract::STATUS_FINISHED;
            } elseif ($contract->start->lte($now) && ($contract->end === null || $contract->end->gte($now))) {
                // start date of contract is today or past
                // and either no end date is given or the end date is in the future
                $newStatus = Contract::STATUS_ACTIVE;
            } elseif ($contract->start->gt($now)) {
                $newStatus = Contract::STATUS_INACTIVE;
            }

            if($newStatus === Contract::STATUS_ACTIVE) {
                $contract->proposal->setStatus(Proposal::STATUS_ACTIVATED, 'Activated contract.');
            } elseif($newStatus === Contract::STATUS_INACTIVE) {
                if($contract->proposal->contracts->count() === 1) {
                    $contract->proposal->setStatus(Proposal::STATUS_COMPLETED, 'Deactivated contract.');
                }
            }

            if ($newStatus !== null && $contract->latestStatus()->name !== $newStatus) {

                // we need to know what it's doing when it is doing it, so save a human
                // readable update
                $msg = sprintf($msg,
                    $newStatus,
                    $contract->latestStatus()->name,
                    $now->toDateString(),
                    $contract->start->toDateString(),
                    $contract->end ? $contract->end->toDateString() : 'forever',
                    $contract->id
                );

                $this->getOutput()->writeln($msg);
                $contract->setStatus($newStatus, $msg);
                $contract->save();
            }
        }
    }
}
