<?php

use Illuminate\Database\Seeder;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peran')->insert([
            'peran' => 'Super Admin'
        ]);
        DB::table('peran')->insert([
            'peran' => 'Administrator'
        ]);
        DB::table('peran')->insert([
            'peran' => 'Dokter'
        ]);
    }
}
