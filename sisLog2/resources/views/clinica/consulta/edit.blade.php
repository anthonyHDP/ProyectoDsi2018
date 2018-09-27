@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Consulta: {{$consulta->nombreConsulta}}</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>	
    		</div>
    		@endif

    		{!!Form::model($consulta,['method'=>'PATCH','route'=>['clinica.consulta.update',$consulta->idConsulta]])!!}
    		{{Form::token()}}

    		<div class="form-group">
                <label for="nombreConsulta">Nombre de Consulta</label>
                <input type="text" name="nombreConsulta" class="form-control" value="{{$consulta->nombreConsulta}}" placeholder="Nombre de Consulta...">  
            </div>
            <div class="form-group">
                <label for="tipoConsulta">Tipo de Consulta</label>
                <input type="text" name="tipoConsulta" class="form-control" value="{{$consulta->tipoConsulta}}" placeholder="Tipo de Consulta...">  
            </div>
			
			<div class="form-group">
			    <label for="idPaciente" class="required">Nombre del Paciente </label>
			    <select name= "idPaciente" id="idPaciente" class="form-control">
                @foreach ($paciente as $paciente)
                    <option value="{{$paciente ['idPaciente']}}">{{$paciente ['nombre']}}
					</option>
                @endforeach 
				
                </select>
            </div>

            <div class="form-group">
                <label for="idMedico" class="required">Nombre del Medico </label>
                <select name= "idMedico" id="idMedico" class="form-control">
                @foreach ($medico as $medico)
                    <option value="{{$medico ['idMedico']}}">{{$medico ['nombre']}}
                    </option>
                @endforeach 
    
                </select>
            </div>
			
            <div class="form-group">
                <label for="fechaConsulta">Fecha de Consulta</label>
                <input type="date" name="fechaConsulta" class="form-control" value="{{$consulta->fechaConsulta}}" placeholder="fecha de Consulta..."> 

            </div>
			<div class="form-group">
                <label for="diagnostico">Diagnostico</label>
                <input type="text" name="diagnostico" class="form-control" value="{{$consulta->diagnostico}}" placeholder="Diagnostico...">  
            </div>


    		<div class="form-group">
    			<button class="btn btn-primary" type="submit">Guardar</button>
    			<button class="btn btn-danger" type="reset">Cancelar</button>
    		</div>
    		{!!Form::close()!!}

    	</div>
   </div>
   <a href="{{URL::action('ConsultaController@index')}}"><button class="btn btn-info">Ver Listado de Pacientes</button></a>
@endsection
@if(session()->has('msj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clinica Medica Betel</title>
</head>
<body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        swal("Procesamiento", "Ejecutado Exitosamente", "success");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif

@if(session()->has('errormsj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clinica Medica Betel</title>
</head>
<body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        swal("Error", "En el Procesamiento", "error");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif