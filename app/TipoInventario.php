<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TipoInventario extends Authenticatable
{
    use Notifiable;
    protected $table = 'tipo_inventario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_tipo_inventario',
        'nombre',
        'estado'
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
