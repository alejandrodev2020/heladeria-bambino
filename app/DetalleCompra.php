<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalle_compra';
    protected $primaryKey = ['id_insumo','id_compra'];
    public $incrementing = false;

    protected $fillable = [
        'id_insumo',
        'id_compra',
        'cantidad',
        'precio',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

}
