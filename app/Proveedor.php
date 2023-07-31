<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $primaryKey = 'id_proveedor';
    protected $fillable = [
        'id_proveedor', 'nombre', 'telefono', 'nit', 'ubicacion', 'pagina_web', 'email', 'estado'
    ];

    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }


}
