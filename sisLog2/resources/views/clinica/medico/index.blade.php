<?php

use sisLog2\Medico;
?>

@extends ('layouts.administrador')
@section ('contenido')
    

    <!DOCTYPE html>
<html lang = "es">
  <head>
    <center><title>Búsqueda simple por rangos de fechas</title></center>
    <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css"/>
    <link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css"/>
    <meta charset = "UTF-8" name = "viewport" content = "width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>
<body>
  
  
@if(session()->has('mensaje'))
          <div class="row">
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden= "true">&times;</button>
              <strong>¡¡Notificacion de Error !</strong> {{ session()->get('mensaje') }}
            </div>
            
          </div>
        @endif

  
  <div class = "row-fluid">
    <div class = "col-md-3"></div>
    <div class = "col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <center><h3 class = "text-primary">Nombre de Reporte: Reporte de Medicos</h3></center>
        <hr style = "border-top:1px dotted #000;"/>
        <div class = "form-inline">

        

        @include('clinica.medico.search')
        
        </div>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Medico/Doctor <a href="medico/create"><button class="btn btn-success">Nuevo</button></a></h3>
            
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Opciones</th>
                    </thead>
                     @foreach ($anys as $any)
                    <tr>
                        <?php
                        $med=Medico::findOrFail($any->idMedico);
                        ?>
                        <td>{{ $med->idMedico}}</td>
                        <td>{{ $med->nombre}}</td>
                        <td>{{ $med->especialidad}}</td>
                        <td>{{ $med->telefono}}</td>
                        <td>{{ $med->correo}}</td>
                        <td>{{ $med->direccion}}</td>
                        <td>
                            <a href="{{URL::action('MedicoController@edit', $any->idMedico)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$any->idMedico}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

                          <a type="button" href="{{URL::action('MedicoController@show',$any->idMedico)}}" value="Reporte" target="_blank" onClick="document.formulario.action='verPDF.php'; document.formuario.submit();"><button class="btn btn-success">Reporte</button></a></a>

                        </td>
                    </tr>
                    @include('clinica.medico.modal')
                    @endforeach
                </table>
            </div>
            

            <hr>
            &nbsp
            <a href="{{ url('/seguridad') }}"><button class="btn btn-danger">Regresar</button></a>
        </div>
    </div>


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
    <title>Clinica Medica Genesis</title>
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