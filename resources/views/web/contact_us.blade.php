@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')

@endsection
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area" style="float:center">
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

<!-- contact area start -->
<div class="contact-area pb-34 pb-md-18 pb-sm-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-message">
                    <h2>cuéntanos tu proyecto</h2>
                    {{--  id="contact-form"  --}}
                    <form action="{{route('contact.mail.store')}}"
                        method="post" class="contact-form">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="contact_first_name" placeholder="Nombre *" type="text" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="contact_phone" placeholder="Teléfono *" type="text" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="contact_email_address" placeholder="Correo electrónico *" type="text" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="contact_subject" placeholder="Asunto *" type="text">
                            </div>
                            <div class="col-12">
                                <div class="contact2-textarea text-center">
                                    <textarea placeholder="Mensaje *" name="contact_message" class="form-control2"
                                        required=""></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button class="sqr-btn" type="submit">Enviar mensaje</button>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- contact area end -->

<!-- map area start -->
<!-- <div class="map-area-wrapper">
    <div class="container">
        
        <div id="map_content" 
        data-lat="{{$web_company->latitude}}" 
        data-lng="{{$web_company->length}}" 
        data-zoom="18" 
        data-maptitle="{{$web_company->name}}"
        data-mapaddress="{{$web_company->address}}">

        </div>
    </div>
</div> -->
<!-- map area end -->
@endsection
@section('scripts')

@endsection

