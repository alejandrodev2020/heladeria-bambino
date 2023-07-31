<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Almacen;
use App\Categoria;
use App\Inventario;
use App\InventarioInsumo;
use App\InventarioActivo;
use DB;

class InventarioInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inventarios_insumos = InventarioInsumo::join('inventario','inventario.id_inventario','inventario_insumo.id_inventario')
                                        ->join('insumo','insumo.id_insumo','=','inventario_insumo.id_insumo')
                                        ->select('inventario.id_inventario', 'insumo.id_insumo', 'cantidad_inventario', 'cantidad_sistema','insumo.codigo','insumo.nombre')
                                        ->where('inventario_insumo.id_inventario','=',$request->id_inventario)
                                        ->orderBy('inventario.id_inventario', 'desc')->paginate(1000);
        return [
                'pagination' => [
                'total'        => $inventarios_insumos->total(),
                'current_page' => $inventarios_insumos->currentPage(),
                'per_page'     => $inventarios_insumos->perPage(),
                'last_page'    => $inventarios_insumos->lastPage(),
                'from'         => $inventarios_insumos->firstItem(),
                'to'           => $inventarios_insumos->lastItem(),
                ],
        'inventarios_insumos' => $inventarios_insumos
        ];
    }

    public function indexActivo(Request $request)
    {  
        $inventarios_activos = InventarioActivo::join('inventario','inventario.id_inventario','inventario_activos.id_inventario')
                                        ->join('activos','activos.id_activos','=','inventario_activos.id_activos')
                                        ->select('inventario.id_inventario', 'activos.id_activos', 'cantidad_inventario', 'cantidad_sistema','activos.nombres')
                                        ->where('inventario_activos.id_inventario','=',$request->id_inventario)
                                        ->orderBy('inventario.id_inventario', 'desc')->paginate(1000);

        return [
                'pagination' => [
                'total'        => $inventarios_activos->total(),
                'current_page' => $inventarios_activos->currentPage(),
                'per_page'     => $inventarios_activos->perPage(),
                'last_page'    => $inventarios_activos->lastPage(),
                'from'         => $inventarios_activos->firstItem(),
                'to'           => $inventarios_activos->lastItem(),
                ],
        'inventarios_activos' => $inventarios_activos
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
        DB::table('inventario_insumo')
            ->where('id_insumo', $request->id_insumo)
            ->where('id_inventario',$request->id_inventario)
            ->update(['cantidad_inventario' => $request->cantidad_inventario]);

    }
    public function updateActivo(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        DB::table('inventario_activos')
            ->where('id_activos', $request->id_activo)
            ->where('id_inventario',$request->id_inventario)
            ->update(['cantidad_inventario' => $request->cantidad_inventario]);

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
