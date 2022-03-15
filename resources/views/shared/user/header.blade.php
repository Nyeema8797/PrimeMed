<!--top part start here-->
<nav class="navbar navbar-light bg-color">
    <div class="container">
            <a href="tel:017123457654" class="contact">&nbsp;<i class="fas fa-phone-volume"></i> 017123457654&nbsp;</a>
            <a href="mailto: email" class="email">&nbsp;<i class="fas fa-envelope-open-text"></i> primemed@gmail.com&nbsp;</a>
            
            <div class="header-icon">
                <a href="https://www.facebook.com" class="facebook"><i class="fab fa-facebook"></i></a>
                <a href="https://www.twitter.com" class="twitter"><i class="fab fa-twitter-square"></i></a>
                <a href="https://www.whatsapp.com" class="whatsapp"><i class="fab fa-whatsapp-square"></i></a>
                <a href="https://www.linkedin.com" class="linkedin"><i class="fab fa-linkedin"></i></a>
            </div>
    </div>
    </div>
</nav>
<!--top part end here-->
<!--header part start here-->
<header class="">
    <div class="container-fluid p-0 ">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="{{action('User\HomeController@index')}}"><img src="{{asset('public/user_asset')}}/images/logo/4.png" alt=""></span>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{action('User\HomeController@index')}}">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            appointment
                                        </a>
                                        
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach($depts as $dept)
                                            <li><a class="dropdown-item" href="@if(count($dept->sub_department) > 0) # @else {{action('User\DoctorController@dept_wise',['id' => $dept->id,'slug' => $dept->slug])}} @endif">{{$dept->dept_Name}}
                                                @if(count($dept->sub_department) > 0) @endif
                                            </a>
                                            @if(count($dept->sub_department) > 0)
                                                <ul>
                                                    @foreach($dept->sub_department as $sub_dept)
                                                    <li>
                                                        <a href="{{action('User\DoctorController@sub_dept_wise',['id' => $sub_dept->id,'slug' => $sub_dept->slug])}}">{{$sub_dept->sub_Dept_Name}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{action('User\OrderCategoryController@order_category')}}">pharmacy</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            lab info
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach ($labs as $item)
                                            <li><a class="dropdown-item" href="{{action('User\LaboratoryController@lab',['id'=>$item->id,'slug' => $item->slug])}}">{{$item->name}}</a>
                                                
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{action('User\ServicesController@services')}}">services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{action('User\ContactController@contact')}}">contact</a>
                                    </li>
                                    @if (isset(Auth::user()->email))
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="far fa-user"></i> {{Auth::user()->name}}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            
                                            <li><a class="dropdown-item" href="{{action('User\LoginController@dashboard')}}"><i class="far fa-user"></i> your profile</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> logout</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('login')}}">Login</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>

</header>
<!--header part end here-->