@extends('layouts.center')
@section('contents')
@include('user_m.partial.banner',['p1' => 'Checkout']);
<!-- Checkout-Area -->
<section id="checkout_one" class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-actions accordion">
                    <h3>
                        <i class="far fa-file"></i>
                        Sử dụng phiếu giảm giá
                        <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">click here to enter your code</a>

                    </h3>
                    <div id="checkout_coupon" class="collapse checkout_coupon" data-parent="#checkout_coupon">
                        <div class="checkout_info">
                            <form action="{{route('checkcouponok')}}" method="POST">
                                @csrf
                                <div class="coupon_inner_two">
                                    <input class="mb-2" placeholder="Mã giảm giá" type="text">
                                    <button type="submit" class="btn_coupon theme-btn-one btn-black-overlay btn_sm">Áp dụng</button>
                                    <span class="alert "></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('paymentorder')}}" method="POST">
            @csrf
            <input type="hidden" class="qrcode" name="cuppon_code">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="checkout-area-bg bg-white">
                        <div class="check-heading">
                            <h3>Phiếu thanh toán</h3>
                            @include('components.alert')
                        </div>
                        <div class="check-out-form">

                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-=12 col-12">
                                    <div class="form-group">
                                        <label for="name">Tên người đặt hàng</label>
                                        <input type="text" required="" name="name" class="form-control" value="{{$customer->name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-=12 col-12">
                                    <div class="form-group">
                                        <label for="cname">Sđt liên hệ</label>
                                        <input class="form-control" name="number" required="" type="text" value="{{$customer->mobiephone}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-=12 col-12">
                                    <div class="form-group">
                                        <label for="country">Tỉnh - Thành phố trung ương</label>
                                        <select class="form-control first_null" name="province" id="country">
                                            <option value="">Chọn địa chỉ của bạn...</option>
                                            @foreach($province as $citem)
                                            <option value="{{$citem->id}}">{{$citem->name_city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-=12 col-12">
                                    <div class="form-group">
                                        <label for="city">Huyện</label>
                                        <select class="form-control first_null" name="district" id="city">


                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-=12 col-12">
                                    <div class="form-group">
                                        <label>Xã - Thị trấn</label>
                                        <select class="form-control first_null" name="wards" id="wards">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-=12 col-12">
                                    <div class="form-group">
                                        <label for="faddress">Địa chỉ cụ thể</label>
                                        <input type="text" class="form-control @error('adders') is-invalid @enderror" name="adders" id="faddress" required="" placeholder="Enter your address here..">
                                        @error('adders')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-=12 col-12">
                                    <div class="form-group">
                                        <label for="messages">Ghi Chú</label>
                                        <textarea rows="5" class="form-control @error('note') is-invalid @enderror" name="note" id="messages" placeholder="Order notes"></textarea>
                                        @error('note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="order_review  box-shadow bg-white">
                        <div class="check-heading">
                            <h3>Đơn đặt hàng</h3>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $tutorial = 0;
                                    @endphp
                                    @foreach($cart as $key => $item_cart)
                                    @php
                                    $tutorial += $item_cart['price'] * $item_cart['quantity'] ;
                                    @endphp
                                    <tr>
                                        <td>{{$item_cart['name']}}<span class="product-qty"> x {{$item_cart['quantity']}}</span>
                                        </td>
                                        <td>{{number_format($item_cart['price'])}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng phụ</th>
                                        <td class="product-subtotal cart_amount">{{number_format($tutorial)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td class="product-shipping cart_amount">20.000</td>
                                    </tr>
                                    <tr>
                                        <th>Mã giảm giá<span class="cpon "></span></th>
                                        <td class="product-cuppon cart_amount csd"></td>
                                    </tr>
                                    <tr>
                                        <th>Tổng</th>
                                        @php
                                        $sub = $tutorial+24000;
                                        $pay = $sub/22755;
                                        @endphp
                                        <td class="product-subtotal tll cart_amount">{{number_format($sub)}}</td>
                                    </tr>
                                </tfoot>
                                <input type="hidden" value="{{round($pay,2)}}" class="show_pal">
                            </table>
                        </div>
                    </div>
                    <div class="order_review bg-white">
                        <div class="check-heading">
                            <h3>Thanh toán</h3>
                        </div>
                        <div class="payment_method">
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option1" checked="">
                                    <label class="form-check-label" for="exampleRadios3">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" value="option2">
                                    <label class="form-check-label" for="exampleRadios4">Chuyển khoản ngân hàng</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input dvc" type="radio" name="payment_option" id="exampleRadios5" value="option3">
                                    <label class="form-check-label" for="exampleRadios5">Thanh toán paypal</label>
                                    <div id="paypal-button" class="pau payment-text" style="margin-left: 3%"></div>
                                    <p style="color: indianred;" class="pg payment-text">sau khi hoàn thành. <br> vui lòng nhấn vào <b>xác nhận thanh toán!</b></p>
                                </div>

                            </div>
                        </div> <button type="submit" class="theme-btn-one btn-black-overlay btn_sm">Xác nhận thanh toán</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
@section('js')
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('user_m/cart/checkout.js')}}"></script>
<script src="{{asset('user_m/cart/couponcart.js')}}"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="{{asset('user_m/cart/paypal.js')}}"></script>


@endsection