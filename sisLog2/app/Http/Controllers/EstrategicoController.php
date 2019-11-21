<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;
use sisLog2\Http\Requests;
use sisLog2\Pago;
use sisLog2\Paciente;
use sisLog2\TipoConsulta;
use sisLog2\Medico;
use Session;
use DB;
use PDF;
use flash;

class EstrategicoController extends Controller
{
    public function index(Request $request){

    	if ($request)
        {

            $start = $request->from_date;
            $end = $request->to_date;
            if($end <$start){
            Session::flash('mensaje', 'la fecha de inicio debe ser menor a la fecha final');
            return back();
            }

            $cantidad=DB::select("SELECT count('idPago') as cant,pago.idMedico, tipoConsulta.nombreConsulta as tCons  FROM pago inner join tipoConsulta on pago.idTipoConsulta= tipoConsulta.idTipoConsulta where estado= 'Cancelado' GROUP BY tCons ,pago.idMedico");

            /*$cantidad=DB::select("SELECT count('idPago') as cant,pago.idMedico, tipoConsulta.nombreConsulta as tCons  FROM tipoConsulta inner join pago on pago.idTipoConsulta= tipoConsulta.idTipoConsulta  inner join medico on pago.idMedico=medico.idMedico where estado= 'Cancelado' GROUP BY pago.idMedico");*/
            Session::flash('cantidad', $cantidad);
        
            return view('clinica.estrategico.index',["cantidad"=>$cantidad,"fechaInicial"=>$start,"fechaFinal"=>$end]);
        }
    	
    }

    public function show($id)
    {
    	$anys = Session::get('cantidad');
    	$pdf = PDF::loadView('clinica.estrategico.vista',compact('anys'));
        return $pdf->download('Cantidad_Pacientes_Por_Medico.pdf');
      	

    }

}
