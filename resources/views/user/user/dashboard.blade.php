@extends('layouts.user_master')
@section('title','Dashboard')
@section('content')
    <!--banner part start here-->
     <div class="banner-area owl-carousel h-300">
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/user/user1.jpg);">
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
                                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                    
                    <div class="col-lg-6 text-center">
                        <div class="all-cart">
                            <h2>your order</h2>
                            <div class="cart text-left">
                                <table class="table">
                                    <thead>
                                      <tr>
                                            <th scope="col">Total price</th>
                                            <th scope="col">status</th>
                                            <th scope="col">action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{money($item->paidAmount)}}</td>
                                                <td>{{$item->orderStatus}}</td>
                                                <td><a  style="font-size: 12px" href="{{action('User\LoginController@invoice',['id'=>$item->id])}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                <a  style="font-size: 12px" href="{{action('User\LoginController@deleteorder',['id'=>$item->id])}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="all-lab-report">
                            <h2>your Report Delivery</h2>
                            <div class="cart text-left">
                                <table class="table">
                                    <thead>
                                      <tr>
                                            <th scope="col">Patient Name</th>
                                            <th scope="col">status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($labReport as $item)
                                            <tr>
                                                <td>{{$item->patientName}}</td>
                                                <td>{{$item->status}}</td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-6 text-center">
                        <div class="all-prescription">
                            <h2>order by prescription</h2>
                            <div class="cart text-left">
                                <table class="table">
                                    <thead>
                                      <tr>
                                            <th scope="col">Total price</th>
                                            <th scope="col">status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderprescription as $item)
                                            <tr>
                                                <td>{{money($item->totalPrice)}}</td>
                                                <td>{{$item->status}}</td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="all-quantity">
                            <h2>order by quantity</h2>
                            <div class="cart text-left">
                                <table class="table">
                                    <thead>
                                      <tr>
                                            <th scope="col">total price</th>
                                            <th scope="col">status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ordername as $item)
                                            <tr>
                                                <td>{{money($item->totalPrice)}}</td>
                                                <td>{{$item->status}}</td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="all-appointment">
                            <h2>your appointment</h2>
                            <div class="cart text-left">
                                <table class="table">
                                    <thead>
                                      <tr>
                                            <th scope="col">dr name</th>
                                            <th scope="col">specialist</th>
                                            <th scope="col">status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointment as $item)
                                            <tr>
                                                <td>{{$item->doctor['name']}}</td>
                                                <td>{{$item->doctor['specialist']}}</td>
                                                <td>{{$item->status}}</td>
                                                
                                            </tr>
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="all-services">
                            <h2>your services</h2>
                            <div class="cart text-left">
                                <table class="table">
                                    <thead>
                                      <tr>
                                            <th scope="col">Services</th>
                                            <th scope="col">Position</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $item)
                                            <tr>
                                                <td>{{$item->services}}</td>
                                                <td>{{$item->adminSays}}</td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cart-table area end here-->
@endsection