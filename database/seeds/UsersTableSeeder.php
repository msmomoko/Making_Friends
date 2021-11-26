<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '工大 太郎',
            'email' => 'a9999999@planet.kanazawa-it.ac.jp',
            'password' => Hash::make('password'),
        ]);
    }
}
