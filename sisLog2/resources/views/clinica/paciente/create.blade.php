@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Crear Nuevo Expediente de Paciente</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'clinica/paciente','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="Apellido...">  
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre...">  
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Telefono...">    
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Direccion...">    
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="text" name="fechaNacimiento" class="form-control" placeholder="fecha de Nacimiento...">    
            </div>
            <div class="form-group">
                <label for="tipoSangre">Tipo de Sangre</label>
                <input type="text" name="tipoSangre" class="form-control" placeholder="Tipo de Sangre...">    
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <input type="text" name="sexo" class="form-control" placeholder="Sexo...">    
            </div>
            <div class="form-group">
                <label for="estadoCivil">Estado Civil</label>
                <input type="text" name="estadoCivil" class="form-control" placeholder="Estado Civil...">    
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}

        </div>
   </div>
@endsection