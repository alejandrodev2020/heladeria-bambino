<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    protected $table = 'cronograma_diario';
    protected $primaryKey = 'id_cronograma_diario';
    protected $fillable =[
        'id_cronograma_diario', 'fecha', 'estado', 'id_categoria', 'id_almacen'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
