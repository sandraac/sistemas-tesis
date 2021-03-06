@extends('layouts.admin')
@section('title','Gestión de clientes')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="text-left text-uppercase">
            <i class="fas fa-child fa-fw"></i> &nbsp; Clientes
        </h3>
    </div>
    <p class="text-justify">
        En el módulo CLIENTE podrá registrar en el sistema los datos de sus clientes más frecuentes para realizar ventas, además podrá realizar búsquedas de clientes, actualizar datos de sus clientes o eliminarlos si así lo desea.
    </p>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="clients_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <!-- <th>DNI</th>
                                    <th>Teléfono / Celular</th> -->
                                    <th>Correo electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td>
                                        <a href="{{route('clients.show',$client)}}">{{$client->name}}</a>
                                    </td>
                                    <!-- <td>{{$client->dni}}</td>
                                    <td>{{$client->phone}}</td> -->
                                    <td>{{$client->email}}</td>
                                    <td>
                                        <form method="POST" action="{{route('clients.destroy',$client)}}" id="delete-item_{{$client->id}}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a class="btn btn-outline-info" href="{{route('clients.edit', $client)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button class="btn btn-outline-danger delete-confirm"
                                        type="button" onclick="confirmDelete('delete-item_{{$client->id}}')" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
{!! Html::script('js/my_functions.js') !!}
<script>
    $(document).ready(function() {
        var table = $('#clients_listing').DataTable({
            responsive: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            dom:
			"<'row'<'col-sm-2'l><'col-sm-7 text-right'B><'col-sm-3'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>", 
            buttons: [
                {
                    text: '<i class="fas fa-plus"></i> Nuevo Cliente',
                    className: 'btn btn-info',
                    action: function ( e, dt, node, conf ) {
                        window.location.href = "{{route('clients.create')}}"
                    }
                }
            ]
        });
    });
</script>
@endsection
