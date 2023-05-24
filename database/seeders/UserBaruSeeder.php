<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Administrator Baru',
            'email' => 'adminbaru@admin.com',
            'password' => Hash::make('password')
        ]);
    }
}
