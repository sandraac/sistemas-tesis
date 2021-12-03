@extends('layouts.admin')
@section('title','Editar cliente')
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
            <i class="fas fa-sync fa-fw"></i> &nbsp; actualizar cliente
        </h3>
    </div>
    <p class="text-justify">
        En el módulo CLIENTE podrá registrar en el sistema los datos de sus clientes más frecuentes para realizar ventas, además podrá realizar búsquedas de clientes, actualizar datos de sus clientes o eliminarlos si así lo desea.
    </p>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($client,['route'=>['clients.update',$client], 'method'=>'PUT','files' => true]) !!}
                    @include('admin.client._form',[
                        'btnText' => 'Actualizar',
                    ])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/dropify.js') !!}
@endsection
