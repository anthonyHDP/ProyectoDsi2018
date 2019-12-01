<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Paciente;
use PDF;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\PacienteFormRequest;
use DB;

use Carbon\Carbon;
use flash;
use Session;

class PacienteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        /*if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes=DB::table('paciente')->where('apellido','LIKE','%'.$query.'%')
            ->orWhere('nombre','LIKE','%'.$query.'%')
            ->orWhere('telefono','LIKE','%'.$query.'%')
            ->orWhere('direccion','LIKE','%'.$query.'%')
            ->orWhere('fechaNacimiento','LIKE','%'.$query.'%')
            ->orWhere('tipoSangre','LIKE','%'.$query.'%')
            ->orWhere('sexo','LIKE','%'.$query.'%')
            ->orWhere('estadoCivil','LIKE','%'.$query.'%')
            ->orderBy('idPaciente','desc')
            ->paginate(7);
            return view('clinica.paciente.index',["pacientes"=>$pacientes,"searchText"=>$query]);
        }*/
         if ($request)
        {

            $start = $request->from_date;
            $end = $request->to_date;
            if($end <$start){
            Session::flash('mensaje', 'la fecha de inicio debe ser menor o igual a la fecha final');
            return back();
            }
            $anys = DB::table('paciente')->whereBetween('FECHAPACIENTE', [$start, $end])->get();
            Session::flash('anys', $anys);

            return view('clinica.paciente.index',["anys"=>$anys,"fechaInicial"=>$start,"fechaFinal"=>$end]);
    }
}

    public function create()
    {
    	return view("clinica.paciente.create"); 
    }

    public function store(PacienteFormRequest $request)
    {
    	$paciente = new Paciente;
        $hoy=Carbon::now();

    	$paciente->nombre=$request->get('nombre');
    	$paciente->apellido=$request->get('apellido'); 
    	$paciente->telefono=$request->get('telefono');
        $paciente->tipoSangre=$request->get('tipoSangre');
        $paciente->direccion=$request->get('direccion');
        $paciente->fechaNacimiento=$request->get('fechaNacimiento');
        $paciente->sexo=$request->get('sexo');
        $paciente->estadoCivil=$request->get('estadoCivil');
        $paciente->FECHAPACIENTE=$hoy;
    	if($paciente->save()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }   


    	return Redirect::to('clinica/paciente');
    }

    /*public function show($id)
    {
        $paciente=Paciente::findOrFail($id);
        $pdf = PDF::loadView("clinica.paciente.vista",["paciente"=>$paciente]);
        return $pdf->stream($paciente->nombre);
    	//return view("clinica.paciente.show",["paciente"=>Paciente::findOrFail($id)]);
    }*/

    public function show($id)
    {
        $anys = Session::get('anys');
        Session::flash('anys', $anys);
        $pdf = PDF::loadView('clinica.paciente.vista2',compact('anys'));
        return $pdf->stream('ReporteExpedientes.pdf');
    }

    public function edit($id)
    {
    	return view("clinica.paciente.edit",["paciente"=>Paciente::findOrFail($id)]);
    }

    public function update(PacienteFormRequest $request,$id)
    {
    	$paciente=Paciente::findOrFail($id);
    	$paciente->nombre=$request->get('nombre');
        $paciente->apellido=$request->get('apellido'); 
        $paciente->telefono=$request->get('telefono');
        $paciente->tipoSangre=$request->get('tipoSangre');
        $paciente->direccion=$request->get('direccion');
        $paciente->fechaNacimiento=$request->get('fechaNacimiento');
        $paciente->sexo=$request->get('sexo');
        $paciente->estadoCivil=$request->get('estadoCivil');
    	if($paciente->update()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	return Redirect::to('clinica/paciente');
    }

    public function destroy($id)
    {
    	$paciente=Paciente::findOrFail($id);
    	if($paciente->delete()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	return Redirect::to('clinica/paciente');
    }
}
