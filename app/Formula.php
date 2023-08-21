<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    protected $table = 'formulas';
    protected $primaryKey = 'id_formulas';
    protected $fillable =[
        'id_formulas', 'nombre', 'descripcion', 'cantidad_produccion', 'cantidad_personal', 'duracion_horas', 'estado', 'id_producto', 'created_at', 'updated_at'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
