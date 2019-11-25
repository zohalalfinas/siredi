<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
	protected $table = 'pemeriksaan';
	
	protected $fillable = [
		'diagnosa',
		'keterangan',
		'resep',
		'pasien_id'
	];

	public function pasien()
	{
		return $this->belongsTo('App\Pasien', 'pasien_id');
	}
}
