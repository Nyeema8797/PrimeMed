@extends('layouts.admin_master')
@section('title','Sub-Lab-Info')
@section('content')
<section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Sub Laboratory Information
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
                                <a class="btn btn-sm btn-primary" href="{{action('Admin\SubLabInfoController@create_sub_lab')}}" style="margin-bottom: 20px;">Create Sub-Lab-Info</a>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 177.2px;">Serial no</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 177.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Laboratory Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 177.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Lab Info Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 177.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Investigation Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Description</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px; text-align:right" aria-label="Position: activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($masuma as $item)
                                            <tr role="row" class="odd">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->all_lab['name']}}</td>
                                            <td>{{$item->lab_info['name']}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->description}}</td>
                                            <td class="text-right">
                                                <a href="{{action('Admin\SubLabInfoController@update_sub_lab',['id'=>$item->id])}}" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a> || <a onclick="return confirm('are you sure to delete?')" href="{{action('Admin\SubLabInfoController@delete',['id'=>$item->id])}}" class="btn btn-sm btn-danger"><i class="material-icons">delete</i></a>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$masuma->links()}}
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