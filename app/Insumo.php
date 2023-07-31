<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumo';
    protected $primaryKey = 'id_insumo';
    protected $fillable =[
        'cantidad', 'nombre', 'codigo', 'medida', 'precio', 'estado', 'id_categoria', 'id_almacen'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
