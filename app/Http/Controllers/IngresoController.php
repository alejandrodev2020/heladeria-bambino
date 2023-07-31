<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Ingreso;
use App\DetalleIngreso;

class IngresoController extends Controller
{
    public function index(Request $request)
    {
         if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->orderBy('ingresos.id', 'desc')->paginate(10);
        }
        else{
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('ingresos.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('ingresos.id', 'desc')->paginate(10);
        }
        
        return [
            'pagination' => [
                'total'        => $ingresos->total(),
                'current_page' => $ingresos->currentPage(),
                'per_page'     => $ingresos->perPage(),
                'last_page'    => $ingresos->lastPage(),
                'from'         => $ingresos->firstItem(),
                'to'           => $ingresos->lastItem(),
            ],
            'ingresos' => $ingresos
        ];
    }

    public function overview(Request $request){
       
        $id = $request->id;
        $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
        ->join('users','ingresos.idusuario','=','users.id')
        ->select('ingresos.id','ingresos.tipo_compra','ingresos.placa_compra','ingresos.nombre_chofer','ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
        'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
        'ingresos.estado','personas.id as id2','personas.nombre','users.usuario')
        ->where('ingresos.id', '=', $id)
        ->orderBy('ingresos.id', 'desc')->paginate(100);

        $detalle = DetalleIngreso::select('detalle_ingresos.id','detalle_ingresos.idingreso','detalle_ingresos.idarticulo'
        ,'detalle_ingresos.cantidad','detalle_ingresos.precio','articulos.nombre','articulos.descripcion')
        ->join('articulos','detalle_ingresos.idarticulo','=','articulos.id')
        ->where('detalle_ingresos.idingreso', '=', $id)
        ->orderBy('detalle_ingresos.id', 'desc')->paginate(100);
        
        return ['ingresos' => $ingresos, 'detalle'=>$detalle];
    }



    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            $mytime= Carbon::now('America/Lima');
         
            $ingreso = new Ingreso();
            $ingreso->idproveedor = $request->idproveedor;
            $ingreso->idusuario = \Auth::user()->id;
            $ingreso->tipo_comprobante = $request->tipo_comprobante;
            $ingreso->serie_comprobante = $request->serie_comprobante;
            $ingreso->num_comprobante = $request->num_comprobante;
            $ingreso->fecha_hora = $mytime->addHours(1);
            $ingreso->impuesto = $request->impuesto;
            $ingreso->total = $request->total;
            $ingreso->estado = 'Registrado';
            $ingreso->tipo_compra = $request->tipo_compra;
            $ingreso->nombre_chofer = $request->nombre_chofer;
            $ingreso->placa_compra = $request->placa_compra;
            $ingreso->save();

            $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos

            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetalleIngreso();
                $detalle->idingreso = $ingreso->id;
                $detalle->idarticulo = $det['idarticulo'];
                $detalle->cantidad = $det['cantidad'];
                $detalle->precio = $det['precio'];          
                $detalle->save();
            }          

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $ingreso = Ingreso::findOrFail($request->id);
        $ingreso->estado = 'Anulado';
        $ingreso->save();
    }
    public function editar(Request $request)
    {

        $content_pack_news = DB::table('detalle_ingresos')
                               ->where('idingreso' , $request->id)->get();

        foreach ($content_pack_news as $key => $value) {
            $currentDetail = DetalleIngreso::find($value->id);
            $currentDetail->delete();
        }

        // if (!$request->ajax()) return redirect('/');

        // dd($request);
        $ingreso = Ingreso::findOrFail($request->id);
        $ingreso->total = $request->total;
        $ingreso->idproveedor = $request->idproveedor;
        $ingreso->save();
        // dd($ingreso);
        
        foreach($request->data as $ep=>$det)
        {
            $detalle = new DetalleIngreso();
            $detalle->idingreso = $ingreso->id;
            $detalle->idarticulo = $det['idarticulo'];
            $detalle->cantidad = $det['cantidad'];
            $detalle->precio = $det['precio'];          
            $detalle->save();
        }  
    }
}