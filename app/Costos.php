<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costos extends Model
{
    protected $table = 'costos';
    protected $primaryKey = 'id_costos';
    protected $fillable =[
        'id_costos', 'costos_operativos', 'costos_brutos', 'fecha', 'estado', 'id_producto', 'created_at', 'updated_at',
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
