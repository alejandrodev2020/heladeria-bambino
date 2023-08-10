<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Insumo;
use Carbon\Carbon;
use App\Costos;

class CostosController extends Controller
{
    public function index(Request $request)
    {
        $costos = Costos::join('producto','costos.id_producto','=','producto.id_producto')
                        ->select('id_costos', 'costos_operativos', 'costos_brutos', 'fecha', 'costos.estado', 'producto.id_producto','producto.nombre as nombre_producto')
                        ->orderBy('id_costos', 'desc')
                        ->where('costos.estado','=',1)
                        ->paginate(1000);


        return [
            'pagination' => [
                'total'        => $costos->total(),
                'current_page' => $costos->currentPage(),
                'per_page'     => $costos->perPage(),
                'last_page'    => $costos->lastPage(),
                'from'         => $costos->firstItem(),
                'to'           => $costos->lastItem(),
            ],
            'costos' => $costos
        ];
    }

    public function listarInsumo(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $costos = Insumo::join('categoria','insumo.id_categoria','=','categoria.id_categoria')
            ->select('insumo.id_insumo','insumo.id_categoria','insumo.codigo','insumo.nombre','categoria.nombre as nombre_categoria','insumo.precio','insumo.cantidad','insumo.estado','insumo.id_almacen')
            ->orderBy('insumo.id_insumo', 'desc')->paginate(1000);
        }
        else{
            $insumos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('articulos.id', 'desc')->paginate(1000);
        }
        

        return [ 'insumos' => $insumos];
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
        
        $costos = new Costos();
        $costos->id_producto = $request->id_producto;
        $costos->costos_operativos = $request->costos_operativos;
        $costos->costos_brutos = $request->costos_brutos; 
        $costos->fecha = Carbon::now('America/Lima'); 
        $costos->estado = true;
        $costos->save();
        return ['Costos' => "Ok"];
    }
    public function update(Request $request)
    {
        $costos = Costos::findOrFail($request->id_costos);
        $costos->costos_operativos = $request->costos_operativos;
        $costos->costos_brutos = $request->costos_brutos; 
        $costos->id_producto = $request->id_producto;
        $costos->save();
        return ['Costos' => "Ok"];
    }

    public function desactivar(Request $request)
    {
     
        $insumo = Costos::findOrFail($request->id_costos);
        $insumo->estado = false;
        $insumo->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $insumo = Insumo::findOrFail($request->id_insumo);
        $insumo->estado = true;
        $insumo->save();
    }

}
