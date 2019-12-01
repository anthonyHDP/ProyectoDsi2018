<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Bitacora;
use sisLog2\User;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\UsuarioFormRequest;
use sisLog2\Http\Requests\UsuarioFormRequest2;
use DB;
use PDF;
use Session;
use Flash;
use get;
class BitacoraController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	$query=trim($request->get('searchText'));
    	
        $bitacora=DB::table('bitacora')->join('users','users.id','=','bitacora.IDUSUARIO')
        
        ->join('tipos_usuario', 'tipos_usuario.id', '=', 'users.tipoUsuario')
        
        ->where('name','LIKE', '%'.$query.'%')
        ->orWhere('tipos_usuario.nombre','LIKE', '%'.$query.'%')    
        ->orWhere('DESCRIPCIONBITACORA','LIKE', '%'.$query.'%')
        ->orWhere('FECHABITACORA','LIKE', '%'.$query.'%')
        ->orWhere('HORABITACORA','LIKE', '%'.$query.'%')

    	->orderBy('IDBITACORA','desc')

    	->paginate(7);
        Session::flash('bitacora',$bitacora);
    	return view('seguridad.bitacora.index',["bitacora"=>$bitacora,"searchText"=>$query]);
        //return view('seguridad.bitacora.index', compact('bitacora','searchText'));

       

    }

    public function create()
     {
     	return view("seguridad.bitacora.create");
     }


    public function store(UsuarioFormRequest $request)
    {
    	$usuario=new User;
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
        $usuario->tipoUsuario=$request->get('idtipo');
    	if($usuario->save()){

            return back()->with('msj','Datos Guardados');
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	return Redirect::to('seguridad/usuario');
    }

    public function edit($id)
    {
    	return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(UsuarioFormRequest2 $request, $id)
    {
    	$usuario=User::findOrFail($id);
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
        $usuario->tipoUsuario=$request->get('idtipo');
    	if($usuario->update()){
             return back()->with('msj','Datos Guardados');

        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
    	return Redirect::to('seguridad/usuario');

    }

    public function destroy($id)
    {
    	$usuario = DB::table('users')->where('id','=', $id)->delete();
        return back()->with('msj','Datos Guardados');
        return Redirect::to('seguridad/usuario');
    }

     public function show($id)
    {
        
        $bitacora=Bitacora::findOrFail($id);
        $bitacora=Session::get('bitacora');

        $pdf = PDF::loadView("seguridad.bitacora.vista",compact('bitacora'));
        return $pdf->stream('ReporteBitacora');
        //return view("clinica.paciente.show",["paciente"=>Paciente::findOrFail($id)]);
    }












}
