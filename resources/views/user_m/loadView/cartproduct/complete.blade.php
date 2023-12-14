@extends('layouts.center')
@section('contents')
@include('user_m.partial.banner',['p1' => 'Order Completed']);
 <!-- Cart-Area -->
  <!-- Order Complet Area -->
  <section id="order_complet_area" class="ptb-100 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center order_complete">
                        <i class="fas fa-check-circle"></i>
                        <div class="order_complete_heading">
                            <h2>Bạn đã mua hàng thành công!</h2>
                        </div>
                        <p>Cảm ơn bạn vì đã mua hàng! Sản phẩm của bạn sẽ đến nơi trong vòng từ 3 -6 ngày. Vui lòng kiểm tra email để xem tình trạng đơn hàng.</p>
                        <a href="{{route('user.home2')}}" class="theme-btn-one bg-black btn_sm">Quay lại shop</a>
                        <a href="{{route('my_account')}}" class="theme-btn-one bg-black btn_sm">Theo dõi đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
