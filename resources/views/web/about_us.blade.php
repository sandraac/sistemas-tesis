@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')
    
@endsection
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            @foreach ($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item
                            @if ($loop->last)
                                active
                            @endif
                            ">
                            @if ($loop->last)
                                {{$breadcrumb['text']}}
                            @else
                            <a href="{{$breadcrumb['url']}}"> {{$breadcrumb['text']}}</a>  
                            @endif
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- about wrapper start -->
<div class="about-us-wrapper pt-4">
    <div class="container">
        <div class="row">
            <!-- About Text Start -->
            <div class="col-lg-6">
                <div class="about-text-wrap">
                    <h2><span>Provide Best</span>Product For You</h2>
                    <p>We provide the best Beard oile all over the world. We are the worldd best store in indi for Beard
                        Oil. You can buy our product without any hegitation because they truste us and buy our product
                        without any hagitation because they belive and always happy buy our product.</p>
                    <p>Some of our customer say’s that they trust us and buy our product without any hagitation because
                        they belive us and always happy to buy our product.</p>
                    <p>We provide the beshat they trusted us and buy our product without any hagitation because they
                        belive us and always happy to buy.</p>
                </div>
            </div>
            <!-- About Text End -->
            <!-- About Image Start -->
            <div class="col-lg-5 ml-auto">
                <div class="about-image-wrap mt-md-26 mt-sm-26">
                    <img src="galio/assets/img/about/about.jpg" alt="About" />
                </div>
            </div>
            <!-- About Image End -->
        </div>
    </div>
</div>
<!-- about wrapper end -->

@endsection
@section('scripts')
    
@endsection

