@extends('layouts.user_master')
@section('title','Services')
@section('content')
    <!--banner part start here-->
     <div class="banner-area owl-carousel h-300">
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/services/services1.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/services/services2.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!--banner-area part end here-->
    <!--services-area start here-->
    <section class="service-part pt-70 pb-70">
        <div class="service-header">
            <h3>our services</h3>
            <div class="container">
                <div class="services">
                    <div class="row services">
                        <div class="col-md-6">
                            <div class="single-service-part text-center">
                                <h2>call for ambulance</h2>
                                <h4>contact here-> <a href="tel:0123456789">0123456789</a></h4>
                                <a href="{{action('User\ServicesController@services_form')}}" class="box-btn">Apply</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-service-part">
                                <img src="{{asset('public/user_asset')}}/images/otherServices/ambulance2.jpg" alt="">
                            </div>
                        </div>
                    </div> 
                    <div class="row services pt-30 pb-30">
                        <div class="col-md-6">
                            <div class="single-service-part">
                                <img src="{{asset('public/user_asset')}}/images/otherServices/blood.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-service-part text-center">
                                <h2>look for blood donation</h2>
                                <h4>contact here-> <a href="tel:0123456789">0123456789</a></h4>
                                <a href="{{action('User\ServicesController@services_form')}}" class="box-btn">Apply</a>
                            </div>
                        </div>
                    </div>
                    <div class="row services pt-30 pb-30">
                        <div class="col-md-6">
                            <div class="single-service-part text-center">
                                <h2>search for ICU vacancy</h2>
                                <h4>contact here-> <a href="tel:0123456789">0123456789</a></h4>
                                <a href="{{action('User\ServicesController@services_form')}}" class="box-btn">Apply</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-service-part">
                                <img src="{{asset('public/user_asset')}}/images/otherServices/ICU.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row services pt-30 pb-30">
                        <div class="col-md-6">
                            <div class="single-service-part">
                                <img src="{{asset('public/user_asset')}}/images/otherServices/oxygen2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-service-part text-center">
                                <h2>emergency need for oxygen supply</h2>
                                <h4>contact here-> <a href="tel:0123456789">0123456789</a></h4>
                                <a href="{{action('User\ServicesController@services_form')}}" class="box-btn">Apply</a>
                            </div>
                        </div>
                    </div> 
                    <div class="row services pt-30">
                        <div class="col-md-6">
                            <div class="single-service-part text-center">
                                <h2>seek for primary care</h2>
                                <h4>contact here-> <a href="tel:0123456789">0123456789</a></h4>
                                <a href="{{action('User\ServicesController@services_form')}}" class="box-btn">Apply</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-service-part">
                                <img src="{{asset('public/user_asset')}}/images/otherServices/primary.png" alt="">
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!--services-area end here-->
    @endsection