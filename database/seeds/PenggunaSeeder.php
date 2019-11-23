<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'peran_id'  => 1,
            'nama'      => 'Ini Super Admin',
            'email'     => 'superadmin@gmail.com',
            'password'  => Hash::make('superadmin123'),
        ]);
        DB::table('users')->insert([
            'peran_id'  => 2,
            'nama'      => 'Ini Administrator',
            'email'     => 'administrator@gmail.com',
            'password'  => Hash::make('administrator123'),
        ]);
        DB::table('users')->insert([
            'peran_id'  => 3,
            'nama'      => 'Ini Dokter',
            'email'     => 'dokter@gmail.com',
            'password'  => Hash::make('dokter123'),
        ]);
    }
}
