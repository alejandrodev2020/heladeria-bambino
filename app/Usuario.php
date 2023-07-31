<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'nombre',
        'apellido',
        'ci',
        'email',
        'pasword',
        'estado',
        'id_rol'
    ];


    
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function rol(){
    //     return $this->belongsTo('App\Rol');
    // }

    // public function persona(){
    //     return $this->belongsTo('App\Persona');
    // }


}
