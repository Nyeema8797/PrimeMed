@extends('layouts.admin_master')
@section('title','OrderWithCart')
@section('content')
<section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Services List
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
                                            <th style="width: 50px;">Serial no</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Mobile No</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Address</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Services</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Blood Group</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Message</th>
                                            <th class="sorting text-right" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($services as $item)
                                        <tr role="row" class="odd">
                                            <td class="">{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->mobileNo}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->services}}</td>
                                            <td>{{$item->bloodGroup}}</td>
                                            <td>{{$item->message}}</td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}" data-whatever="@mdo">Approved</button> 
                                                
                                                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form method="post" class="" action="{{action('Admin\ServicesController@update')}}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                                    <div class="form-group order-form text-left">
                                                                        <label for="recipient-name" class="col-form-label">Admin Says</label><br>
                                                                        <input type="text" name="adminSays" value="{{$item->adminSays}}">
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
                                                || 
                                                <a onclick="return confirm('are you sure to delete user details?')" href="{{action('Admin\ServicesController@delete',['id'=>$item->id])}}" class="btn btn-sm btn-danger">Done</a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$services->links()}}
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