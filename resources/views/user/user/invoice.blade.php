@extends('layouts.user_master')
@section('title','Medicine')
@section('content')
    <!--banner part start here-->
    <div class="banner-area owl-carousel h-300">
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/user/user1.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/appointment/appointment2.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!--banner-area part end here-->
    <!--Invoice-area part start here-->
    <section class="invoice-area pt-30">
        <div class="container">
            <div class="invoice-part">
                <div id="invoice">
                    <div class="invoice overflow-auto">
                        <div style="">
                            <header>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                            <nav class="logo">
                                                <a  style="color: #333"  class="navbar-brand" href="{{action('User\HomeController@index')}}">prime<span>med</span></a>
                                            </nav>
                                        
                                    </div>
                                    <div class="col-md-9 col-sm-12 company-details">
                                        <h2 class="name">
                                            <a target="_blank" href="#" style="color: #06AEAE; font-weight: 800;">
                                            {{config('masuma.company')}}
                                            </a>
                                        </h2>
                                        <div>{{config('masuma.address')}}</div>
                                        <div>{{config('masuma.number')}}</div>
                                        <div>{{config('masuma.email')}}</div>
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">INVOICE TO:</div>
                                        <h2 class="to">{{$invoice->customer['name']}}</h2>
                                        <div class="address">{{$invoice->address}}</div>
                                        <div class="email"><a href="">{{$invoice->contactNo}}</a></div>
                                    </div>
                                    <div class="col invoice-details">
                                        <h2 class="invoice-id">INVOICE No: {{$invoice->id}}</h2>
                                        <div class="date">Date of Invoice: {{pub_date($invoice->created_at)}}</div>
                                        <div class="date">Due Date: {{pub_date($invoice->deliveryDate)}}</div>
                                    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-left">Product Details</th>
                                                    <th class="text-right">Unit Price</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($invoice->products as $item)
                                                @php
                                                    $unit_price = $item->price;
                                                    $quantity = $item->quantity;
                                                    $total = $unit_price * $quantity;
                                                @endphp
                                                <tr>
                                                    <td class="no">#{{$i++}}</td>
                                                    <td class="text-left">{{$item->product['name']}}</td>
                                                    <td class="unit">{{money($item->price)}}</td>
                                                    <td class="qty">{{$item->quantity}}</td>
                                                    <td class="total">{{money($total)}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @php
                                                $sub_total = 0;
                                            @endphp
                                            @foreach($invoice->products as $item)
                                                @php
                                                    $sub_total += ($item->price * $item->quantity);
                                                @endphp
                                            @endforeach
                                            @php
                                                $delivery_charge = config('masuma.deliveryCharge');
                                                $grand_total = $sub_total + $delivery_charge;
                                            @endphp
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">SUBTOTAL</td>
                                                    <td>{{money($sub_total)}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">SHIPPING</td>
                                                    <td>{{money(config('masuma.deliveryCharge'))}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">GRAND TOTAL</td>
                                                    <td>{{money($grand_total)}}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="thanks">
                                    <h4>Payment Method: <br> {{$invoice->paymentType == 'Cash' ? 'Cash On Delivery' : 'bKash'}}</h4>
                                    <h4>bKash <span>: 017000000</span></h4>
                                    <h4 class="in-word" style="margin-top: 50px; text-align:right"><span style="color: #06AEAE; font-size: 22px;">In Word:</span>  {{in_word($grand_total)}}</h4>
                                </div>
                            </main>
                            <footer>
                                Invoice was created on a computer and is valid without the signature and seal.
                            </footer>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Invoice-area part end here-->
@endsection