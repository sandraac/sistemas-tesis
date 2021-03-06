@extends('layouts.admin')
@section('title','Gestión de proveedores')
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
            <i class="fas fa-shipping-fast fa-fw"></i> &nbsp; proveedores
        </h3>
    </div>
    <p class="text-justify">
        En el módulo PROVEEDORES usted podrá registrar los proveedores de productos a los cuales usted les compra productos o mercancía. Además, podrá actualizar los datos de los proveedores, ver todos los proveedores registrados en el sistema, buscar proveedores en el sistema o eliminarlos si así lo desea. 
    </p>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="providers_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo electrónico</th>
                                    <th>Teléfono/Celular</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                <tr>
                                    <th scope="row">{{$provider->id}}</th>
                                    <td>
                                        <a href="{{route('providers.show',$provider)}}">{{$provider->name}}</a>
                                    </td>
                                    <td>{{$provider->email}}</td>
                                    <td>{{$provider->phone}}</td>
                                    <td style="width: 20%;">
                                        
                                        <form method="POST" action="{{route('providers.destroy',$provider)}}" id="delete-item_{{$provider->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a class="btn btn-outline-info" href="{{route('providers.edit', $provider)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="btn btn-outline-danger delete-confirm"
                                        type="button" onclick="confirmDelete('delete-item_{{$provider->id}}')" title="Eliminar">
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
        var table = $('#providers_listing').DataTable({
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
                    text: '<i class="fas fa-plus"></i> Nuevo Proveedor',
                    className: 'btn btn-info',
                    action: function ( e, dt, node, conf ) {
                        window.location.href = "{{route('providers.create')}}"
                    }
                }
            ]
        });
    });
</script>
@endsection
