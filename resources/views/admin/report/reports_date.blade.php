@extends('layouts.admin')
@section('title','Reporte por rango de fecha')
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
            Reporte por rango de fecha
        </h3>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte por rango de fecha</li>
            </ol>
        </nav> -->
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route'=>'report.results', 'method'=>'POST']) !!}
                    <div class="row ">
                        <div class="col-12 col-md-3">
                            <span>Fecha inicial</span>
                            <div class="form-group">
                                <input class="form-control" type="date" 
                                value="{{old('fecha_ini')}}" 
                                name="fecha_ini" id="fecha_ini">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <span>Fecha final</span>
                            <div class="form-group">
                                <input class="form-control" type="date" 
                                value="{{old('fecha_fin')}}" 
                                name="fecha_fin" id="fecha_fin">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">

                            @if(isset($fecha1)) 
                            <input class="form-control" type="hidden" 
                                value="{{$fecha1}}" 
                                name="fechainicio" id="fechainicio">
                            @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center mt-4">
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                <strong>s/ {{$total}}</strong>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                @include('admin.report._sales_list')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-line"></i>
                        Ventas diarias
                    </h4>
                    <canvas id="ventas_diarias" height="100"></canvas>
                    <div id="orders-chart-legend" class="orders-chart-legend"></div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
<script>
    window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
      }

      var varVenta=document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($sales as $sale)
                {
                    $dia = $sale->sale_date;


                    echo '"'. $dia.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($sales as $reg)
                        {echo ''. $reg->total.',';} ?>],
                        backgroundColor: '#5E50F9',
                        borderColor: '#3a3f51',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                            stepSize: 1,
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });
    
</script>

@endsection
