<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Consulta;
use sisLog2\Paciente;
use sisLog2\Medico;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\ConsultaFormRequest;
use DB;

class ConsultaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes=DB::table('paciente')->join('consulta','consulta.idPaciente','=','paciente.idPaciente')
            ->where('paciente.apellido','LIKE','%'.$query.'%')
            ->orWhere('paciente.nombre','LIKE','%'.$query.'%')
            ->orWhere('consulta.idConsulta','LIKE','%'.$query.'%')
            ->paginate(7);
            return view('clinica.consulta.index',["pacientes"=>$pacientes,"searchText"=>$query,]);
        }
    }

	
	    public function create()
    {
		$paciente = Paciente:: all();
		$medico = Medico:: all();
    	return view("clinica.consulta.create", compact('paciente'), compact('medico')); 
    }
	
	    public function store(ConsultaFormRequest $request)
    {
    	$consulta = new Consulta;
    	$consulta->nombreConsulta=$request->get('nombreConsulta');
    	$consulta->tipoConsulta=$request->get('tipoConsulta'); 
    	$consulta->fechaConsulta=$request->get('fechaConsulta');
        $consulta->diagnostico=$request->get('diagnostico');
        $consulta->idPaciente=$request->get('idPaciente');
        $consulta->idMedico=$request->get('idMedico');

    	if($consulta->save()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }   


    	return Redirect::to('clinica/consulta');
    }

    public function show($id)
    {
    	return view("clinica.consulta.show",["consulta"=>Consulta::findOrFail($id)]);
    }

    public function edit($id)
    {
		$medico = Medico:: all();
	    $paciente = Paciente:: all();
		
    	return view("clinica.consulta.edit",["consulta"=>Consulta::findOrFail($id)], compact('paciente'), compact('medico'));
    }

    public function update(ConsultaFormRequest $request,$id)
    {
		
    	$consulta=Consulta::findOrFail($id);
    	$consulta->nombreConsulta=$request->get('nombreConsulta');
    	$consulta->tipoConsulta=$request->get('tipoConsulta'); 
    	$consulta->fechaConsulta=$request->get('fechaConsulta');
        $consulta->diagnostico=$request->get('diagnostico');
        $consulta->idPaciente=$request->get('idPaciente');
        $consulta->idMedico=$request->get('idMedico');
    	if($consulta->update()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	return Redirect::to('clinica/consulta');
    }
	

    public function destroy($id)
    {
    	$consulta=Consulta::findOrFail($id);
    	$consulta->delete();

    	return Redirect::to('clinica/consulta');
    }
}