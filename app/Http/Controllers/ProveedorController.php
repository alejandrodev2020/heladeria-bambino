<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Proveedor;
use App\Persona;


class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $proveedor = Proveedor::select('id_proveedor', 'nombre', 'telefono', 'nit', 'ubicacion', 'pagina_web', 'email', 'estado')
                             ->orderBy('id_proveedor', 'desc')->paginate(10);
        return [
                'pagination' => [
                'total'        => $proveedor->total(),
                'current_page' => $proveedor->currentPage(),
                'per_page'     => $proveedor->perPage(),
                'last_page'    => $proveedor->lastPage(),
                'from'         => $proveedor->firstItem(),
                'to'           => $proveedor->lastItem(),
                ],
        'proveedor' => $proveedor
        ];
    }

    public function  selectProveedor(Request $request){
        if (!$request->ajax()) return redirect('/');
       
        $filtro = $request->filtro;
        // $proveedores = Proveedor::join('personas','proveedores.id','=','personas.id')
        // ->where('personas.nombre', 'like', '%'. $filtro . '%')
        // ->orWhere('personas.num_documento', 'like', '%'. $filtro . '%')
        // ->select('personas.id','personas.nombre','personas.num_documento')
        // ->orderBy('personas.nombre', 'asc')->get();

        $proveedores = Proveedor::select('id_proveedor', 'nombre', 'nit')
                             ->where('nombre', 'like', '%'. $filtro . '%')
                             ->orderBy('id_proveedor', 'desc')->paginate(10);
        return ['proveedores' => $proveedores];

    }

    public function store(Request $request)
    {
       
        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->nit = $request->nit;
        $proveedor->ubicacion = $request->ubicacion;
        $proveedor->pagina_web = $request->pagina_web;
        $proveedor->email = $request->email;
        $proveedor->estado = '1';
        $proveedor->save();        
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $proveedor = Proveedor::findOrFail($request->id_proveedor);
        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->nit = $request->nit;
        $proveedor->ubicacion = $request->ubicacion;
        $proveedor->pagina_web = $request->pagina_web;
        $proveedor->email = $request->email;
        $proveedor->estado = '1';
        $proveedor->save();

    }
}
