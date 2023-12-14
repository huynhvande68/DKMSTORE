@extends('layouts.center')
@section('contents')
@include('user_m.partial.banner',['p1' => 'Cart']);
 <!-- Cart-Area -->
@if(!empty($carts))
<section id ="pjax-container cart_area_two" class="ds ptb-100">

@include('user_m.loadView.cartproduct.udcart');

</section>
@else
 <!--Empty Cart-Area -->
 <section id="empty_cart_area" class="ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-12">
                    <div class="empaty_cart_area">
                        <img src="{{asset('assets/img/common/empty-cart.png')}}" alt="img">
                        <h2>Giỏ hàng rỗng</h2>
                        <h3>Xin lỗi... không có kết quả tìm thấy!</h3>
                        <a href="{{route('user.home2')}}" class="btn btn-black-overlay btn_md">Quay lại shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@endsection
@section('js')
<script src ="{{asset('user_m/cart/cartupdate.js')}}"></script>

<script src ="{{asset('user_m/cart/deletecart.js')}}"></script>
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>

@endsection