@extends('layouts.index')
@section('content')



        <!--==================================*
                   Main Section
        *====================================-->
        <div class="pdf-cha main-content-inner">
            <div class="profile_page">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-header card mb-4">
                            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#personal" role="tab" aria-expanded="true">Thông tin khách hàng</a>
                                    <div class="slide"></div>
                                </li>
                              
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Chi tiết đơn hàng</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card_title mb-0">Giới thiệu</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="view-info">
                                            <div class="general-info">
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Tên người nhận</th>
                                                                    <td>{{$info_cus[0]->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Giới tính</th>
                                                                    <td>{{$info_cus[0]->sex}}</td>
                                                                </tr>
                                                              
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td>{{$info_cus[0]->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Số điện thoại</th>
                                                                    <td>{{$info_cus[0]->mobiephone}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Địa chỉ nhận hàng</th>
                                                                    <td>{{$wards->name_wards}} - {{$distric->name_district}} - {{$province->name_city}}</td>
                                                                </tr>
                                                               
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            
                            </div>
                            
                            <div class="tab-pane" id="contacts" role="tabpanel">
                                <div class="row">
                                    
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive datatable-primary data_table_main table-responsive dt-responsive">
                                                    <table id="dataTable2" style="width:100%;" class="table-striped text-center dataTable no-footer dtr-inline">
                                                        <thead class="text-capitalize">
                                                        <tr>
                                                            
                                                            <th>Tên sản phẩm </th>
                                                            <th>Số lượng </th>
                                                            <th>Giá gốc</th>
                                                         
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                       
                                                            @foreach($order->order_order_detail as $item )
                                                        <tr>
                                                        @php
                                                        $ma = $item->qr_code_id;
                                                        $sale = $item->order_coupon;
                                                        @endphp
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->quantity}}</td>                                                    
                                                            <td>{{number_format($item->price * $item->quantity)}}</td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <div class="col-sm-6" style="float: right;margin-top: 30px;">
                                                <table class="table m-0">
                                                  
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Tổng tiền hàng</th>
                                                            <td>{{number_format($order->total)}} VND</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">phí ship</th>
                                                            <td>{{number_format($order->shipping)}} VND</td>
                                                        </tr>
                                                        @if($ma !=0)
                                                            @if($sale->coupon_select == 1)
                                                            <tr>
                                                                <th scope="row">Mã giảm giá theo %</th>
                                                                <td >- {{$sale->coupon_detail}}</td>
                                                            </tr>
                                                            @elseif($sale->coupon_select == 2)
                                                            <tr>
                                                                <th scope="row">Mã giảm giá theo tiền mặt</th>
                                                                <td >- {{number_format($sale->coupon_detail)}} VND</td>
                                                            </tr>
                                                            @endif
                                                            @endif
                                                        <tr>
                                                            <th scope="row">Tổng cần thanh toán</th>
                                                            @if($order->total_discount == 20000 )
                                                            <td class="text-danger">{{ number_format($order->shipping) }} VND</td>
                                                            @else
                                                            <td class="text-danger">{{number_format($order->total_discount + $order->shipping)}} VND</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Phương thức thanh toán</th>
                                                            @if($order->payment == 'option1')
                                                            <td >Thanh toán khi nhận hàng</td>
                                                            @elseif($order->payment =='option2')
                                                            <td >Chuyển khoản ngân hàng</td>
                                                            @elseif($order->payment =='option3')
                                                            <td >Thanh toán Paypal</td>
                                                            @endif
                                                            
                                                        </tr>
                                                       
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6" style="float: left;">
                                           
                                                <h6 class="card-header-text mb-0" style="display:inline-block; margin-top:50px; margin-bottom:20px;">Ghi chú(*)</h6>
                                                <p>{{$order->note}}</p>
                                                <h6 style="font-size: 12px;">Địa chỉ cụ thể : {{$order->address}}</h6>
                                            
                                            </div>
                                        </div>
                                        <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text mb-0">Xuất đơn </h5>
                                            </div>
                                            <div class="card-block user-desc">
                                                <div class="view-desc" style="float: right;">
                                                <a href="{{route('admin.order.convest-file',['id' =>$order->id])}}" type="button" class=" export btn btn-fixed-w btn-outline-dark mb-3">In hóa đơn</a>                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
