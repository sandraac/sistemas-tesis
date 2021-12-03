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
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title"></h4>
                        <div class="btn-group">
                            <a href="{{route('categories.create')}}" type="button" class="btn btn-info ">
                                <i class="fas fa-plus"></i> Nueva Categoría
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="category_listing" class="table tree">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                @include('admin.category._category_list', [
                                    'item' => $category,
                                    'form_number' => '0'
                                ])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>
            </div>
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
