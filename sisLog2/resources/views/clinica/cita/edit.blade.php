@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Cita</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>	
    		</div>
    		@endif

    		{!!Form::model($cita,['method'=>'PATCH','action'=>array('CitaController@store',$cita->id)])!!}
    		{{Form::token()}}

            <div class="form-group">
                <label for="nombrePaciente" class="required">Nombre del Paciente</label>
                <input type="text" value="{{ $cita->nombrePaciente }}" name="nombrePaciente" class="form-control" placeholder="Nombre Paciente...">  
            </div>
            <!-- Seleccion de Medico   -->
            <div class="form-group">
                <label for="nombreMedico" class="required">Nombre del Medico</label>
                <select name="nombreMedico" id="input" class="form-control" value="{{$cita->nombreMedico}}">
                    <option value="">Seleccione el medico</option>
                    @foreach ($medicos as $medico)
                    <!-- valor de value es por el id del medico  y muestra el nombre del medico-->
                        <option value="{{ $medico['idMedico'] }}"> {{ $medico['nombre'] }}</option>
                    @endforeach
                </select>
  
            </div>
            <div class="form-group">
                <label for="fechaCita" class="required">Fecha de la Cita</label>
                <input type="date" value="{{ $cita->fechaCita }}" name="fechaCita" class="form-control" placeholder="fecha cita...">    
            </div>
            <div class="form-group">
                <label for="horaCita" class="required">Hora de la Cita</label>
                <input type="time" value="{{$cita->horaCita}}" name="horaCita" class="form-control" placeholder="00:00:00">   
            </div>

            <div class="form-group">
                <label for="tipoCita" class="required">Tipo de Consulta</label>
                <select name="tipoCita" id="input" class="form-control" value="{{$cita->tipoCita }}">
                    <option value="">Seleccione el tipo de consulta</option>
                    <option value="consulta general"> Consulta general</option>
                    <option value="control de embarazo">Control de embarazo</option>
                    <option value="control de niño">Control de niño</option>
                    <option value="oftalmologia">Oftalmologia</option>
                    <option value="dermatologia">Dermatologia</option>
                </select>
            </div>

    		<div class="form-group">
    			<button class="btn btn-primary" type="submit">Guardar</button>
    			<button class="btn btn-danger" type="reset">Cancelar</button>
    		</div>
    		{!!Form::close()!!}

    	</div>
   </div>
@endsection