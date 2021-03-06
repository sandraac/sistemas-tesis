@extends('layouts.admin')
@section('title','Gestión de compras')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
@endsection
@section('create')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        <i class="fas fa-file-invoice-dollar fa-fw"></i> COMPRAS REALIZADAS
    </div>
    <p class="text-justify">
        En el módulo COMPRAS usted podrá registrar compras de productos ya sea nuevos o ya registrados en sistema. También puede ver la lista de todas las compras realizadas, buscar compras y ver información más detallada de cada compra. 
    </p>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="purchases_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('purchases.show', $purchase)}}">{{$purchase->id}}</a>
                                    </th>
                                    <td>
                                        {{\Carbon\Carbon::parse($purchase->purchase_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$purchase->total}}</td>

                                    @if ($purchase->status == 'VALID')
                                    <td>
                                        <small class="p-1 bg-warning text-white rounded">Registrado</small>
                                    </td>
                                    @else
                                    <td>
                                        <small class="p-1 bg-success text-white rounded">Aprobado</small>
                                    </td>
                                    @endif

                                    @if ($purchase->status == 'VALID')
                                    <td>
                                        <form method="POST" action="{{route('purchases.destroy',$purchase)}}" id="delete-item_{{$purchase->id}}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a class="btn btn-outline-info" href="{{route('purchases.edit', $purchase)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button class="btn btn-outline-danger delete-confirm"
                                        type="button" onclick="confirmDelete('delete-item_{{$purchase->id}}')" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.purchases', $purchase)}}" title="Cancelado">
                                            Aprobar <i class="fas fa-check"></i>
                                        </a> 
                                        </form>
                                    </td>
                                    @else
                                    <td style="width: 20%;">
                                        <a href="{{route('purchases.pdf', $purchase)}}" class="btn btn-outline-danger"
                                        title="Generar PDF"
                                        ><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('purchases.show', $purchase)}}" class="btn btn-outline-info"
                                        title="Ver detalles"
                                        ><i class="far fa-eye"></i></a>
                                    </td>
                                    @endif
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
        var table = $('#purchases_listing').DataTable({
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
                    text: '<i class="fas fa-plus"></i> Nueva Compra',
                    className: 'btn btn-info',
                    action: function ( e, dt, node, conf ) {
                        window.location.href = "{{route('purchases.create')}}"
                    }
                }
            ]
        });
    });
</script>
@endsection
