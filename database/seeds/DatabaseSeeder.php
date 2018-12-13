<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
        // Create initial API key
        DB::connection('flarum')->table('api_keys')->insert([
            'id' => config('flarum.api_key')
        ]);
    }
}
