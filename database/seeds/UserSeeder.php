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

        $contractor = $user->contractors->first();
        $contractor->user_id = $user->id;
        $contractor->ident_code = "techworker";
        $contractor->type = \App\Contractor::TYPE_NATURAL_PERSON;
        $contractor->first_name = 'Benjamin';
        $contractor->last_name = 'Ansbach';
        $contractor->company_name = 'Techworker GmbH';
        $contractor->public_name = '@techworker';
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
        $proposal->ident_code = "php-lib";
        $proposal->title = 'PHP Library';
        $proposal->intro = 'A library to talk with PascalCoin in PHP.';
        $proposal->description = 'A PHP library to ease the development with PascalCoin using the JSON-RPC API. This will open up PascalCoin development to the webdeveloper community.';
        $proposal->description_html = 'A <strong>PHP</strong> library to ease the development with PascalCoin using the JSON-RPC API. This will open up PascalCoin development to the webdeveloper community.';
        $proposal->website = 'https://www.techworker.io';
        $proposal->source_code = 'https://github.com/techworker';
        $proposal->proposed_value = '10000';
        $proposal->proposed_currency = \App\MoneyValue::TYPE_PASC;
        $proposal->payment_proposal = 'Pay now or I will delete everything!';
        $proposal->save();

        $proposal->setStatus(\App\Proposal::STATUS_DRAFT, 'seed');
        $proposal->setStatus(\App\Proposal::STATUS_SUBMITTED, 'seed');
        $proposal->setStatus(\App\Proposal::STATUS_PUBLIC_REVIEW, 'seed');

        $contract = new \App\Contract();
        $contract->proposal_id = $proposal->id;
        $contract->contractor_id = $contractor->id;
        $contract->needs_feedback = false;
        $contract->start_date = \Carbon\Carbon::now();
        $contract->payment_date = null;
        $contract->total_value = 100000;
        $contract->role = 'Developer';
        $contract->role_description = 'Develops the stuff';
        $contract->payment_description = 'Ahead payment';
        $contract->pasa = '6780';
        $contract->save();
    }
}