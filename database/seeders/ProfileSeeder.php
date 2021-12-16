<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin = Profile::create([
            'user_id' => '1',
            'ttl' => \Carbon\Carbon::now(),
            'alamat' => 'sukabumi',
            'jk' => 'Laki - laki',
            'nt' => '089272838267',
            'tempat_pkl_id' => '1',
            'avatar' => 'default.jpg',
        ]);
        $user = Profile::create([
            'user_id' => '2',
            'ttl' => \Carbon\Carbon::now(),
            'alamat' => 'Sukabumi',
            'jk' => 'Laki - laki',
            'nt' => '089272838267',
            'tempat_pkl_id' => '1',
            'avatar' => 'default.jpg',
        ]);
        $user = Profile::create([
            'user_id' => '3',
            'ttl' => \Carbon\Carbon::now(),
            'alamat' => 'Sukabumi',
            'jk' => 'Laki - laki',
            'nt' => '089272838267',
            'tempat_pkl_id' => '1',
            'avatar' => 'default.jpg',
        ]);

    }
}
