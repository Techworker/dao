<?php

namespace App\Console\Commands;

use App\Contract;
use Illuminate\Console\Command;

class GenerateInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dao:invoices';

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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // we fetch all active contracts
        $contracts = Contract::currentStatus(Contract::STATUS_ACTIVE)->get();

        /** @var Contract $contract */
        foreach($contracts as $contract) {
            switch($contract->payout_type)
            {
                case Contract::PAYOUT_TYPE_ONCE:
                    // create a single invoice
                    break;
                case Contract::PAYOUT_TYPE_DAILY:
                    // create a single invoices
                    break;
                case Contract::PAYOUT_TYPE_WEEKLY:
                    // create a single invoices
                    break;
                case Contract::PAYOUT_TYPE_MONTHLY:
                    // create a single invoices
                    break;
                case Contract::PAYOUT_TYPE_YEARLY:
                    // create a single invoices
                    break;
            }

            switch($contract->type) {
                case Contract::TYPE_SALARY:
                    // take amount of contract
                case Contract::TYPE_FIXED_PRICE:
                    // take amount of contract
                case Contract::TYPE_PAY_PER_DELIVERABLE:
                    // take amount of contract
                case Contract::TYPE_PAY_PER_HOUR:
                    // take amount of contract
            }
        }
    }
}
