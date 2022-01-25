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
<div class="content-wrapper" id="pdf">
    {{--  <div class="page-header">
        <h3 class="page-title">
            Panel administrador
        </h3>
    </div>  --}}

   
    <div class="row">
    </div>



    <div class="row">
        <div class="col-12">
            <p class="text-uppercase font-weight-bold text-center">kardex ({{$product->name}})</p>
        </div>

        <div class="col-12 col-lg-4">
            <p class="text-center text-uppercase font-weight-bold bg-dark" style="color: #FFF;">Entradas</p>
            <ul class="list-group">
                @if(is_null($kardex->input_units))
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Entrada de unidades
                        <span>0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Costo de unidades
                        <span>S/ 0.0</span>
                    </li>
                @else
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Entrada de unidades
                        <span>{{$kardex->input_units}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Costo de unidades
                        <span>S/ {{$kardex->input_cost}}</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="col-12 col-lg-4">
            <p class="text-center text-uppercase font-weight-bold bg-dark" style="color: #FFF;">Salidas</p>
            <ul class="list-group">
                @if(is_null($kardex->output_units))
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Salida de unidades
                        <span>0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Costo de unidades
                        <span>S/ 0.0</span>
                    </li>
                @else
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Salida de unidades
                        <span>{{$kardex->output_units}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Costo de unidades
                        <span>$/ {{$kardex->output_cost}}</span>
                    </li>
                @endif
                
            </ul>
        </div>

        <div class="col-12 col-lg-4">
            <p class="text-center text-uppercase font-weight-bold bg-dark" style="color: #FFF;">Existencias</p>
            <ul class="list-group">

                @if(is_null($kardex->input_units))
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Inventario inicial
                        <span>{{$product->stock}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Inventario actual
                        <span>{{$product->stock-$kardex->ouput_units}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Costo inventario actual
                        <span>$-34.00 USD</span>
                    </li>
                @else
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Inventario inicial
                        <span>{{$product->stock}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Inventario actual
                        <span>{{$product->stock+$kardex->input_units}}</span>
                    </li>
                @endif

                
            </ul>
        </div>

    </div>

    <div class="container-fluid">
        <p class="text-uppercase font-weight-bold text-center">Detalles de kardex</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="bg-info">
                    <tr class="text-center text-uppercase">
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="text-center">
                        <th scope="row">1</th>
                        <td>{{date('d-m-Y', strtotime($kardex->kardex_date))}}</td>
                        @if(is_null($kardex->input_units))  
                            <td>Salida</td>
                            
                        @else
                            <td>Entrada</td>
                        @endif
                        @if(is_null($kardex->input_units))  
                            <td>Venta de producto</td>
                        @else
                            <td>Compra de producto</td>
                        @endif
                        @if(is_null($kardex->input_units))  
                        <td>{{$kardex->ouput_units}}</td>
                        @else
                        <td>{{$kardex->input_units}}</td>
                        @endif
                        
                        <td>{{$product->sell_price}}</td>

                        @if(is_null($kardex->input_units))  
                        <td>S/ {{$product->sell_price*$kardex->ouput_units}}</td>
                        @else
                        <td>S/ {{$product->sell_price*$kardex->input_units}}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<button type="button"  class="btn btn-primary" id="btnCrearPdf">Imprimir</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btnCrearPdf");
        $boton.addEventListener("click", () => {
            var element = document.querySelector('#pdf');
            var opt = {
                margin:       0.2,
                filename:     'myfile.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            // New Promise-based usage:
            html2pdf(element, opt);
        });
</script>
@endsection
