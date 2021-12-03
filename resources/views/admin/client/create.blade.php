@extends('layouts.admin')
@section('title','Registrar cliente')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="text-left text-uppercase">
            <i class="fas fa-child fa-fw"></i> &nbsp; nuevo cliente
        </h3>
    </div>
    <p class="text-justify">
        En el módulo CLIENTE podrá registrar en el sistema los datos de sus clientes más frecuentes para realizar ventas, además podrá realizar búsquedas de clientes, actualizar datos de sus clientes o eliminarlos si así lo desea.
    </p>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route'=>'clients.store', 'method'=>'POST','files' => true]) !!}
                    @include('admin.client._form',[
                        'client' => new \App\Models\User(),
                        'btnText' => 'Registrar',
                    ])
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
