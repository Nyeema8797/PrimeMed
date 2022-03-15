@extends('layouts.user_master')
@section('title','home')
@section('content')
    <!--banner part start here-->
    <div class="banner-area owl-carousel h-500">
        <div class="single-slide bg h-500" style="background-image: url({{asset('public/user_asset')}}/images/banner/slide0.jpg);">
            <div class="container h-500">
                <div class="row h-500">
                    <div class="col-md-12 h-500">
                        <div class="banner">
                            <h4>welcome</h4>
                            <h2>Best of Care, Close to Home</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg h-500" style="background-image: url({{asset('public/user_asset')}}/images/banner/slide1.jpg);">
            <div class="container h-500">
                <div class="row h-500">
                    <div class="col-md-12 h-500">
                        <div class="banner">
                            <h4>welcome</h4>
                            <h2>Best of Care, Close to Home</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg h-500" style="background-image: url({{asset('public/user_asset')}}/images/banner/slide2.jpg);">
            <div class="container h-500">
                <div class="row h-500">
                    <div class="col-md-12 h-500">
                        <div class="banner">
                            <h4>welcome</h4>
                            <h2>Best of Care, Close to Home</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg h-500" style="background-image: url({{asset('public/user_asset')}}/images/banner/slide3.jpg);">
            <div class="container h-500">
                <div class="row h-500">
                    <div class="col-md-12 h-500">
                        <div class="banner">
                            <h4>welcome</h4>
                            <h2>Best of Care, Close to Home</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner-area part end here-->
    
    <!--Service-area part start here-->
    <section class="service-area pt-70 pb-70">
        <div class="container">
            <div class="services">
                <div class="section-title pb-30">
                    <h3>our blogs</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="single-service">
                            <a href=""><i class="fas fa-pills"></i></a>
                            <h4>check about <span>medicine order</span></h4>
                            <a href="{{action('User\OrderCategoryController@order_category')}}" class="service-link"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="single-service">
                            <a href=""><i class="fas fa-calendar-check"></i></a>
                            <h4>make an <span>appointment</span></h4>
                            <a href="{{action('User\DoctorController@all_doctor')}}" class="service-link"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="single-service">
                            <a href=""><i class="fas fa-flask"></i></a>
                            <h4>details about <span>lab info</span></h4>
                            <a href="" class="service-link"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Service-area part end here-->
    <!--Blog-area part start here-->
    <section class="blog-area pt-70 pb-70">
        <div class="container">
            <div class="blog">
                <div class="section-title blog-content pb-30">
                    <h3>our services</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6"> 
                        <div class="single-blog">
                            <img src="{{asset('public/user_asset')}}/images/blogs/ambulance.png" alt="">
                            <h4>call for <span>ambulance</span></h4>
                            <a class="box-btn" href="{{action('User\ServicesController@services')}}">learn more</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> 
                        <div class="single-blog">
                            <img src="{{asset('public/user_asset')}}/images/blogs/icu.png" alt="">
                            <h4>search for <span>icu vacancy</span></h4>
                            <a class="box-btn" href="{{action('User\ServicesController@services')}}">learn more</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> 
                        <div class="single-blog">
                            <img src="{{asset('public/user_asset')}}/images/blogs/blood-transfusion.png" alt="">
                            <h4>look for<span>blood donation</span></h4>
                            <a class="box-btn" href="{{action('User\ServicesController@services')}}">learn more</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> 
                        <div class="single-blog">
                            <img src="{{asset('public/user_asset')}}/images/blogs/customer-service.png" alt="">
                            <h4>24/7 active support<span>customer service</span></h4>
                            <a class="box-btn" href="{{action('User\ServicesController@services')}}">learn more</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> 
                        <div class="single-blog">
                            <img src="{{asset('public/user_asset')}}/images/blogs/oxygen.png" alt="">
                            <h4>emergency need for<span>Oxygen Supply</span></h4>
                            <a class="box-btn" href="{{action('User\ServicesController@services')}}">learn more</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"> 
                        <div class="single-blog">
                            <img src="{{asset('public/user_asset')}}/images/blogs/doctor.png" alt="">
                            <h4>seek for<span>Primary Care</span></h4>
                            <a class="box-btn" href="{{action('User\ServicesController@services')}}">learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog-area part end here-->
    <!--team-area part start here-->
    <section class="team-area pt-70 pb-70">
        <div class="container">
            <div class="team">
                <div class="section-title blog-content">
                    <h3>our team</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team">
                            <img src="{{asset('public/user_asset')}}/images/team/download.jpg" alt="">
                            <div class="team-hover">
                                <h4>masuma zannat chowdhury <span>web developer</span></h4>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-facebook"></i></a>
                                    <a href=""><i class="fas fa-envelope-square"></i></a>
                                    <a href=""><i class="fab fa-linkedin"></i></a>
                                    <a href=""><i class="fab fa-twitter-square"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team">
                            <img src="{{asset('public/user_asset')}}/images/team/download.jpg" alt="">
                            <div class="team-hover">
                                <h4>ummeh honey khan meem <span>web developer</span></h4>
                                <div class="team-social">
                                    <a href="https://www.facebook.com/hi2meem"><i class="fab fa-facebook"></i></a>
                                    <a href="ummehhoney08@gmail.com"><i class="fas fa-envelope-square"></i></a>
                                    <a href=""><i class="fab fa-linkedin"></i></a>
                                    <a href=""><i class="fab fa-twitter-square"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team">
                            <img src="{{asset('public/user_asset')}}/images/team/download.jpg" alt="">
                            <div class="team-hover">
                                <h4>nyeema islam mumu <span>web designer</span></h4>
                                <div class="team-social">
                                    <a href="https://www.facebook.com/anisha.ahmed.146"><i class="fab fa-facebook"></i></a>
                                    <a href="nyeemamumu@gmail.com"><i class="fas fa-envelope-square"></i></a>
                                    <a href=""><i class="fab fa-linkedin"></i></a>
                                    <a href=""><i class="fab fa-twitter-square"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team">
                            <img src="{{asset('public/user_asset')}}/images/team/download.jpg" alt="">
                            <div class="team-hover">
                                <h4>sameeha sumaita <span>graphic designer</span></h4>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-facebook"></i></a>
                                    <a href=""><i class="fas fa-envelope-square"></i></a>
                                    <a href=""><i class="fab fa-linkedin"></i></a>
                                    <a href=""><i class="fab fa-twitter-square"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--team-area part end here-->
@endsection