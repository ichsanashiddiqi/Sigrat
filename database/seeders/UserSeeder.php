<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            'nama' => 'admin',
            'nip' => 111111111,
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now('GMT+7'),   
            'password' => Hash::make('12345678'),
            'role' => 'Admin',
            'jabatan' => 'Admin',
            'created_at' => Carbon::now('GMT+7'),
            'updated_at' => Carbon::now('GMT+7'),
        ]);
        DB::table('users')->insert([
            'nama' => 'budi',
            'nip' => 123456789,
            'email' => 'budi@gmail.com',
            'email_verified_at' => Carbon::now('GMT+7'),   
            'password' => Hash::make('budibudi'),
            'role' => 'Pegawai',
            'jabatan' => 'Saptol',
            'created_at' => Carbon::now('GMT+7'),
            'updated_at' => Carbon::now('GMT+7'),
        ]);
    }
}
