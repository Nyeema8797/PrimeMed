<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('public/admin_asset')}}/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                    <div class="email">{{Auth::user()->email}}</div>
                    
                </div>
            </div>
            <!-- #User Info -->

            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="{{action('Admin\DashboardController@index')}}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">open_with</i>
                            <span>Orders</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{action('Admin\OrderController@prescription_list')}}" class=" waves-effect waves-block">Order With Prescription</a>
                            </li>
                            <li>
                                <a href="{{action('Admin\OrderController@medicine_name_list')}}" class=" waves-effect waves-block">Order With Medicine Details</a>
                            </li>
                            <li>
                                <a href="{{action('Admin\OrderController@checkout_list')}}" class=" waves-effect waves-block">Order With Cart</a>
                            </li>
                            <li>
                                <a href="pages/forms/form-validation.html" class=" waves-effect waves-block">Cancel</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">store</i>
                            <span>Product</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{action('Admin\ProductCategoryController@list')}}" class=" waves-effect waves-block">Product Category</a>
                            </li>
                            <li>
                                <a href="{{action('Admin\ProductController@list')}}" class=" waves-effect waves-block">Product</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">people</i>
                            <span>Specialist</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <span>Department</span>
                                </a>
                                <ul class="ml-menu" style="display: none;">
                                    <li>
                                        <a href="{{action('Admin\DepartmentController@list')}}" class="waves-effect waves-block">
                                            
                                            <span>Main-Department</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{action('Admin\SubDepartmentController@list')}}" class="waves-effect waves-block">
                                        
                                            <span>Sub-Department</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{action('Admin\DoctorController@list')}}" class="waves-effect waves-block">
                                    <span>Doctors</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">today</i>
                            <span>Appointment</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                            <li>
                                <a href="{{action('Admin\AppointmentController@appointment_list')}}" class="waves-effect waves-block">
                                    <span>New Appointment</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Admin\AppointmentController@checked_list')}}" class="waves-effect waves-block">
                                    <span>Checked Appointment</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">info</i>
                            <span>Info</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{action('Admin\AllLabController@lab_list')}}" class=" waves-effect waves-block">All Labs</a>
                            </li>
                            <li>
                                <a href="{{action('Admin\LabInfoController@list')}}" class=" waves-effect waves-block">Lab Info</a>
                            </li>
                            <li>
                                <a href="{{action('Admin\SubLabInfoController@list')}}" class=" waves-effect waves-block">Sub Lab Info</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">bug_report</i>
                            <span>Lab Report</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{action('Admin\LabReportController@new_lab_report')}}" class=" waves-effect waves-block">New Lab Report</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="{{action('Admin\ServicesController@services_list')}}" class=" waves-effect waves-block">
                            <i class="material-icons">storage</i>
                            <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{action('Admin\UserController@user_table')}}" class=" waves-effect waves-block">
                            <i class="material-icons">person_outline</i>
                            <span>User</span>
                        </a>
                    </li>
                    
                    <li>
                        <a class="text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="material-icons">logout</i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>