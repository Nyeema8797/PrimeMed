@extends('layouts.user_master')
@section('title','Contact')
@section('content')
    <!--banner part start here-->
     <div class="banner-area owl-carousel h-300">
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/contact/contact1.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg h-300" style="background-image: url({{asset('public/user_asset')}}/images/contact/contact2.jpg);">
            <div class="container h-300">
                <div class="row h-300">
                    <div class="col-xl-12 h-300">
                        <div class="banner">
                            <h4>welcome</h4>
                            <nav aria-label="breadcrumb" class="text-center">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{action('User\HomeController@index')}}">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!--banner-area part end here-->
    <!--contact-area start here-->
    <section class="contact-area pt-70 pb-70">
        <div class="container">
            <h2 class="text-center pb-30">contact us</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-bg">
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
                        <form class="form" method="post" action="{{action('User\ContactController@save')}}">
                            @csrf
                            <div class="form-group"> <label class="sr-only">Name</label> <input type="text" name="name" class="form-control" required="" id="nameNine" placeholder="Your Name"> </div>
                            <div class="form-group"> <label class="sr-only">Email</label> <input type="email" name="email" class="form-control" required="" id="emailNine" placeholder="Email Address"> </div>
                            <div class="form-group"> <label class="sr-only">Email</label> <input type="text" name="contactNo" class="form-control" required="" id="emailNine" placeholder="Contact No"> </div>
                            <div class="form-group"> <label class="sr-only">Name</label> <textarea class="form-control" name="message" required="" rows="5" id="messageNine" placeholder="Write message"></textarea></div>
                            <button type="submit" class="btn text-center btn-blue">Send Message</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.3194713676066!2d91.88160281460576!3d24.88708218404131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3751ab33dae5f21d%3A0x7f4f2c64c8d4d0b0!2sUposhohar%20Plaza!5e0!3m2!1sen!2sbd!4v1614353586547!5m2!1sen!2sbd" width="" height="490" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact-area end here-->
    @endsection