<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'tlp'            => '0812345678910',
                'alamat'         => 'Malang',
                'lvl'            => '2',
                'foto'            => '-',
                'password'       => Hash::make('password'),
        ]);
    }
}
