@extends('layouts.web')
@section('meta_description', 'Remitec SAC')
@section('title', 'REMITEC SAC')
@section('styles')
    
@endsection
@section('content')
<br>
<!--  ultimos productos -->
<div class="latest-product pt-md-30 pt-lg-30 pt-sm-30">
    <div class="container">
        <div class="section-title mb-30">
            <div class="title-icon">
                <i class="fa fa-flash"></i>
            </div>
            <h3>Últimos Productos</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="latest-product-active slick-padding slick-arrow-style">
            
            <!-- @foreach ($new_products as $new_product)
                @include('web.products.product_item_fix', [
                    'mb'=> '',
                    'product'=> $new_product
                ])
            @endforeach -->
            @foreach ($most_viewed_products as $most_viewed_product)
                @include('web.products._category_item', [
                    'product' => $most_viewed_product
                ])
             @endforeach
        </div>
        <!-- featured category end -->
    </div>
</div>
<!-- ultimos productos -->

<br>

<!-- productos destacados -->
<div class="latest-product pt-md-30 pt-lg-30 pt-sm-30">
    <div class="container">
        <div class="section-title mb-30">
            <div class="title-icon">
                <i class="fa fa-flash"></i>
            </div>
            <h3>Productos Destacados</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="latest-product-active slick-padding slick-arrow-style">
            <!-- @foreach ($featured_products->take(10) as $featured_product)
                @include('web.products.product_item_fix', [
                    'mb' => '',
                    'product' => $featured_product
                ])
            @endforeach -->
            @foreach ($most_viewed_products as $most_viewed_product)
                @include('web.products._category_item', [
                    'product' => $most_viewed_product
                ])
             @endforeach
        </div>
        <!-- featured category end -->
    </div>
</div>
<!-- productos destacados -->
<br>

<!-- productos mas vistos -->
<div class="latest-product pt-md-30 pt-lg-30 pt-sm-30">
    <div class="container">
        <div class="section-title mb-30">
            <div class="title-icon">
                <i class="fa fa-flash"></i>
            </div>
            <h3>Productos Más Vistos</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="latest-product-active slick-padding slick-arrow-style">
            @foreach ($most_viewed_products as $most_viewed_product)
                @include('web.products._category_item', [
                    'product' => $most_viewed_product
                ])
             @endforeach
        </div>
        <!-- featured category end -->
    </div>
</div>
<!--productos mas vistos -->





@endsection
@section('scripts')
    
@endsection