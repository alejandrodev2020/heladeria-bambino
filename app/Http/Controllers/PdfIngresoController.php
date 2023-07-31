<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Ingreso;
use App\Venta;
use App\DetalleIngreso;
use App\Proveedor;
use App\Persona;
use \PDF;

class PdfIngresoController extends Controller
{
    public function index(Request $request)
    {  
        $mytime= Carbon::now('America/Lima');
        $initDate = $request->initDate;
        $endDate = $request->endDate;
        $idproveedor = $request->idproveedor;
        $mytime->addHours(1);
        $namePersona = "Sin definir";
        $ingresos = "";

        if($idproveedor != null)
        {
            $namePersona = Proveedor::select('contacto')->where('id','=',$idproveedor)->get();
            $namePersona = $namePersona[0]->contacto;
        }
        if($initDate == null && $endDate == null && $idproveedor == null)
        {
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }

        if($initDate != null && $endDate != null && $idproveedor == null )
        {
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('fecha_hora', '>=', $initDate)
            ->where('fecha_hora', '<=', $endDate)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }
        if($initDate == null && $endDate == null && $idproveedor != null)
        {
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('idproveedor', '=', $idproveedor)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }
        if($initDate != null && $endDate != null && $idproveedor != null)
        {
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('idproveedor', '=', $idproveedor)
            ->where('fecha_hora', '>=', $initDate)
            ->where('fecha_hora', '<=', $endDate)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }

       
       $data = [
           'pagination' => [

           ],
           'ingresos' => $ingresos,
           'fecha_inicial' => $initDate,
           'fecha_final' => $endDate,
           'fecha_actual' => $mytime,
           'clientName' => $namePersona,
       ];

        $valor['valor'] = $data;

        $pdf = PDF::loadView('templatesPdf/OverviewPurchase', $valor);
         return $pdf->stream('report.pdf', array('Attachment' => 0));
    }

    public function indexTermic(Request $request)
    {  
        $mytime= Carbon::now('America/Lima');
        $initDate = $request->initDate;
        $endDate = $request->endDate;
        $idproveedor = $request->idproveedor;
        $mytime->addHours(1);
        $namePersona = "Sin definir";
        $ingresos = "";

        if($idproveedor != null)
        {
            $namePersona = Proveedor::select('contacto')->where('id','=',$idproveedor)->get();
            $namePersona = $namePersona[0]->contacto;
        }
        if($initDate == null && $endDate == null && $idproveedor == null)
        {
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }

        if($initDate != null && $endDate != null && $idproveedor == null )
        {
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('fecha_hora', '>=', $initDate)
            ->where('fecha_hora', '<=', $endDate)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }
        if($initDate == null && $endDate == null && $idproveedor != null)
        {
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('idproveedor', '=', $idproveedor)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }
        if($initDate != null && $endDate != null && $idproveedor != null)
        {
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('idproveedor', '=', $idproveedor)
            ->where('fecha_hora', '>=', $initDate)
            ->where('fecha_hora', '<=', $endDate)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }

       
       $data = [
           'pagination' => [

           ],
           'ingresos' => $ingresos,
           'fecha_inicial' => $initDate,
           'fecha_final' => $endDate,
           'fecha_actual' => $mytime,
           'clientName' => $namePersona,
       ];

        $valor['valor'] = $data;
        $widthDefault=$ingresos->count();
        $customPaper = array(0,0,200.00,690+($widthDefault*25));
        $pdf = PDF::loadView('templatesPdf/OverviewPurchaseTermic', $valor)->setPaper($customPaper,'portrait');
        return $pdf->stream('report.pdf', array('Attachment' => 0));

    }

    public function index2(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $providerId = $request->idproveedor;
        $initDate = $request->initDate;
        $endDate = $request->endDate;

        
        if ($providerId ==null && $initDate == null && $endDate == null ){
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }

        if($providerId != null && $initDate == null && $endDate == null ){
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('idproveedor', '=', $providerId)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }

        if($providerId == null && $initDate != null && $endDate != null ){
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('fecha_hora', '>=', $initDate)
            ->where('fecha_hora', '<=', $endDate)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
        }
        if($providerId != null && $initDate != null && $endDate != null ){
            $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.tipo_comprobante','ingresos.serie_comprobante',
            'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
            'ingresos.estado','personas.nombre','users.usuario')
            ->where('idproveedor', '=', $providerId)
            ->where('fecha_hora', '>=', $initDate)
            ->where('fecha_hora', '<=', $endDate)
            ->orderBy('ingresos.id', 'desc')->paginate(1000);
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

    public function currentStoreId(Request $request)
    {
        $id = $request->id;
        $today = Carbon::now()->format('Y-m-d');   
        $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
        ->join('users','ingresos.idusuario','=','users.id')
        ->select('ingresos.id','ingresos.tipo_compra','ingresos.nombre_chofer','ingresos.placa_compra','ingresos.tipo_comprobante','ingresos.serie_comprobante',
        'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
        'ingresos.estado','personas.nombre','users.usuario')
        ->where('ingresos.id', '=', $id)
        ->orderBy('ingresos.id', 'desc')->paginate(1000);

        $detalle = DetalleIngreso::select('detalle_ingresos.id','detalle_ingresos.idingreso','detalle_ingresos.idarticulo'
        ,'detalle_ingresos.cantidad','detalle_ingresos.precio','articulos.nombre','articulos.descripcion')
        ->join('articulos','detalle_ingresos.idarticulo','=','articulos.id')
        ->where('detalle_ingresos.idingreso', '=', $id)
        ->orderBy('detalle_ingresos.id', 'desc')->paginate(1000);
      
        $valor['valor'] = [
            'ingresos' => $ingresos[0],
             'detalle'=>$detalle,
             'compra_id'=> $ingresos[0]->id,
             'fecha_actual' => $today,
             'tipo_compra'=> $ingresos[0]->tipo_compra,
             'nombre_chofer'=> $ingresos[0]->nombre_chofer,
             'placa_compra'=> $ingresos[0]->placa_compra,
             'total' => number_format($ingresos[0]->total,2,",",".")
            ];


            //dd($valor);
    
       //  return view('templatesPdf/OverviewPurcharseById', $valor);
         $pdf = PDF::loadView('templatesPdf/OverviewPurcharseById', $valor);
          return $pdf->stream('report.pdf', array('Attachment' => 0));
    }

    public function currentTermicStoreId(Request $request)
    {
        $id = $request->id;
        $today = Carbon::now()->format('Y-m-d');   
        $ingresos = Ingreso::join('personas','ingresos.idproveedor','=','personas.id')
        ->join('users','ingresos.idusuario','=','users.id')
        ->select('ingresos.id','ingresos.tipo_compra','ingresos.nombre_chofer','ingresos.placa_compra','ingresos.tipo_comprobante','ingresos.serie_comprobante',
        'ingresos.num_comprobante','ingresos.fecha_hora','ingresos.impuesto','ingresos.total',
        'ingresos.estado','personas.nombre','users.usuario')
        ->where('ingresos.id', '=', $id)
        ->orderBy('ingresos.id', 'desc')->paginate(1000);

        $detalle = DetalleIngreso::select('detalle_ingresos.id','detalle_ingresos.idingreso','detalle_ingresos.idarticulo'
        ,'detalle_ingresos.cantidad','detalle_ingresos.precio','articulos.nombre','articulos.descripcion')
        ->join('articulos','detalle_ingresos.idarticulo','=','articulos.id')
        ->where('detalle_ingresos.idingreso', '=', $id)
        ->orderBy('detalle_ingresos.id', 'desc')->paginate(1000);
      
        $valor['valor'] = [
            'ingresos' => $ingresos[0],
             'detalle'=>$detalle,
             'numero'=> $ingresos[0]->num_comprobante,
             'tipo_compra'=> $ingresos[0]->tipo_compra,
             'nombre_chofer'=> $ingresos[0]->nombre_chofer,
             'placa_compra'=> $ingresos[0]->placa_compra,
             'fecha_actual' => $today,
             'total' => number_format($ingresos[0]->total,2,",",".")
            ];


           // dd($valor);
    
        // return view('templatesPdf/OverviewTermicPurcharseById', $valor);
       
          $widthDefault=$detalle->count();
          $customPaper = array(0,0,200.00,690+($widthDefault*25));
          $pdf = PDF::loadView('templatesPdf/OverviewTermicPurcharseById', $valor)->setPaper($customPaper,'portrait');
           return $pdf->stream('report.pdf', array('Attachment' => 0));
    }

    public function store(Request $request)
    {
        return null;
    }

    public function desactivar(Request $request)
    {
       return null;
    }
}