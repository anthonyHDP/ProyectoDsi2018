@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Pagos pendientes </h3>
            @include('clinica.pago.search')
        </div>
    </div>

	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre Paciente</th>
                        <th>Consulta</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->idPago}}</td>
                        <td>{{ $pago->nombre}}</td>
                        <td>{{ $pago->nombreConsulta}}</td>
                        <td>{{ $pago->estado}}</td>
                        <td>{{ $pago->fechaEmitido }}</td>
                        <td>{{ $pago->total}}</td>
                        <td>
                            <a href="" data-target="#modal-edit-{{ $pago->idPago }}" data-toggle="modal"><button class="btn btn-success">Pagar</button></a>
                            <a href="{{URL::action('PagoController@show', $pago->idPago)}}"><button class="btn btn-warning" >Factura</button></a>
                            <a href="" data-target="#modal-delete-{{$pago->idPago}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('clinica.pago.edit')
                    @include('clinica.pago.modal')
                    @endforeach
                </table>
            </div>
            {{$pagos->render()}}
        </div>
    </div>
@endsection