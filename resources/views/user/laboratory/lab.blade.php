@extends('layouts.user_master')
@section('title','ibn-sina')
@section('content')
    <!--banner part start here-->
     <div class="banner-area owl-carousel h-300">
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/lab/lab1.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lab Info</li>
                                    <li class="breadcrumb-item active">{{$lab->name}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/lab/lab2.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lab Info</li>
                                    <li class="breadcrumb-item active">{{$lab->name}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!--banner-area part end here-->
    <!--ibn sina part start here-->
    <section class="lab-info-area pt-70 pb-70">
        <div class="container">
            <div class="lab-info">
                <h3>every test information on {{$lab->name}}</h3>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="other-info">
                            <p><span>Address: </span>{{$lab->address}}</p>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="other-info">
                            <p><span>Contact No: </span>{{$lab->contactNo}}</p>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="other-info">
                            <a href="{{action('User\LaboratoryController@lab_report')}}" class="btn btn-info">lab report delivery</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($labinfo as $key => $item)
                    <div class="col-lg-6">
                        <div class="table lab-table @if($key % 2 == 0) odd-bg @else even-bg @endif">
                            <h4>{{$item->name}}</h4>
                            <table>
                                <tr>
                                    <th class="width-50">SL</th>
                                    <th class="width-350">investigation name</th>
                                    <th class="width-110">rate(taka)</th>
                                </tr>
                                @foreach ($item->sublabinfo as $key => $row)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{money($row->price)}}</td>
                                </tr>
                                @endforeach
                                
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--ibn sina part end here-->

    @endsection