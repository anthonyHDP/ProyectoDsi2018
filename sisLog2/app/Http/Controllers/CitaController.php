<?php

namespace sisLog2\Http\Controllers;
use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Cita;
use sisLog2\Medico;
use sisLog2\Paciente;
use Calendar;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\CitaFormRequest;
use DB;


class CitaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $medicos=Medico::all();
            $query=trim($request->get('searchText'));
            $citas=DB::table('cita')->where('nombrePaciente','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            
            $citas = Cita::all();
            
            return view('clinica.cita.index', ["citas"=>$citas, "medicos"=>$medicos, "searchText"=>$query]);
        }  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $medicos = Medico::all();
        return view("clinica.cita.create", ["medicos"=>$medicos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitaFormRequest $request)
    {
        $cita = new Cita;
        $cita->nombrePaciente=$request->get('nombrePaciente');
        $cita->nombreMedico=$request->get('nombreMedico');
        $cita->fechaCita=$request->get('fechaCita')." ".$request->get('horaCita');
        $cita->horaCita=$request->get('horaCita');
        $cita->tipoCita=$request->get('tipoCita');
        $cita->reservacionCita=$request->get('reservacionCita');

        if($cita->tipoCita=="consulta general"){
            $cita->color="#8be55e";
        }elseif($cita->tipoCita=="oftalmologia"){
                $cita->color="#dff210";
            }elseif ($cita->tipoCita=="dermatologia") {
                $cita->color="#0ff1d3";
            }elseif ($cita->tipoCita=="control de embarazo") {
                $cita->color="#ef9eee";
            }elseif ($cita->tipoCita=="control de niño") {
                $cita->color="#ef8e39";
            }

        $cita->save();
        return Redirect::to('clinica/cita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("clinica.cita.show",["cita"=>Cita::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = Medico::all();
        return view("clinica.cita.edit",["cita"=>Cita::findOrFail($id)],["medicos"=>$medicos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitaFormRequest $request , $id)
    {
        $cita=Cita::findOrFail($id);
        $cita->nombrePaciente=$request->get('nombrePaciente');
        $cita->nombreMedico=$request->get('nombreMedico');
        $cita->fechaCita=$request->get('fechaCita');
        $cita->horaCita=$request->get('horaCita');
        $cita->tipoCita=$request->get('tipoCita');
        $cita->reservacionCita=$request->get('reservacionCita');
        $cita->update();

        return view('clinica/cita/index');

    }
       public function delete(){
        //Valor id recibidos via ajax
        $id = $_POST['id'];
        Cita::destroy($id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita=Cita::findOrFail($id);
        $cita->delete();

        return Redirect::to('clinica/cita');
    }
}