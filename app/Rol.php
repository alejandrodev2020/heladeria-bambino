<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $fillable = ['id_rol','nombre','sueldo_hora','estado'];
    public $timestamps = false;


    public function users()
    {
        return $this->hasMany('App\Usuario');
    }

}
