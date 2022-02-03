@extends('layouts.admin')
@section('title','REMITEC | Administrador')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }

</style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <a href="{{route('informations.categories')}}" class="col-md-3 grid-margin">
            <div >
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Categorias</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0"></h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <!-- <i class="far fa-clock text-muted"></i> -->
                                        <!-- <small class="ml-1 mb-0">Mes actual</small> -->
                                    </div>
                                </div>
                                <!-- <small class="text-gray">Ventas del sistema POS.</small> -->
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-coins fa-fw text-danger icon-lg"></i>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href="" class="col-md-3 grid-margin">
            <div class="card">
              <div class="card-body">
                  <h4 class="card-title mb-0">Productos</h4>
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="d-inline-block pt-3">
                          <div class="d-md-flex">
                              <h2 class="mb-0"></h2>
                              <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                  <!-- <i class="far fa-clock text-muted"></i> -->
                                  <!-- <small class=" ml-1 mb-0">Mes actual</small> -->
                              </div>
                          </div>
                          <!-- <small class="text-gray">Compras del sistema POS.</small> -->
                      </div>
                      <div class="d-inline-block">
                          <i class="fas fa-boxes fa-fw text-primary icon-lg"></i>                                    
                      </div>
                  </div>
              </div>
          </div>
        </a>

        <a href="" class="col-md-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Proveedores registrados</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-inline-block pt-3">
                            <div class="d-md-flex">
                                <h2 class="mb-0"></h2>
                                <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                    <!-- <i class="far fa-clock text-muted"></i> -->
                                    <!-- <small class="ml-1 mb-0">Mes actual</small> -->
                                </div>
                            </div>
                            <!-- <small class="text-gray">Ventas del sistema POS.</small> -->
                        </div>
                        <div class="d-inline-block">
                            <i class="fas fa-shipping-fast fa-fw text-success icon-lg"></i>                                    
                        </div>
                    </div>
                </div>
            </div>
        </a>


        <a href="" class="col-md-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Clientes</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-inline-block pt-3">
                            <div class="d-md-flex">
                                <h2 class="mb-0"></h2>
                                <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                    <!-- <i class="far fa-clock text-muted"></i> -->
                                    <!-- <small class="ml-1 mb-0">Mes actual</small> -->
                                </div>
                            </div>
                            <!-- <small class="text-gray">Ventas del sistema POS.</small> -->
                        </div>
                        <div class="d-inline-block">
                            <i class="fas fa-users fa-fw text-success icon-lg"></i>                                    
                        </div>
                    </div>
                </div>
            </div>
        </a>
        
    </div>



    <div class="row">

        <a href="" class="col-md-3 grid-margin">
            <div >
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Compras</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0"></h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <!-- <i class="far fa-clock text-muted"></i> -->
                                        <!-- <small class=" ml-1 mb-0">Mes actual</small> -->
                                    </div>
                                </div>
                                <!-- <small class="text-gray">Compras del sistema POS.</small> -->
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-file-invoice-dollar fa-fw text-info icon-lg"></i>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>


        <a href="{{route('informations.sales')}}" class="col-md-3 grid-margin">
            <div >
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Ventas</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0"></h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <!-- <i class="far fa-clock text-muted"></i> -->
                                        <!-- <small class="ml-1 mb-0">Mes actual</small> -->
                                    </div>
                                </div>
                                <!-- <small class="text-gray">Ventas del sistema POS.</small> -->
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-coins fa-fw text-danger icon-lg"></i>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="" class="col-md-3 grid-margin">
            <div >
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Facturación</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0"></h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <!-- <i class="far fa-clock text-muted"></i> -->
                                        <!-- <small class="ml-1 mb-0">Mes actual</small> -->
                                    </div>
                                </div>
                                <!-- <small class="text-gray">Ventas del sistema POS.</small> -->
                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-coins fa-fw text-black icon-lg"></i>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="" class="col-md-3 grid-margin">
            <div >
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Kardex</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0"></h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <!-- <i class="far fa-clock text-muted"></i> -->
                                        <!-- <small class="ml-1 mb-0">Mes actual</small> -->
                                    </div>
                                </div>
                                <!-- <small class="text-gray">Ventas del sistema POS.</small> -->
                            </div>
                            <div class="d-inline-block">
                                <i class="far fa-file text-ligth icon-lg"></i>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/chart.js') !!}




@endsection
