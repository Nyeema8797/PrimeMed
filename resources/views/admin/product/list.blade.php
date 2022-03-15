@extends('layouts.admin_master')
@section('title','Product')
@section('content')
<section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Product List
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
                                <a class="btn btn-sm btn-primary" href="{{action('Admin\ProductController@create_product')}}" style="margin-bottom: 20px;">Create Product</a>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 50px;">Serial no</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Product Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Product Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Group</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Type</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Pieces Per Pata</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Dose</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">size</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 350px; text-align:right;" aria-label="Position: activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($product as $item)
                                        <tr role="row" class="odd">
                                            <td class="">{{$item->id}}</td>
                                            <td>{{$item->product_category['name']}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->group}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->piecesPerPata}}</td>
                                            <td>{{$item->dose}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->size}}</td>
                                            <td>@if($item->imageName == 'default.jpg')
                                                <img width="50" height="50" src="{{asset('public/uploads/default.jpg')}}" alt="">
                                                @else
                                                <img width="50" height="50" src="{{asset('public/uploads/product/'.$item->imageName)}}" alt=""></td>
                                                @endif
                                                <td class="text-right">
                                                <a href="{{action('Admin\ProductController@update_product',['id'=>$item->id])}}" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a> || <a onclick="return confirm('are you sure to delete Product?')" href="{{action('Admin\ProductController@delete',['id'=>$item->id])}}" class="btn btn-sm btn-danger"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$product->links()}}
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