@extends ('layouts.admin')
@section ('contenido')

<div class="form-group">
                <label for="nombrePaciente" class="required">Nombre Paciente:</label>
                <input type="text" value="{{$receta->nombrePaciente}}" name="nombrePaciente" class="form-control">  
</div>

<h4><strong>Indicaciones: </strong></h4>
<div class="form-group">
    <textarea class="form-control" rows="10" name="indicaciones" value="{{$receta->indicaciones}}">{{$receta->indicaciones}}</textarea>
</div>
<hr>
<h4><strong>fecha: {{$receta->fecha}}</strong></h4>
<hr>
<!--
<a href="{{ url('imprimir') }}"><button class="btn btn-info">Imprimir Receta</button></a>  -->
<!--<a href="{{URL::action('RecetaController@show', $paciente->idPaciente)}}"><button class="btn btn-info">Imprimir Receta</button></a>-->
<a href="{{URL::action('RecetaController@show', $receta->idReceta)}}"><button class="btn btn-warning" >Reporte</button></a>

&nbsp &nbsp &nbsp &nbsp &nbsp
<a href="{{ url('/clinica/receta') }}"><button class="btn btn-danger">Regresar</button></a>
@endsection