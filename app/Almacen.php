<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacen';
    protected $primaryKey = 'id_almacen';
    protected $fillable =[
        'id_almacen',
        'direccion',
        'estado',
        'created_at',
        'updated_at',
    ];

}
