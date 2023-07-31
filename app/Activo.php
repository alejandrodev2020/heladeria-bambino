<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $primaryKey = 'id_activos';
    protected $fillable =[
        'id_activos',
        'nombres',
        'cantidad',
        'precio',
        'estado',
        'created_at',
        'updated_at',
    ];
    public function activo(){
        return $this->belongsTo('App\Activo');
    }
}
