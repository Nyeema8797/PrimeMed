@extends('layouts.admin_master')
@section('title','Appointment-List')
@section('content')
<section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               New Lab Report List
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Serial no</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 177.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Patient Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Delivery Address</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Patient Age</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Phone Number</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Lab Text Recipte</th>
                                            <th class="sorting text-right" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($labReport as $item)
                                        <tr role="row" class="odd">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->patientName}}</td>
                                            <td>{{$item->deliveryAddress}}</td>
                                            <td>{{$item->phoneNo}}</td>
                                            <td>{{$item->age}}</td>
                                            <td><img width= "70" height="50" src="{{asset('public/uploads/labReport/'.$item->labTestRecipte)}}" alt=""></td>
                                            <td class="text-right">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}" data-whatever="@mdo">Approved</button> || <a href="{{action('Admin\LabReportController@deleteLabReport',['id'=>$item->id])}}" onclick="return confirm('Do you want to delete this Report?')" class="btn btn-sm btn-danger" style="margin-left: 10px">Done</a></td>
                                        
                                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <form method="post" class="" action="{{action('Admin\LabReportController@update')}}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                                <div class="form-group order-form text-left">
                                                                    <label for="recipient-name" class="col-form-label">Order Status</label><br>
                                                                    <select name="status" id="">
                                                                        <option value="Pending" {{$item->orderStatus == 'Pending' ? 'selected' : ''}}>Pending</option>
                                                                        <option value="On the Way" {{$item->orderStatus == 'On the Way' ? 'selected' : ''}}>On the Way</option>
                                                                        <option value="Ready" {{$item->orderStatus == 'Ready' ? 'selected' : ''}}>Ready</option>
                                                                        <option value="Delivery Done" {{$item->orderStatus == 'Delivery Done' ? 'selected' : ''}}>Delivery Done</option>
                                                                        <option value="On Process" {{$item->orderStatus == 'On Process' ? 'selected' : ''}}>On Process</option>
                                                                    </select>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$labReport->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
            <!-- #END# Exportable Table -->
        </div>
    </section>
@endsection