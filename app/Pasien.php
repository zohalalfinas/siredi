<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
	
	protected $fillable = [
		'nama', 
		'nik',
		'alamat',
		'foto',
	];
	public function periksa()
	{
		return $this->hasMany('App\Periksa');
	}
	
}
