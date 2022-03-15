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
                                Order With Cart List
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
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Delivery Address</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Mobile No</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Delivery Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Total Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Payment Method</th>
                                            <th class="sorting text-right" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($order as $item)
                                        <tr role="row" class="odd">
                                            <td class="">{{$item->id}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->contactNo}}</td>
                                            <td>{{$item->deliveryDate}}</td>
                                            <td>{{$item->paidAmount}}</td>
                                            <td>{{$item->paymentType}}</td>
                                            <td class="text-right">
                                                <a href="{{action('Admin\OrderController@invoice',['id'=>$item->id, 'slug'=>str_slug($item->customer['name'])])}}" class="btn btn-sm "><i class="material-icons">visibility</i></a> || <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}" data-whatever="@mdo">Approved</button> 
                                                
                                                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form method="post" class="" action="{{action('Admin\OrderController@update')}}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                                    <div class="form-group order-form text-left">
                                                                        <label for="recipient-name" class="col-form-label">Order Status</label><br>
                                                                        <select name="orderStatus" id="">
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
                                                || 
                                                <a onclick="return confirm('are you sure to delete cart?')" href="{{action('Admin\OrderController@deleteCart',['id'=>$item->id])}}" class="btn btn-sm btn-danger">Done</a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$order->links()}}
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