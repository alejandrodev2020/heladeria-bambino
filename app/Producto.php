<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $fillable =[
        'id_producto', 
        'nombre', 
        'precio', 
        'estado', 
        'created_at', 
        'updated_at'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
