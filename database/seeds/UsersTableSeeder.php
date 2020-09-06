<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();

        $user->name = "Muhammad Muzammil";
        $user->email = "mmuzammil@egenienext.com";
        $user->password = Hash::make('admin@123');

        $user->save();
    }
}
