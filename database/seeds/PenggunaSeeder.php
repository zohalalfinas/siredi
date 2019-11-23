<?php

use Illuminate\Database\Seeder;

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
            'name'      => 'Ini Super Admin',
            'email'     => 'superadmin@gmail.com',
            'password'  => 'superadmin123',
        ]);
        DB::table('users')->insert([
            'peran_id'  => 2,
            'name'      => 'Ini Administrator',
            'email'     => 'administrator@gmail.com',
            'password'  => 'administrator123',
        ]);
        DB::table('users')->insert([
            'peran_id'  => 3,
            'name'      => 'Ini Dokter',
            'email'     => 'dokter@gmail.com',
            'password'  => 'dokter123',
        ]);
    }
}
