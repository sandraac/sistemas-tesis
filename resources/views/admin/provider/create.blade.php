@extends('layouts.admin')
@section('title','Registrar proveedor')
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
            <i class="fas fa-shipping-fast fa-fw"></i> &nbsp; nuevo proveedor
        </h3>
    </div>
    <p class="text-justify">
        En el módulo PROVEEDORES usted podrá registrar los proveedores de productos a los cuales usted les compra productos o mercancía. Además, podrá actualizar los datos de los proveedores, ver todos los proveedores registrados en el sistema, buscar proveedores en el sistema o eliminarlos si así lo desea. 
    </p>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route'=>'providers.store', 'method'=>'POST']) !!}
                    @include('admin.provider._form',[
                        'provider' => new \App\Models\Provider(),
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

@endsection
