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
            <i class="fas fa-tags fa-fw"></i>
            Categorías
        </h3>
    </div>
    <p class="text-justify">
        En el módulo CATEGORÍA usted podrá registrar las categorías que servirán para agregar productos y también podrá ver los productos que pertenecen a una categoría determinada. Además de lo antes mencionado, puede actualizar los datos de las categorías, realizar búsquedas de categorías o eliminarlas si así lo desea.
    </p>
    <div class="card">
        <div class="card-body">
          
                <img src="{!!asset('galio/assets/img/information/cat_list.png')!!}"  width="980px">
      
        </div>
    </div>
    <br>
    <div class="page-header">
        <h3 class="page-title">
            Agregar Categoría
        </h3>
    </div>
    <div class="card">
        <div class="card-body">
            
            <img src="{!!asset('galio/assets/img/information/cat_new.png')!!}"  width="980px">
                
        </div>
    </div>
    <br>
    <div class="page-header">
        <h3 class="page-title">
            Actualizar Categoría
        </h3>
    </div>
    <div class="card">
        <div class="card-body">
            
            <img src="{!!asset('galio/assets/img/information/cat_edit.png')!!}"  width="980px">
                
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
