<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarioActivo extends Model
{
    protected $table = 'inventario_activos';
    protected $primaryKey = ['id_inventario','id_activos'];
    public $incrementing = false;
    protected $fillable =[
        'id_inventario', 'id_activos', 'cantidad_inventario', 'cantidad_sistema', 'created_at', 'updated_at'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
