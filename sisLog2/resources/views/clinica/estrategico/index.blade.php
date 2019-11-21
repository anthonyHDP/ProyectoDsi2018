@extends ('layouts.admin')
@section ('contenido')
    <?php

use sisLog2\Medico;
?>
                       
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
              <strong>¡Notificacion de Error !</strong> {{ session()->get('mensaje') }}
            </div>
            
          </div>
        @endif
  <div class = "row-fluid">
    <div class = "col-md-3"></div>
    <div class = "col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <center><h3 class = "text-primary">Nombre de Reporte: Cantidad de pacientes atendidos por medico </h3></center>
        <hr style = "border-top:1px dotted #000;"/>
        <div class = "form-inline">

        

        @include('clinica.estrategico.search')
        </div>
      <br/><b/>
      <hr>
            
    </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class = "table-responsive">  
       <table class = "table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr>
                <th style = "width:25%;">Nombre Medico</th>
                <th style = "width:25%;">Especialidad</th>
                <th style = "width:25%;">Cantidad Pacientes</th>

    
                <!--<th>Opciones</th>-->
            </tr>
          </thead>
          <tbody>
            @foreach ($cantidad as $cantidad)
                    <tr>

                      <?php
                      $nomMedico=Medico::findOrFail($cantidad->idMedico);
                      ?>
                        
                        <td>{{ $nomMedico->nombre}}</td>
                        <td>{{ $cantidad->tCons}}</td>
                        <td>{{ $cantidad->cant}}</td>
                        <td>
                           <a type="button" href="{{URL::action('EstrategicoController@show',$cantidad->cant)}}" value="Reporte" target="_blank" onClick="document.formulario.action='verPDF.php'; document.formuario.submit();"><button class="btn btn-warning">Reporte</button></a></td>
                    </tr>
          </tbody>
          
            @endforeach
          
        </table>
      </div>  
      </div>
    </div>
    
  </div>
  </div>
</body>

</html>


  


@endsection

@if(session()->has('msj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clinica Genesis</title>
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
        swal("Error", "En el Procesamiento", "warning");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif