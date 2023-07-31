<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{

    protected $table = 'compra';
    protected $primaryKey = 'id_compra';
    protected $fillable = [
        'fecha',
        'monto_total',
        'referencia',
        'estado',
        'id_usuario',
        'id_proveedor',
        'created_at',
        'updated_at'
     ];
     public function usuario()
     {
         return $this->belongsTo('App\Usuario');
     }
     public function proveedor()
     {
         return $this->belongsTo('App\Proveedor');
     }
 
 
}
