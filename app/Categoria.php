<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //protected $table = 'categorias';
    //protected $primaryKey = 'id';
    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    protected $fillable = ['id_categoria','nombre','descripcion','estado'];

    public function articulos()
    {
        return $this->hasMany('App\Articulo');
    }
}
