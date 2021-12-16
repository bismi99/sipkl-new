<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TempatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tempats')->insert([
            'nama' => 'PT Anabatic Technologies Tbk',
            'alamat' => 'sukabumi',
            'nt' => '089763627362'
        ]);
        DB::table('tempats')->insert([
            'nama' => 'PT DCI Indonesia',
            'alamat' => 'sukabumi',
            'nt' => '089763627362'
        ]);
        DB::table('tempats')->insert([
            'nama' => 'PT Digital Mediatama Maxima Tbk',
            'alamat' => 'sukabumi',
            'nt' => '089763627362'
        ]);

    }
}
