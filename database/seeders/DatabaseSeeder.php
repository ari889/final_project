<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
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
        DB::table('users')->insert([
            'first_name' => "Admin",
            'last_name'  => "Console",
            'username' => "admin",
            'email' => "info@mycryptopoolmirror.com",
            'cell' => " ",
            'referral_id' => 0,
            'password' => bcrypt('#a)&DNJDM;g-' ),
        ]);
    }
}
