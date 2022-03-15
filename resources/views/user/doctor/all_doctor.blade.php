@extends('layouts.user_master')
@section('title','All-Specialist')
@section('content')
    <!--banner part start here-->
     <div class="banner-area owl-carousel h-300">
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/appointment/appointment1.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                                  <li class="breadcrumb-item active" aria-current="page">Doctor</li>
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
                                  <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                                  <li class="breadcrumb-item active" aria-current="page">Doctor</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!--banner-area part end here-->
    <div class="medicine-area  pb-70">
        <div class="container">
            <div class="medicine appointment">
                <h3 class="pb-30 pt-30">All Doctors</h3>
                <div class="row">
                    @if (count($doctors) > 0)
                    @foreach ($doctors as $doctor)
                    <div class="col-xl-4">
                        <div class="single-medicine single-appointment">
                            @if ($doctor->imageName=='default.jpg')<img src="{{asset('public/uploads/default.jpg')}}" alt="">
                            @else
                                <img  src="{{asset('public/uploads/doctor/'.$doctor->imageName)}}" alt="">
                            @endif
                            <p><span>name:</span>{{$doctor->name}}</p>
                            <p><span>specialist:</span>{{$doctor->specialist}}</p>
                            <p><span>degrees:</span>{{$doctor->degrees}}</p>
                            <p><span>check fee:</span>{{money($doctor->checkFee)}}</p>
                            <p><span>chamber details:</span>{{$doctor->chamberDetails}}</p>
                            <p><span>mobile no:</span>{{$doctor->mobileNo}}</p>
                            <p><span>time:</span>{{$doctor->time}}</p>
                            <a href="{{action('User\DoctorController@doctor_appointment',['id' => $doctor->id])}}"class="box-btn">get appointment</a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h1>No Doctor Available</h1>
                    @endif
                </div>
                    {{$doctors->links()}}
            </div>
        </div>
    </div>
@endsection
