@extends('layouts.user_master')
@section('title','CheckOut')
@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@endsection
@section('content')
    <!--banner part start here-->
     <div class="banner-area owl-carousel h-300">
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/shop/shop2.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <!--<h4>welcome</h4>
                            <h2>gain the beautiful</h2>
                            <a href="" class="box-btn">read more</a>-->
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                  <li class="breadcrumb-item"><a href="{{action('User\OrderCategoryController@order_category')}}">Shop</a></li>
                                  <li class="breadcrumb-item"><a href="{{action('User\OrderCategoryController@cart_table')}}">Cart</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">CheckOut</li>
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
                                  <li class="breadcrumb-item"><a href="{{action('User\OrderCategoryController@cart_table')}}">Cart</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">CheckOut</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--banner-area part end here-->
    <!--checkout-details area start here-->
    <section class="checkout-detaile-area pt-30 pb-30">
        <div class="container">
            <div class="checkout-details">
                <h3 class="text-center">CheckOut Details</h3>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form method="post" action="{{action('User\OrderController@savecart')}}">
                    
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="checkout-form-left">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Delivery Address:</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deliveryAddress" placeholder="Delivery Address Here"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Preferred Delivery Date:</label>
                                                <input name="deliveryDate" type="text" class="form-control" value="" id="datepicker" placeholder="19/1/2021">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Contact No:</label>
                                                <input class="form-control" type="number" name="contactNo" placeholder="Your Mobile Number">
                                            </div>  
                                            <div class="box">
                                                <h2>cart total</h2>
                                                @php
                                                    $sub_total = 0;
                                                @endphp
                                            @foreach($carts as $row)
                                                @php
                                                    $sub_total += ($row->price * $row->quantity);
                                                @endphp
                                            @endforeach
                                                    <label class="form-label">subtotal</label>
                                                    <label class="form-label">{{money($sub_total)}}</label>
                                                    <input type="hidden" name="paidAmount" value="{{$sub_total}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="checkout-form-right">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Order Instructions:</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="orderInstructions" id="" placeholder="Before Delivery Please Call Me First"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Preferred Delivery Time:</label>
                                                <select name="deliveryTime" class="form-control">
                                                    <option value="{{date('H:i:s', strtotime('08:00 am'))}}">{{date('h:i a', strtotime('08:00 am'))}} - {{date('h:i a', strtotime('09:00 am'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('09:00 am'))}}">{{date('h:i a', strtotime('09:00 am'))}} - {{date('h:i a', strtotime('10:00 am'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('10:00 am'))}}">{{date('h:i a', strtotime('10:00 am'))}} - {{date('h:i a', strtotime('11:00 am'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('11:00 am'))}}">{{date('h:i a', strtotime('11:00 am'))}} - {{date('h:i a', strtotime('12:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('12:00 pm'))}}">{{date('h:i a', strtotime('12:00 pm'))}} - {{date('h:i a', strtotime('01:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('01:00 pm'))}}">{{date('h:i a', strtotime('01:00 pm'))}} - {{date('h:i a', strtotime('02:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('02:00 pm'))}}">{{date('h:i a', strtotime('02:00 pm'))}} - {{date('h:i a', strtotime('03:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('03:00 pm'))}}">{{date('h:i a', strtotime('03:00 pm'))}} - {{date('h:i a', strtotime('04:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('04:00 pm'))}}">{{date('h:i a', strtotime('04:00 pm'))}} - {{date('h:i a', strtotime('05:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('05:00 pm'))}}">{{date('h:i a', strtotime('05:00 pm'))}} - {{date('h:i a', strtotime('06:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('06:00 pm'))}}">{{date('h:i a', strtotime('06:00 pm'))}} - {{date('h:i a', strtotime('07:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('07:00 pm'))}}">{{date('h:i a', strtotime('07:00 pm'))}} - {{date('h:i a', strtotime('08:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('08:00 pm'))}}">{{date('h:i a', strtotime('08:00 pm'))}} - {{date('h:i a', strtotime('09:00 pm'))}}</option>
                                                    <option value="{{date('H:i:s', strtotime('08:00 pm'))}}">{{date('h:i a', strtotime('09:00 pm'))}} - {{date('h:i a', strtotime('10:00 pm'))}}</option>
                                                </select>
                                            </div>
                                            <div class="box">
                                                <h2>payment method</h2>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paymentType" id="inlineRadio1" value="Cash">
                                                    <label class="form-check-label" for="inlineRadio1">cash on delivery</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="paymentType" id="inlineRadio2" value="bKash">
                                                    <label class="form-check-label" for="inlineRadio2">bkash</label>
                                                </div>
                                            </div>
                                            <label for="exampleFormControlInput1" class="form-label">Delivery charge <span>60 Taka!!</span></label>
                                        
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" class="btn box-btn">Submit</button>
                                </div>
                        </div>
                    </div>
                    
                </form>   
            </div>
        </div>
    </section>
    <!--checkout-details area end here-->
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>
@endsection