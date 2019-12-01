@extends ('layouts.administrador')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<!--<h3>Bitacora<a href="bitacora/create"><button class="btn btn-success">Nuevo</button></a></h3>-->
		<h3 align="center">Bitacora de Usuarios</h3><br>
		@include('seguridad.bitacora.search')

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!--<th>Id</th>-->
					<th>Usuario</th>
					<th>Tipo Usuario</th>
					<th>Descripcion</th>
					<th>Fecha</th>
					<th>Hora</th>
					<!--<th>Opciones</th>-->
				</thead>
               @foreach ($bitacora as $usu)
				<tr>
					<!--<td>{{ $usu->IDBITACORA}}</td>-->
					<td>{{ $usu->name}}</td>
					<td>{{ $usu->nombre}}</td>

					<td>{{ $usu->DESCRIPCIONBITACORA}}</td>
					<td>{{ $usu->FECHABITACORA}}</td>
					<td>{{ $usu->HORABITACORA}}</td>
					
						
					


					</td>
					<!--<td>
						<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>-->
				</tr>
				@include('seguridad.bitacora.modal')
				@endforeach
			</table>
		</div>
		{{$bitacora->render()}}
<br>
<a type="button" href="{{URL::action('BitacoraController@show', $usu->IDBITACORA)}}" value="Reporte" target="_blank" onClick="document.formulario.action='verPDF.php'; document.formuario.submit();"><button class="btn btn-success">Reporte Bitacora</button></a>
		<hr>
            &nbsp
            <a href="{{ url('/seguridad') }}"><button class="btn btn-danger">Regresar</button></a>
            
        </hr>
	</div>
</div>

 

@endsection

@if(session()->has('msj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bitacora Clinica Genesis</title>
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
    <title>CMG</title>
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