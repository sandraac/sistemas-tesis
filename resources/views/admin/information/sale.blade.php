@extends('layouts.admin')
@section('title','Gestión de categorías')
@section('styles')
{!! Html::style('treegrid/css/jquery.treegrid.css') !!}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        <i class="fas fa-coins fa-fw"></i> VENTAS REALIZADAS
        </h3>
    </div>
    <p class="text-justify">
        En el módulo VENTAS podrá realizar ventas de productos. También puede ver las ventas realizadas y buscar ventas en el sistema.
    </p>
    <div class="card">
        <div class="card-body">
            <img src="{!!asset('galio/assets/img/information/sale_list.png')!!}"  width="980px">
        </div>
    </div>
    <br>
    <div class="page-header">
        <h3 class="page-title">
            REGISTRAR
        </h3>
    </div>
    <div class="card">
        <div class="card-body">
            
            <img src="{!!asset('galio/assets/img/information/sale_new.png')!!}"  width="980px">
                
        </div>
    </div>
    <br>
    <div class="page-header">
        <h3 class="page-title">
            PDF
        </h3>
    </div>
    <div class="card">
        <div class="card-body">
            
            <img src="{!!asset('galio/assets/img/information/sale_pdf.png')!!}"  width="980px">
                
        </div>
    </div>
    <br>
    <div class="page-header">
        <h3 class="page-title">
            DETALLE
        </h3>
    </div>
    <div class="card">
        <div class="card-body">
            
            <img src="{!!asset('galio/assets/img/information/sale_detail.png')!!}"  width="980px">
                
        </div>
    </div>

</div>
@endsection
@section('scripts')

{!! Html::script('treegrid/js/jquery.treegrid.js') !!}
{!! Html::script('js/my_functions.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('.tree').treegrid().treegrid('collapseAll');
    });
</script>
@endsection
