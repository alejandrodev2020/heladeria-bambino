<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarioInsumo extends Model
{
    protected $table = 'inventario_insumo';
    protected $primaryKey = ['id_inventario','id_insumo'];
    public $incrementing = false;
    protected $fillable =[
        'id_inventario', 'id_insumo', 'cantidad_inventario', 'cantidad_sistema', 'created_at', 'updated_at'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
