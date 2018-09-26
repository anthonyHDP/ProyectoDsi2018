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


    public function destroy($id)
    {
    	$consulta=Consulta::findOrFail($id);
    	$consulta->delete();

    	return Redirect::to('clinica/consulta');
    }
}
