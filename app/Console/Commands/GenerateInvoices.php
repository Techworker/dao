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
        $contracts = Contract::whereStatus(Contract::STATUS_ACTIVE)->get();

        /** @var Contract $contract */
        foreach($contracts as $contract) {
            switch($contract->type) {
                //case Contract::TYPES
            }
        }
    }
}
