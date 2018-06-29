@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Medico/Doctora: {{$medico->nombre}}</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>	
    		</div>
    		@endif

    		{!!Form::model($medico,['method'=>'PATCH','route'=>['clinica.medico.update',$medico->idMedico]])!!}
    		{{Form::token()}}

    		<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$medico->nombre}}" placeholder="Nombre...">	
    		</div>
            <div class="form-group">
				<label for="especialidad">Especialidad</label>
				<input type="text" name="especialidad" class="form-control" value="{{$medico->especialidad}}" placeholder="Descripcion...">	
    		</div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{$medico->telefono}}" placeholder="Telefono..."> 
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="text" name="correo" class="form-control" value="{{$medico->correo}}" placeholder="Correo..."> 
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{$medico->direccion}}" placeholder="Direccion..."> 
            </div>
    		<div class="form-group">
    			<button class="btn btn-primary" type="submit">Guardar</button>
    			<button class="btn btn-danger" type="reset">Cancelar</button>
    		</div>
    		{!!Form::close()!!}

    	</div>
   </div>
@endsection