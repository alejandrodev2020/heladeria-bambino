<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Insumo;

class InsumoController extends Controller
{
    public function index(Request $request)
    {
        $insumo = Insumo::join('usuario','usuario.id_usuario','inventario.id_usuario')
                        ->join('tipo_inventario','tipo_inventario.id_tipo_inventario','=','inventario.id_tipo_inventario')
                      ->select('inventario.id_inventario', 'fecha', 'inventario.estado', 'inventario.id_usuario', 'inventario.id_tipo_inventario','usuario.nombre','tipo_inventario.nombre  as tipo')
                       ->where('inventario.estado','=',1)
                      >orderBy('inventario.id_inventario', 'desc')->paginate(10000);
        return [
                'pagination' => [
                'total'        => $insumo->total(),
                'current_page' => $insumo->currentPage(),
                'per_page'     => $insumo->perPage(),
                'last_page'    => $insumo->lastPage(),
                'from'         => $insumo->firstItem(),
                'to'           => $insumo->lastItem(),
                ],
        'insumo' => $insumo
        ];
    }

    public function listarInsumo(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $insumos = Insumo::join('categoria','insumo.id_categoria','=','categoria.id_categoria')
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
        if (!$request->ajax()) return redirect('/');
        $insumo = new Insumo();
        $insumo->id_categoria = $request->id_categoria;
        $insumo->id_almacen = $request->id_almacen;
        $insumo->cantidad = $request->cantidad;
        $insumo->nombre = $request->nombre;
        $insumo->codigo = $request->codigo;
        $insumo->medida = $request->medida;
        $insumo->precio = $request->precio;
        $insumo->estado = true;
        $insumo->save();
    }
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $insumo = Insumo::findOrFail($request->id_insumo);
        $insumo->id_categoria = $request->id_categoria;
        $insumo->id_almacen = $request->id_almacen;
        $insumo->cantidad = $request->cantidad;
        $insumo->nombre = $request->nombre;
        $insumo->codigo = $request->codigo;
        $insumo->medida = $request->medida;
        $insumo->precio = $request->precio;
        $insumo->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $insumo = Insumo::findOrFail($request->id_insumo);
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
