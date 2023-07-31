<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Almacen;
use App\Categoria;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $almacen = Almacen::select('id_almacen', 'direccion', 'estado')
                        ->orderBy('id_almacen', 'desc')->paginate(10);
        return [
                'pagination' => [
                'total'        => $almacen->total(),
                'current_page' => $almacen->currentPage(),
                'per_page'     => $almacen->perPage(),
                'last_page'    => $almacen->lastPage(),
                'from'         => $almacen->firstItem(),
                'to'           => $almacen->lastItem(),
                ],
        'almacen' => $almacen
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
        $almacen = new Almacen();
        $almacen->direccion = $request->direccion;
        $almacen->estado = '1';
        $almacen->save();
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
        $almacen = Almacen::findOrFail($request->id_almacen);
        $almacen->direccion = $request->direccion;
        $almacen->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $almacen = Almacen::findOrFail($request->id_almacen);
        $almacen->estado = '0';
        $almacen->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $almacen = Almacen::findOrFail($request->id_almacen);
        $almacen->estado = '1';
        $almacen->save();
    }

    
}
