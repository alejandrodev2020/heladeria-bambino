<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Activo;
use DB;
use Carbon\Carbon;



class ActivoController extends Controller
{
    public function index(Request $request)
    {
        $activos = Activo::select('id_activos', 'nombres', 'cantidad', 'precio', 'estado')
                          ->orderBy('id_activos', 'desc')->paginate(10);

        return [
            'pagination' => [
                'total'        => $activos->total(),
                'current_page' => $activos->currentPage(),
                'per_page'     => $activos->perPage(),
                'last_page'    => $activos->lastPage(),
                'from'         => $activos->firstItem(),
                'to'           => $activos->lastItem(),
            ],
            'activos' => $activos
        ];
    }

    public function listarActivo(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        // dd("LLEGA");
        // if ($buscar==''){
        //     $activos = Activo::join('categorias','articulos.idcategoria','=','categorias.id')
        //     ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
        //     ->orderBy('articulos.id', 'desc')->paginate(1000);
        // }
        // else{
        //     $activos = Activo::join('categorias','articulos.idcategoria','=','categorias.id')
        //     ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
        //     ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
        //     ->orderBy('articulos.id', 'desc')->paginate(1000);
        // }
        

        return [ 'activos' => "casa"];
    }

    public function listarArticuloVenta(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->where('articulos.stock','>','0')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('articulos.stock','>','0')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        

        return ['articulos' => $articulos];
    }

    public function buscarArticulo(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id','nombre')->orderBy('nombre', 'asc')->take(1)->get();

        return ['articulos' => $articulos];
    }

    public function buscarArticuloVenta(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id','nombre','stock','precio_venta')
        ->where('stock','>','0')
        ->orderBy('nombre', 'asc')
        ->take(1)->get();

        return ['articulos' => $articulos];
    }
    
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $activo = new Activo();
        $activo->nombres = $request->nombres;
        $activo->precio = $request->precio;
        $activo->cantidad = $request->cantidad;
        $activo->created_at = $currentTime = Carbon::now();
        $activo->updated_at = $currentTime = Carbon::now();
        $activo->save();
    }
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $activo = Activo::findOrFail($request->id_activos);
        $activo->nombres = $request->nombres;
        $activo->precio = $request->precio;
        $activo->cantidad = $request->cantidad;
        $activo->estado = '1';
        $activo->updated_at = $currentTime = Carbon::now();
        $activo->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $activo = Activo::findOrFail($request->id_activos);
        $activo->estado = '0';
        $activo->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $activo = Activo::findOrFail($request->id_activos);
        $activo->estado = '1';
        $activo->save();
    }

}
