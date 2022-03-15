@extends('layouts.user_master')
@section('title','Cart-Table')
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
                                  <li class="breadcrumb-item active" aria-current="page">Cart</li>
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
                                  <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!--banner-area part end here-->
    <!--Cart-table area start here-->
    <section class="cart-table-area pt-30 pb-30">
        <div class="container">
            <div class="cart-table">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="all-cart">
                            <h2>cart product <a title="delete all item" onclick="return confirm('Are you sure?')" href="{{action('User\OrderCategoryController@all_cart_delete')}}">clear</a></h2>
                            <div class="cart text-left">
                                <table class="table">
                                    <thead>
                                      <tr>
                                            <th scope="col">product details</th>
                                            <th scope="col">quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($carts as $item)
                                      @php
                                          $unit_price = $item->price;
                                          $quantity = $item->quantity;
                                          $total = $unit_price * $quantity;
                                      @endphp
                                      <tr>
                                            <td>{{$item->product['name']}}</td>
                                            {{-- <td><input type="number" value="{{$item->quantity}}" name="quantity"></td> --}}
                                            <td> <span>{{$item->quantity}}</span></td>
                                            <td>{{money($item->price)}}</td>
                                            <td>{{money($total)}}</td>
                                            <td><a href="{{action('User\OrderCategoryController@cart_delete',['id'=>$item->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">delete</a></td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @php
                                $sub_total = 0;
                            @endphp
                            @foreach($carts as $row)
                                @php
                                    $sub_total += ($row->price * $row->quantity);
                                @endphp
                            @endforeach
                            <a href="" class="btn btn-light">subtotal: <span>{{money($sub_total)}}</span></a>
                            <a href="{{action('User\OrderController@checkout_details')}}" class="btn btn-info">CheckOut</a> 
                        </div>
                    </div>
                    <div class="col-xl-2"></div>
                </div>
            </div>
        </div>
    </section>
    <!--cart-table area end here-->
@endsection