<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;
use sisLog2\Http\Requests;
use sisLog2\Pago;
use sisLog2\Paciente;
use sisLog2\TipoConsulta;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\PagoFormRequest;
use DB;

class PagoController extends Controller
{
    //
    public function __construct(){
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pagos=DB::table('pago')->join('paciente','paciente.idPaciente','=','pago.idPaciente')
            ->join('tipoConsulta','tipoConsulta.idTipoConsulta','=','pago.idtipoConsulta')
            ->select('idPago','paciente.nombre','tipoConsulta.nombreConsulta','estado','total','fechaEmitido')
            ->where('pago.estado','=','Pendiente')
            ->orwhere('paciente.apellido','LIKE','%'.$query.'%')
            ->orWhere('paciente.nombre','LIKE','%'.$query.'%')
            ->orWhere('pago.fechaEmitido','LIKE','%'.$query.'%')
            ->paginate(7);
           
            return view('clinica.pago.index',["pagos"=>$pagos,"searchText"=>$query,]);
        }
    }

    public function create()
    {

    }
    
    public function store(ConsultaFormRequest $request)
    {
      
    }
   

    public function show($id)
    {

        return view('clinica.pago.estadistica');

    }

    public function edit($id)
    {
        $pago=Pago::findOrFail($id);
        
        $pago->fechaCancelado;
        
        $pago->update();
        
        return Redirect::to('clinica/pago');
    }


    public function update(PagoFormRequest $request,$id)
    {
        
        $pago=Pago::findOrFail($id);
        $pago->estado='Cancelado';
        $pago->fechaCancelado;

        $pago->update();
        
        return Redirect::to('clinica/pago');
    }


    public function destroy($id)
    {
    	
    }

    
}
