@extends('layouts.admin')
@section('title','Registrar categoría')
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
            <i class="fas fa-tags fa-fw"></i>
            Nueva Categoría
        </h3>
    </div>
    <p class="text-justify">
        En el módulo CATEGORÍA usted podrá registrar las categorías que servirán para agregar productos y también podrá ver los productos que pertenecen a una categoría determinada. Además de lo antes mencionado, puede actualizar los datos de las categorías, realizar búsquedas de categorías o eliminarlas si así lo desea.
    </p>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
                    <div class="form-group" style="display: none">
                      <label for="category_type">Modulo</label>
                      <select class="form-control
                        @error('category_type') 
                            is-invalid 
                        @enderror
                        " name="category_type" id="category_type" onchange="showInp()" required >
                            <option value="PRODUCT" selected>Productos</option>
                            <option value="POST">Publicaciones</option>
                        </select>
                        @error('category_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" 
                        class="form-control
                        @error('name') 
                            is-invalid 
                        @enderror
                        " required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="description">Descripción</label>
                      <textarea 
                      class="form-control
                        @error('description') 
                            is-invalid 
                        @enderror
                      " 
                      name="description" 
                      id="description" 
                      rows="3"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div id="parent_div">
                            <label for="parent_id">Categoría superior</label>
                            <select class="select2" style="width: 100%" name="parent_id" id="parent_id">
                                <option value="" selected>-- Ninguna --</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                  {{old('parent_id') == $category->id ? 'selected' : ''}}
                                  >{{$category->name}}</option>
                                @endforeach
                            </select>
                            <small id="helpId" class="text-muted">Seleccione una categoría superior si desea crear una subcategoría.</small>
                        </div>
                    </div>
                    @include('admin.category._form',[
                        'category' => new \App\Models\Category()
                    ])
                    <button type="submit" class="btn btn-info mr-2">Registrar</button>
                    <a href="{{route('categories.index')}}" class="btn btn-danger">
                        Cancelar
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function showInp(){
        getSelectValue = document.getElementById("type").value;
        if(getSelectValue=="PRODUCT"){
          document.getElementById("icon_div").style.display = "inline";
          document.getElementById("parent_div").style.display = "inline";
        }else if(getSelectValue=="POST"){
          document.getElementById("icon_div").style.display = "none";
          document.getElementById("parent_div").style.display = "none";
        }
      }
</script>
<script>
    $(document).ready(function () {
        document.getElementById("parent_div").style.display = "none";
        document.getElementById("icon_div").style.display = "none";
        
        $(document).on('change', '#parent_id', function(event) {
            parent_text = $("#parent_id option:selected").text();
            if(parent_text == '-- Ninguna --'){
                document.getElementById("icon_div").style.display = "inline";
            }else{
                document.getElementById("icon_div").style.display = "none";
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#parent_id').select2();
        $('#icon').select2();
    });
</script>
@endsection
