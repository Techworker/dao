<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'techworker';
        $user->email = 'benjaminansbach@gmail.com';
        $user->password = Hash::make('test123');
        $user->save();

        $contractor = new \App\Contractor();
        $contractor->user_id = $user->id;
        $contractor->type = \App\Contractor::TYPE_NATURAL_PERSON;
        $contractor->first_name = 'Benjamin';
        $contractor->last_name = 'Ansbach';
        $contractor->company_name = 'Techworker GmbH';
        $contractor->pasa = "6780-11";
        $contractor->save();
        $contractor->setStatus(\App\Contractor::STATUS_APPROVED, 'seed');

        $address = new \App\Address();
        $address->contractor_id = $contractor->id;
        $address->street = 'Talweg';
        $address->house_number = '9';
        $address->postal_code = '23558';
        $address->city = 'Lübeck';
        $address->country = 'DE';
        $address->save();

        $cdPhone = new \App\ContactDetail();
        $cdPhone->contractor_id = $contractor->id;
        $cdPhone->type = \App\ContactDetail::TYPE_PHONE;
        $cdPhone->value = '+49 177 830 1250';
        $cdPhone->save();

        $cdEmail = new \App\ContactDetail();
        $cdEmail->contractor_id = $contractor->id;
        $cdEmail->type = \App\ContactDetail::TYPE_EMAIL;
        $cdEmail->value = 'benjaminansbach@gmail.com';
        $cdEmail->save();

        $proposal = new \App\Proposal();
        $proposal->proposer_contractor_id = $contractor->id;
        $proposal->title = 'PHP Library';
        $proposal->description = 'A library to..';
        $proposal->website = 'https://www.techworker.io';
        $proposal->source_code = 'https://github.com/techworker';
        $proposal->proposed_value = 10000;
        $proposal->proposed_currency = 'PASC_molina';
        $proposal->save();

        $proposal->setStatus(\App\Proposal::STATUS_SUBMITTED, 'seed');

        $contract = new \App\Contract();
        $contract->proposal_id = $proposal->id;
        $contract->type = \App\Contract::TYPE_SALARY;
        $contract->payout_type = \App\Contract::PAYOUT_TYPE_MONTHLY;
        $contract->needs_feedback = false;
        $contract->start = \Carbon\Carbon::now();
        $contract->end = null;
        $contract->total_value = 100000;
        $contract->total_currency = 'PASC_molina';
        $contract->save();

        $contract->setStatus(\App\Contract::STATUS_INACTIVE, 'seed');
    }
}
