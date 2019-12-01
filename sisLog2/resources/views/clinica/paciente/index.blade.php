<?php

use sisLog2\Paciente;
?>

@extends ('layouts.admin')
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
        <center><h3 class = "text-primary">Nombre de Reporte: Reporte de Expediente de Pacientes</h3></center>
        <hr style = "border-top:1px dotted #000;"/>
        <div class = "form-inline">

        

        @include('clinica.paciente.search')
        
        </div>
    </div></div></div></div>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Crear Expediente de paciente <a href="paciente/create"><button class="btn btn-success">Nuevo Expediente</button></a></h3>

            
            <hr>
            <h3>Listado de Expediente de paciente</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>No.</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>tipo Sangre</th>
                        <th>sexo</th>
                        <th>estado Civil</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($anys as $any)
                    <tr>
                        <?php
                        $paci=Paciente::findOrFail($any->idPaciente);
                        ?>
                        <td>{{ $paci->idPaciente}}</td>
                        <td>{{ $paci->apellido}}</td>
                        <td>{{ $paci->nombre}}</td>
                        <td>{{ $paci->telefono}}</td>
                        <td>{{ $paci->direccion}}</td>
                        <td>{{ $paci->tipoSangre}}</td>
                        <td>{{ $paci->sexo}}</td>
                        <td>{{ $paci->estadoCivil}}</td>
                        <td>
                            <a type="button" href="{{URL::action('PacienteController@show',$any->idPaciente)}}" value="Reporte" target="_blank" onClick="document.formulario.action='verPDF.php'; document.formuario.submit();"><button class="btn btn-success">Reporte</button></a></a>



                            <a href="" data-target="#modal-delete-{{$any->idPaciente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('clinica.paciente.modal')
                    @endforeach
                </table>
            </div>
            

            <hr>
            &nbsp
            <a href="{{ url('/clinica') }}"><button class="btn btn-danger">Regresar</button></a>
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