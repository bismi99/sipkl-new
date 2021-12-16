<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'Admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Dadang dayat',
            'email' => 'dadang@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'Pembimbing'
        ]);
        DB::table('users')->insert([
            'name' => 'bismi',
            'email' => 'bismi@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'Siswa'
        ]);
    }
}
