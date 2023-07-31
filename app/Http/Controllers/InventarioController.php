<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Almacen;
use App\Categoria;
use App\Inventario;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inventarios = Inventario::join('usuario','usuario.id_usuario','inventario.id_usuario')
                                ->join('tipo_inventario','tipo_inventario.id_tipo_inventario','=','inventario.id_tipo_inventario')
                               ->select('inventario.id_inventario', 'fecha', 'inventario.estado', 'inventario.id_usuario', 'inventario.id_tipo_inventario','usuario.nombre','tipo_inventario.nombre  as tipo')
                               ->where('usuario.id_rol','=',2)
                              ->orderBy('inventario.id_inventario', 'desc')->paginate(10);
        return [
                'pagination' => [
                'total'        => $inventarios->total(),
                'current_page' => $inventarios->currentPage(),
                'per_page'     => $inventarios->perPage(),
                'last_page'    => $inventarios->lastPage(),
                'from'         => $inventarios->firstItem(),
                'to'           => $inventarios->lastItem(),
                ],
        'inventarios' => $inventarios
        ];
    }

    public function selectAlmacen(Request $request){
        if (!$request->ajax()) return redirect('/');
        $almacen = Almacen::where('estado','=','1')
        ->select('id_almacen','direccion')->orderBy('direccion', 'asc')->get();
        return ['almacen' => $almacen];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $inventario = new Inventario();
        $inventario->fecha = $request->fecha;
        $inventario->id_usuario = $request->id_usuario;
        $inventario->id_tipo_inventario = $request->id_tipo_inventario;
        $inventario->estado = true;
        $inventario->save();
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $inventario = Inventario::findOrFail($request->id_inventario);
        $inventario->fecha = $request->fecha;
        $inventario->id_usuario = $request->id_usuario;
        $inventario->id_tipo_inventario = $request->id_tipo_inventario;
        $inventario->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $inventario = Inventario::findOrFail($request->id_inventario);
        $inventario->estado = '0';
        $inventario->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $inventario = Inventario::findOrFail($request->id_inventario);
        $inventario->estado = '1';
        $inventario->save();
    }

    
}
