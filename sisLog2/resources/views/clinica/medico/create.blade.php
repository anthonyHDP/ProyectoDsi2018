@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Crear Nuevo Medico</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'clinica/medico','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="nombre" class="required">Nombre</label>
                <input type="text" value="{{old('nombre')}}"name="nombre" class="form-control" placeholder="Nombre...">  
            </div>
            <div class="form-group">
                <label for="especialidad" class="required">Especialidad</label>
                <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" placeholder="Especialidad...">    
            </div>
            <div class="form-group">
                <label for="telefono" class="required">Telefono</label>
                <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" placeholder="Telefono...">    
            </div>
            <div class="form-group">
                <label for="correo" class="required">Correo</label>
                <input type="text" value="{{old('correo')}}" name="correo" class="form-control" placeholder="Correo...">    
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" value="{{old('direccion')}}" name="direccion" class="form-control" placeholder="Direccion...">    
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}

        </div>
   </div>
@endsection