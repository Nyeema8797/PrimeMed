@extends('layouts.user_master')
@section('title','Doctor-Appointment')
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
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
<!--banner-area part end here-->
<!--form-area part start here-->
<section class="form-area pt-30 pb-30">
    <div class="container">
        <div class="form">
            <div class="row  form-instruction">
                <div class="col-md-6">
                    <div class="doctor-details text-center">
                        @if ($appointment->imageName=='default.jpg')<img src="{{asset('public/uploads/default.jpg')}}" alt="">
                        @else
                            <img  src="{{asset('public/uploads/doctor/'.$appointment->imageName)}}" alt="">
                        @endif
                        <p><span>name:</span>{{$appointment->name}}</p>
                        <p><span>degrees:</span>{{$appointment->degrees}}</p>
                        <p><span>chamber details:</span>{{$appointment->chamberDetails}}</p>
                        <p><span>time:</span>{{$appointment->time}}</p>
                        <p><span>check fee:</span>{{money($appointment->checkFee)}}</p>
                    </div>
                    <div class="form-left">
                        <span>appointment instruction</span>
                        <p>contact us to book your appointment for next day</p>
                        <p>there are some dotors to book your appointment you have to contact  us beforehand</p>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="single-form">
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
                        <form method="post" action="{{action('User\DoctorController@save')}}">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{$appointment->id}}">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Enter patient name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  placeholder="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">address</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  placeholder="please give your address" name="address">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">patient age</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="patient age" name="patient_Age">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">phone number</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"  placeholder="Phone Number" name="number">
                            </div>
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
<!--form-area part end here-->
@endsection