@extends('layouts.user_master')
@section('title','Order-form')
@section('content')
    <!--banner part start here-->
     <div class="banner-area owl-carousel h-300">
        
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/ashop/shop2.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{action('User\OrderCategoryController@order_category')}}">Shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/shop/shop3.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{action('User\OrderCategoryController@order_category')}}">Shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--banner-area part end here-->
    <!--order-form-area part start here-->
    <section class="order-form-area pt-70 pb-70">
        <div class="container">
            <div class="order-form text-center">
                <h3>order form</h3>
                <p>if you don't get medicine or other product from search then</p>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="order-form-left">
                            <h3>upload your prescription</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @if(session()->has('masuma'))
                            <div class="alert alert-success">
                                {{ session()->get('masuma') }}
                            </div>
                        @endif
                            <form class="" action="{{action('User\OrderCategoryController@save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="name" placeholder="Enter your Name">
                                <input type="email" name="email" placeholder="Enter Your Email">
                                <input type="number" name="mobileNo" placeholder="Your Mobile Number">
                                <textarea name="deliveryAddress" id="" cols="30" rows="10" placeholder="Delivery Address Here"></textarea>
                                <input type="file" name="imageName" value="">
                                <textarea name="medicineQuantity" id="" cols="30" rows="10" placeholder="Medicine Name or serialwise -> Quantity"></textarea>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" class="btn box-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 text-center">
                        <div class="middle">
                            <h1>OR</h1>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="order-form-right">
                            <h3>type name & quantity</h3>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('zannat'))
                            <div class="alert alert-success">
                                {{ session()->get('zannat') }}
                            </div>
                        @endif
                            <form action="{{action('User\OrderCategoryController@saveName')}}" method="post">
                                @csrf
                                <input type="text" name="name" placeholder="Enter your Name">
                                <input type="email" name="email" placeholder="Enter Your Email">
                                <input type="number" name="mobileNo" placeholder="Your Mobile Number">
                                <textarea name="deliveryAddress" id="" cols="30" rows="10" placeholder="Delivery Address Here"></textarea>
                                <textarea name="medicineQuantity" id="" cols="30" rows="10" placeholder="Medicine Name, Medicine Dose, Quantity"></textarea>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" class="btn box-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--order-form-area part end here-->
@endsection