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
    <!--services-form start here-->
    <section class="service-form pt-70 pb-70">
        <div class="container">
            <div class="order-form text-center">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="order-form-left ">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <h3>upload your information</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="" action="{{action('User\ServicesController@save')}}" method="post" enctype="">
                                @csrf
                                <input type="text" name="name" placeholder="Enter your Name">
                                <input type="email" name="email" placeholder="Enter Your Email">
                                <input type="number" name="mobileNo" placeholder="Your Mobile Number">
                                <textarea name="address" id="" cols="30" rows="10" placeholder="Pickup Address Here"></textarea>
                                <select name="services" id="">
                                    <option value="Ambulance">Ambulance</option>
                                    <option value="Blood Donation">Blood Donation</option>
                                    <option value="Icu Vacancy">Icu Vacancy</option>
                                    <option value="Oxygen Supply">Oxygen Supply</option>
                                    <option value="Primary Care">Primary Care</option>
                                </select>
                                <br>
                                <select name="bloodGroup" id="">
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="Ab+">Ab+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="O-">O-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                                <div class="form-group" >
                                    <button type="submit" class="btn box-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-2"></div>
                </div>
            </div>
        </div>
    </section>
    <!--services-area end here-->
    @endsection