<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Usuario;
use App\Insumo;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = Usuario::join('rol','usuario.id_rol','=','rol.id_rol')
                        ->select('id_usuario', 'usuario.nombre', 'apellido', 'ci', 'email', 'pasword', 'usuario.estado', 'rol.id_rol','rol.nombre as nombre_rol')
                        ->where('usuario.estado','=',1)
                        ->orderBy('id_usuario', 'desc')->paginate(10);
        return [
                'pagination' => [
                'total'        => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page'     => $usuarios->perPage(),
                'last_page'    => $usuarios->lastPage(),
                'from'         => $usuarios->firstItem(),
                'to'           => $usuarios->lastItem(),
                ],
        'usuarios' => $usuarios
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
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->ci = $request->ci;
        $usuario->email = $request->email;
        $usuario->pasword = $request->password;
        $usuario->estado = 1;
        $usuario->id_rol = $request->id_rol;
        $usuario->save();
    }
    public function update(Request $request)
    {

        $usuario = Usuario::findOrFail($request->id_usuario);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->ci = $request->ci;
        $usuario->email = $request->email;
        $usuario->pasword = $request->password;
        $usuario->estado = 1;
        $usuario->id_rol = $request->id_rol;
        $usuario->save();
        return ['usuario' => "Ok"];
    }

    public function desactivar(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id_usuario);
        $usuario->estado = false;
        $usuario->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $insumo = Insumo::findOrFail($request->id_insumo);
        $insumo->estado = true;
        $insumo->save();
    }

}
