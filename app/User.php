<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password','peran_id','foto','nip','alamat','nomor_telepon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function peran()
    {
        return $this->belongsTo('App\Peran','peran_id');
    }

    public function punyaPeran($peran)
    {
        $this->have_peran = $this->getPeranUser();

        if (is_array($peran)) {
            foreach ($peran as $need_peran) {
                if ($this->cekPeranUser($need_peran)) {
                    return true;
                }
            }
        } else {
            return $this->cekPeranUser($peran);
        }
        return false;
    }

    private function getPeranUser()
    {
        return $this->peran()->getResults();
    }

    private function cekPeranUser($peran)
    {
        return (strtolower($peran) == strtolower($this->have_peran->peran)) ? true : false;
    }
}
