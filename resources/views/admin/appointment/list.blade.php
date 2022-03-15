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
                               New Appointment List
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
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 177.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Doctor Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 177.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Specialist</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 177.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Degrees</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 177.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Patient Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Address</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Patient Age</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Phone Number</th>
                                            <th class="sorting text-right" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 320px;" aria-label="Position: activate to sort column ascending">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($appointment as $item)
                                        <tr role="row" class="odd">
                                            <td class="">{{$item->id}}</td>
                                            <td>{{$item->doctor['name']}}</td>
                                            <td>{{$item->doctor['specialist']}}</td>
                                            <td>{{$item->doctor['degrees']}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->patient_Age}}</td>
                                            <td>{{$item->number}}</td>
                                            <td class="text-right"> <a href="{{action('Admin\AppointmentController@check',['id' => $item->id])}}" onclick="return confirm('Do you want to check this Appointment?')" class="btn btn-sm btn-danger" style="margin-left: 10px">Check</a> 
                                                
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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