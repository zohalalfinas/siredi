<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
	protected $table = 'pemeriksaan';
	
	protected $fillable = [
		'tgl_pemeriksaan', 
		'jam_pemeriksaan',
		'diagnosa',
		'keterangan',
		'id_dokter',
		'id_resep',
		'id_pasien'
	];
}
