@extends('layouts.admin_master')
@section('title','Invoice')
@section('content')
    <!--Invoice-area part start here-->
    <section class="content pt-30">
        <div class="container-fluid">
            <div class="invoice-part">
                <div id="invoice">
                    <div class="toolbar hidden-print">
                        <div class="text-right">
                            <a href="{{action('Admin\OrderController@checkout_list')}}" class="btn btn-info"><i class="fa fa-print"></i> Back</a>
                            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                        </div>
                        <hr>
                    </div>
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row">
                                    <div class="col">
                                            <nav class="logo">
                                                <a  style="color: #57CACA"  class="navbar-brand" href="">PrimeMed</a>
                                            </nav>
                                        
                                    </div>
                                    <div class="col company-details">
                                        <h2 class="name">
                                            <a href="#">
                                            {{config('masuma.company')}}
                                            </a>
                                        </h2>
                                        <div>{{config('masuma.address')}}</div>
                                        <div>{{config('masuma.number')}}</div>
                                        <div>{{config('masuma.email')}}</div>
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">INVOICE TO:</div>
                                        <h2 class="to">{{$order->customer['name']}}</h2>
                                        <div class="address">{{$order->address}}</div>
                                        <div class="email">{{$order->contactNo}}</div>
                                    
                                    </div>
                                    <div class="col invoice-details">
                                        <h3 class="invoice-id">INVOICE No: #000{{$order->id}}</h3>
                                        <div class="date">Date of Invoice: {{pub_date($order->created_at)}}</div>
                                        <div class="date">Due Date: {{pub_date($order->deliveryDate)}}</div>
                                    </div>
                                </div>
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-left">Product Details</th>
                                            <th class="text-right">Unit Price</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($order->products as $item)
                                        @php
                                            $unit_price = $item->price;
                                            $quantity = $item->quantity;
                                            $total = $unit_price * $quantity;
                                        @endphp
                                            <tr>
                                                <td class="no">#{{$i++}}</td>
                                                <td class="text-left">{{$item->product['name']}}</td>
                                                <td class="unit">{{money($item->price)}}</td>
                                                <td class="qty">{{$item->quantity}}</td>
                                                <td class="total">{{money($total)}}</td>
                                            </tr>
                                        @endforeach
                                       
                                        
                                    </tbody>
                                    @php
                                        $sub_total = 0;
                                    @endphp
                                    @foreach($order->products as $item)
                                        @php
                                            $sub_total += ($item->price * $item->quantity);
                                        @endphp
                                    @endforeach
                                    @php
                                        $delivery_charge = config('masuma.deliveryCharge');
                                        $grand_total = $sub_total + $delivery_charge;
                                    @endphp
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">SUBTOTAL</td>
                                            <td>{{money($sub_total)}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">SHIPPING</td>
                                            <td>{{money(config('masuma.deliveryCharge'))}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">GRAND TOTAL</td>
                                            <td>{{money($grand_total)}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="thanks">
                                    <h3>Payment Method: {{$order->paymentType == 'Cash' ? 'Cash On Delivery' : 'bKash'}}</h3>
                                    <h4>bKash <span>: 017000000</span></h4>
                                    <h4 style="margin-top: 40px;"><span style="color: #3989c6; font-size: 22px;">In Word:</span>  {{in_word($grand_total)}}</h4>
                                </div>
                            </main>
                            <footer>
                                Invoice was created on a computer and is valid without the signature and seal.
                            </footer>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Invoice-area part end here-->
@endsection