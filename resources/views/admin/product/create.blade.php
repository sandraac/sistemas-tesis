@extends('layouts.admin')
@section('title','Registrar producto')
@section('styles')

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <i class="fas fa-box fa-fw"></i>
            NUEVO PRODUCTO
        </h3>
    </div>
    <p class="text-justify">
        En el módulo PRODUCTOS podrá agregar nuevos productos al sistema, actualizar datos de los productos, eliminar o actualizar la imagen de los productos y buscar productos en el sistema.
    </p>
    {!! Form::open(['route'=>'products.store', 'method'=>'POST','files' => true]) !!}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId"
                            required>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Categoría</label>
                                <select class="select2" id="category" style="width: 100%">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sell_price">Precio de venta</label>
                                <input type="number" name="sell_price" id="sell_price" class="form-control"
                                    aria-describedby="helpId" required>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="short_description">Extracto</label>
                        <textarea class="form-control" name="short_description" id="short_description"
                            rows="3"></textarea>
                    </div> -->

                    <div class="form-group">
                        <label for="long_description">Descripción</label>
                        <textarea class="form-control" name="long_description" id="long_description"
                            rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Categoría</label>
                        <select class="select2" id="category" style="width: 100%">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subcategory_id">Subcategoría</label>
                        <select class="select2" name="subcategory_id" id="subcategory_id" style="width: 100%">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select class="select2" name="provider_id" id="provider_id" style="width: 100%">
                            @foreach ($providers as $provider)
                            <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Etiquetas</label>
                        <select class="select2" name="tags[]" id="tags" style="width: 100%" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach

                        </select>
                    </div>

                </div>
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Imágenes del producto</h4>
                    <input type="file" name="images[]" class="dropify" multiple />
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-info float-right">Registrar</button>
    <a href="{{ URL::previous() }}" class="btn btn-danger">
        Cancelar
    </a>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}

{!! Html::script('melody/js/dropzone.js') !!}


{!! Html::script('ckeditor/ckeditor.js') !!}
<script>
    CKEDITOR.replace('long_description');

</script>
<script>
    $(document).ready(function () {
        $('#category').select2();
        $('#subcategory_id').select2();
        $('#provider_id').select2();
        $('#tags').select2();
    });

</script>
@endsection
