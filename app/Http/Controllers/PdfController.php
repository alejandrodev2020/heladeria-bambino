<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Venta;
use App\DetalleVenta;
use App\Persona;
use \PDF;


class PdfController extends Controller
{
    public function index(Request $request)
    {
        $mytime= Carbon::now('America/Lima');
        $initDate = $request->initDate;
        $endDate = $request->endDate;
        $clientId = $request->clientId;
        $mytime->addHours(1);
        $namePersona = "Sin definir";

        if($clientId !=null)
        {
            $namePersona = Persona::select('nombre')->where('id','=',$clientId)->get();
            $namePersona = $namePersona[0]->nombre;
        }

        if($initDate != null && $endDate != null)
        {
           $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
           ->join('users','ventas.idusuario','=','users.id')
           ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
           'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
           'ventas.estado','personas.nombre','users.usuario')
           ->where('ventas.fecha_hora', '>=', $initDate)
           ->where('ventas.fecha_hora', '<=', $endDate)
           ->orderBy('ventas.id', 'desc')->paginate(1000);
        }

        if($initDate === null && $endDate == null)
        {
           $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
           ->join('users','ventas.idusuario','=','users.id')
           ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
           'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
           'ventas.estado','personas.nombre','users.usuario')
       
           ->orderBy('ventas.id', 'desc')->paginate(1000);
        }

        if($initDate === null && $endDate == null && $clientId != null)
        {
           $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
           ->join('users','ventas.idusuario','=','users.id')
           ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
           'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
           'ventas.estado','personas.nombre','users.usuario')
           ->where('ventas.idcliente', '=', $clientId)
           ->orderBy('ventas.id', 'desc')->paginate(1000);
        }

        if($initDate !== null && $endDate !== null && $clientId != null)
        {
           $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
           ->join('users','ventas.idusuario','=','users.id')
           ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
           'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
           'ventas.estado','personas.nombre','users.usuario')
           ->where('ventas.fecha_hora', '>=', $initDate)
           ->where('ventas.fecha_hora', '<=', $endDate)
           ->where('ventas.idcliente', '=', $clientId)
           ->orderBy('ventas.id', 'desc')->paginate(1000);
        }
       
       $data = [
           'pagination' => [
               'total'        => $ventas->total(),
               'current_page' => $ventas->currentPage(),
               'per_page'     => $ventas->perPage(),
               'last_page'    => $ventas->lastPage(),
               'from'         => $ventas->firstItem(),
               'to'           => $ventas->lastItem(),
           ],
           'ventas' => $ventas,
           'fecha_inicial' => $initDate,
           'fecha_final' => $endDate,
           'fecha_actual' => $mytime,
           'clientName' => $namePersona,
       ];

        $valor['valor'] = $data;
        //dd($valor);
       //  return view('templatesPdf/OverviewStore', $valor);

        // dd($request);


        $pdf = PDF::loadView('templatesPdf/OverviewStore', $valor);
         return $pdf->stream('report.pdf', array('Attachment' => 0));
    }

    public function indexTermic(Request $request)
    {
        $mytime= Carbon::now('America/Lima');
        $initDate = $request->initDate;
        $endDate = $request->endDate;
        $clientId = $request->clientId;
        $mytime->addHours(1);
        $namePersona = "Sin definir";

        if($clientId !=null)
        {
            $namePersona = Persona::select('nombre')->where('id','=',$clientId)->get();
            $namePersona = $namePersona[0]->nombre;
        }

        if($initDate != null && $endDate != null)
        {
           $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
           ->join('users','ventas.idusuario','=','users.id')
           ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
           'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
           'ventas.estado','personas.nombre','users.usuario')
           ->where('ventas.fecha_hora', '>=', $initDate)
           ->where('ventas.fecha_hora', '<=', $endDate)
           ->orderBy('ventas.id', 'desc')->paginate(1000);
        }

        if($initDate === null && $endDate == null)
        {
           $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
           ->join('users','ventas.idusuario','=','users.id')
           ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
           'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
           'ventas.estado','personas.nombre','users.usuario')
       
           ->orderBy('ventas.id', 'desc')->paginate(1000);
        }

        if($initDate === null && $endDate == null && $clientId != null)
        {
           $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
           ->join('users','ventas.idusuario','=','users.id')
           ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
           'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
           'ventas.estado','personas.nombre','users.usuario')
           ->where('ventas.idcliente', '=', $clientId)
           ->orderBy('ventas.id', 'desc')->paginate(1000);
        }

        if($initDate !== null && $endDate !== null && $clientId != null)
        {
           $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
           ->join('users','ventas.idusuario','=','users.id')
           ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
           'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
           'ventas.estado','personas.nombre','users.usuario')
           ->where('ventas.fecha_hora', '>=', $initDate)
           ->where('ventas.fecha_hora', '<=', $endDate)
           ->where('ventas.idcliente', '=', $clientId)
           ->orderBy('ventas.id', 'desc')->paginate(1000);
        }
       
       $data = [
           'pagination' => [
               'total'        => $ventas->total(),
               'current_page' => $ventas->currentPage(),
               'per_page'     => $ventas->perPage(),
               'last_page'    => $ventas->lastPage(),
               'from'         => $ventas->firstItem(),
               'to'           => $ventas->lastItem(),
           ],
           'ventas' => $ventas,
           'fecha_inicial' => $initDate,
           'fecha_final' => $endDate,
           'fecha_actual' => $mytime,
           'clientName' => $namePersona,
       ];

        $valor['valor'] = $data;
        //dd($valor);
         $widthDefault=$ventas->count();
         $customPaper = array(0,0,200.00,690+($widthDefault*25));
         $pdf = PDF::loadView('templatesPdf/OverviewStoreTermic', $valor)->setPaper($customPaper,'portrait');
         return $pdf->stream('report.pdf', array('Attachment' => 0));
    }

    public function index2(Request $request)
    {
        
        if (!$request->ajax()) return redirect('/');


         $initDate = $request->initDate;
         $endDate = $request->endDate;
         $clientId = $request->clientId;

         if($initDate != null && $endDate != null)
         {
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
            'ventas.estado','personas.nombre','users.usuario')
            ->where('ventas.fecha_hora', '>=', $initDate)
            ->where('ventas.fecha_hora', '<=', $endDate)
            ->orderBy('ventas.id', 'desc')->paginate(10);
         }

         if($initDate === null && $endDate == null)
         {
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
            'ventas.estado','personas.nombre','users.usuario')
            ->orderBy('ventas.id', 'desc')->paginate(10);
         }
         if($initDate === null && $endDate == null && $clientId != null)
         {
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
            'ventas.estado','personas.nombre','users.usuario')
            ->where('ventas.idcliente', '=', $clientId)
            ->orderBy('ventas.id', 'desc')->paginate(10);
         }

         if($initDate !== null && $endDate !== null && $clientId != null)
         {
            $ventas = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
            'ventas.estado','personas.nombre','users.usuario')
            ->where('ventas.fecha_hora', '>=', $initDate)
            ->where('ventas.fecha_hora', '<=', $endDate)
            ->where('ventas.idcliente', '=', $clientId)
            ->orderBy('ventas.id', 'desc')->paginate(10);
         }
        
        return [
            'pagination' => [
                'total'        => $ventas->total(),
                'current_page' => $ventas->currentPage(),
                'per_page'     => $ventas->perPage(),
                'last_page'    => $ventas->lastPage(),
                'from'         => $ventas->firstItem(),
                'to'           => $ventas->lastItem(),
            ],
            'ventas' => $ventas
        ];

    }

    public function currentStoreId(Request $request)
    {
     
        $id = $request->id;
        $persona = null;
        $today = Carbon::now()->format('Y-m-d');    
        $venta[0] = Venta::join('personas','ventas.idcliente','=','personas.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.tipo_venta','ventas.chofer','ventas.placa','ventas.tipo_comprobante','ventas.serie_comprobante',
            'ventas.num_comprobante','ventas.fecha_hora','ventas.impuesto','ventas.total',
            'ventas.estado','personas.nombre','users.usuario')
            ->where('ventas.id','=',$id)
            ->orderBy('ventas.id', 'desc')->take(1)->get();

        $detalles = DetalleVenta::join('articulos','detalle_ventas.idarticulo','=','articulos.id')
            ->select('detalle_ventas.cantidad','detalle_ventas.precio','detalle_ventas.descuento',
            'articulos.nombre as articulo')
            ->where('detalle_ventas.idventa','=',$id)
            ->orderBy('detalle_ventas.id', 'desc')->get();
            
       if($venta[0][0]->chofer != null)
       {
         $persona = Persona::find($venta[0][0]->chofer);
       }  
     
       $data = [
           'numero' => $venta[0][0]->id,
           'venta' => $venta[0][0],
           'detalle' => $detalles,
           'fecha_actual' => $today,
           'chofer' => $persona,
           'total' => number_format($venta[0][0]->total,2,",",".")
       ];

        $valor['valor'] = $data;
        // dd($valor);
        $pdf = PDF::loadView('templatesPdf/OverviewStoreById', $valor);
         return $pdf->stream('report.pdf', array('Attachment' => 0));
    }

    
}