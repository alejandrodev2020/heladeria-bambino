<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoInventario;

class TipoInventarioController extends Controller
{
    public function index(Request $request)
    {
        $tipo_inventario = TipoInventario::select('id_tipo_inventario', 'nombre','estado')
                          ->orderBy('id_tipo_inventario', 'desc')->paginate(10);

        return [
            'pagination' => [
                'total'        => $tipo_inventario->total(),
                'current_page' => $tipo_inventario->currentPage(),
                'per_page'     => $tipo_inventario->perPage(),
                'last_page'    => $tipo_inventario->lastPage(),
                'from'         => $tipo_inventario->firstItem(),
                'to'           => $tipo_inventario->lastItem(),
            ],
            'tipo_inventario' => $tipo_inventario
        ];
    } 

    public function selectRol(Request $request){

        $roles = Rol::where('condicion', '=', '1')
        ->select('id','nombre')
        ->orderBy('nombre', 'asc')->get();

        return ['roles' => $roles];
    }
}
