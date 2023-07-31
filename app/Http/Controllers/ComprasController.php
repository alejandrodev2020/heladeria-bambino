<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Ingreso;
use App\Compra;
use App\DetalleIngreso;
use App\DetalleCompra;

class ComprasController extends Controller
{
    public function index(Request $request)
    {
         if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $compras = Compra::join('proveedor','compra.id_proveedor','=','proveedor.id_proveedor')
            ->select('compra.id_compra','compra.fecha','compra.referencia','compra.monto_total',
            'compra.estado','proveedor.nombre')
            ->orderBy('compra.id_compra', 'desc')->paginate(10);
        }
        else{
            $compras = Compra::join('proveedor','compra.id_proveedor','=','proveedor.id_proveedor')
        
            ->select('compra.id_compra','compra.fecha','compra.referencia','compra.monto_total',
            'compra.estado','proveedor.nombre')
            ->where('compras.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('compras.id', 'desc')->paginate(10);
        }
        
        return [
            'pagination' => [
                'total'        => $compras->total(),
                'current_page' => $compras->currentPage(),
                'per_page'     => $compras->perPage(),
                'last_page'    => $compras->lastPage(),
                'from'         => $compras->firstItem(),
                'to'           => $compras->lastItem(),
            ],
            'compras' => $compras
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

        // try{
        //     DB::beginTransaction();

            $mytime= Carbon::now('America/Lima');
         
            $compra = new Compra();
            $compra->fecha = $mytime->addHours(1);
            $compra->monto_total = $request->total;
            $compra->referencia = $request->referencia;
            $compra->estado = true;
            $compra->id_proveedor = $request->id_proveedor;
            $compra->referencia = $request->referencia;
            $compra->id_usuario = 1;
            $compra->save();
            
            $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos
            // dd($detalles);

            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetalleCompra();
                $detalle->id_compra = $compra->id_compra;
                $detalle->id_insumo =$det['idarticulo'];
                $detalle->cantidad = $det['cantidad'];
                $detalle->precio = $det['precio'];    
                $detalle->created_at =Carbon::now('America/Lima');
                $detalle->updated_at =Carbon::now('America/Lima');    
                $detalle->save();
            }          

        //     DB::commit();
        // } catch (Exception $e){
        //     DB::rollBack();
        // }
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