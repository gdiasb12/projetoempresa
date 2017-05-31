<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuario';

    protected $rememberTokenName = 'remember_token';

    protected $fillable = [
    'senha', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'senha'
    ];

    protected $guarded = [
    'senha'
    ];


    public function empresa(){
        return $this->hasMany('\App\Empresa', 'usuario_id');
    }
}