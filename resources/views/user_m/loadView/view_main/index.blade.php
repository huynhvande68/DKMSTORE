@extends('layouts.center')
@section('contents')
<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>

<!-- Electronics_Banner Arae -->
<section id="electronics_banner">
    <div class="electronics_slider_box owl-theme owl-carousel">
        @foreach($view_slide as $view_slide_item)
        <div class="electronics_slider background_bg" style="background-image: url('{{$view_slide_item}}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12 col-12">
                        <div class="electronics_slider_content">
                            <h5> NEW TRANDING</h5>
                            <h2>Tiện lợi <span>thông minh</span></h2>
                            <h4>Đứng đầu thị trường trong và ngoài nước</h4>
                            <a href="{{route('user.home2')}}" class="theme-btn-one bg-black btn_sm">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Electronics_Banner_Bottom Arae -->
<section id="electronics_banner_bottom" class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="el_banner_bottom el-ban-bottom-left">
                    <a href="shop.html">
                        <img src="assets/img/electronics/common/offer1.jpg" alt="img">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="el_banner_bottom">
                    <a href="shop.html">
                        <img src="assets/img/electronics/common/offer2.jpg" alt="img">
                    </a>
                </div>
                <div class="el_banner_bottom">
                    <a href="shop.html">
                        <img src="assets/img/electronics/common/offer3.jpg" alt="img">
                    </a>
                </div>
            </div>
        </div>
        <div class="el_feature_wrappers">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 col-12">
                    <div class="el_feature_box">
                        <img src="assets/img/electronics/icon/car.png" alt="img">
                        <div class="el_feature_text">
                            <h3>Miễn phí vận chuyển</h3>
                            <p>cho tất cả đơn từ 100.000đ</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-12">
                    <div class="el_feature_box">
                        <img src="assets/img/electronics/icon/world.png" alt="img">
                        <div class="el_feature_text">
                            <h3>Miễn phí hoàn trả</h3>
                            <p>trong vòng 7 ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-12">
                    <div class="el_feature_box">
                        <img src="assets/img/electronics/icon/lock.png" alt="img">
                        <div class="el_feature_text">
                            <h3>100% thanh toán tiện lợi</h3>
                            <p>Phương thức thanh toán đa dạng.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-12">
                    <div class="el_feature_box">
                        <img src="assets/img/electronics/icon/phone.png" alt="img">
                        <div class="el_feature_text">
                            <h3>Hỗ trợ 24/7</h3>
                            <p>Hãy gọi cho chúng tôi khi bạn cần</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--Top Product Arae -->
<section id="electronics_top_product" class="pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left_heading_three">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tabs_right_button">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#all" class="active">All</a></li>
                        @foreach($con[0] as $item_hot)
                        <li><a data-toggle="tab" href="#{{$item_hot->slug}}">{{$item_hot->nameCategory}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs_el_wrapper">
                    <div class="tab-content">
                        <div id="all" class="tab-pane fade show in active">
                            <div class="row">
                                @foreach($con[0] as $con_i)
                                @foreach($con_i->product_rev->take(4) as $product_item)
                                @if($con_i->id == $product_item->category_id)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="product_item_two">
                                        <div class="product_item_inner">
                                            <div class="product_img_wrap">
                                                <a href="{{route('user.product_singer',['id' =>$product_item->id])}}">
                                                    <img src="{{$product_item->feature_image_path}}" alt="product_img">
                                                </a>
                                            </div>
                                            <div class="product_button">
                                                <a href="{{route('user.product_singer',['id' =>$product_item->id])}}"><i class="fa fa-shopping-bag"></i></a>
                                                <a><i class="fa fa-eye"></i></a>

                                            </div>
                                        </div>
                                        <div class="product_detail">
                                            <h5 class="product_title">
                                                <a href="{{route('user.product_singer',['id' =>$product_item->id])}}">{{$product_item->name}}</a>
                                            </h5>
                                            <p class="item_price">{{number_format($product_item->price)}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                            </div>
                        </div>

                        @foreach($con[0] as $con_i)
                        <div id="{{$con_i->slug}}" class="tab-pane fade">
                            <div class="row">
                                @if($con_i->product_rev->count())
                                @foreach($con_i->product_rev->take(4) as $product_item)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="product_item_two">
                                        <div class="product_item_inner">
                                            <div class="product_img_wrap">
                                                <a href="{{route('user.product_singer',['id' =>$product_item->id])}}">
                                                    <img src="{{$product_item->feature_image_path}}" alt="product_img">
                                                </a>
                                            </div>
                                            <div class="product_button">
                                                <a href="{{route('user.product_singer',['id' =>$product_item->id])}}"><i class="fa fa-shopping-bag"></i></a>
                                                <a><i class="fa fa-eye"></i></a>

                                            </div>
                                        </div>
                                        <div class="product_detail">
                                            <h5 class="product_title">
                                                <a href="{{route('user.product_singer',['id' =>$product_item->id])}}">{{$product_item->name}}</a>
                                            </h5>
                                            <p class="item_price">{{number_format($product_item->price)}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Promotion Banner Arae -->
<section id="promotion_banner" class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="elec_promo_text">
                    <h2>SAMSUNG GALAXY <br> WATCH ACTIVE 2</h2>
                    <p>Đồng hồ thông minh Samsung Galaxy Watch Active 2 nổi bật với màn hình rộng 1.2 Inch với độ phân giải 360 x 360 Pixels
                        và mặt kính cường lực giúp người đeo an tâm khi mang ra ngoài. Giao diện mặt đồng hồ có thể thay đổi tuỳ ý theo phòng
                        cách người dùng.
                        Dây đeo Silicone hạn chế bị trầy xước và dễ lau khô khi tiếp xúc với nước hay mồ hôi.</p>
                    <div class="elec_promo_icon">
                        <div class="icon_promo_item">
                            <i class="fab fa-bluetooth-b"></i>
                            <p>Bluetooth </p>
                        </div>
                        <div class="icon_promo_item">
                            <i class="fas fa-wifi"></i>
                            <p>hỗ trợ wifi</p>
                        </div>
                        <div class="icon_promo_item">
                            <i class="fas fa-battery-half"></i>
                            <p>sử dụng pin lâu dài</p>
                        </div>
                        <div class="icon_promo_item">
                            <i class="fas fa-volume-up"></i>
                            <p>âm thanh xung quanh</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="promotion_img">
                    <img src="assets/img/electronics/common/promotion.png" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>

<!--Weekly Deal Product Arae -->
<section id="elce_weekly_deal" class="ptb-100 slider_arrows_one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left_heading_three">
                    <h2>Hàng đang giảm giá</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="elce_weekly_slider owl-theme owl-carousel">
                    <div class="product_item_two">
                        <div class="product_item_inner">
                            <div class="product_img_wrap">
                                <a href="shop-left-sidebar.html">
                                    <img src="assets/img/electronics/product/1.jpg" alt="product_img">
                                </a>
                            </div>
                            <div class="product_button">
                                <a href="cart.html"><i class="fa fa-shopping-bag"></i></a>
                                <a href="wishlist.html"><i class="fa fa-heart"></i></a>
                                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product_detail">
                            <h5 class="product_title">
                                <a href="product_detail.html">United Colors of Benetton</a>
                            </h5>
                            <p class="item_price">$39.00</p>
                        </div>
                    </div>
                    <div class="product_item_two">
                        <div class="product_item_inner">
                            <div class="product_img_wrap">
                                <a href="shop-left-sidebar.html">
                                    <img src="assets/img/electronics/product/2.jpg" alt="product_img">
                                </a>
                            </div>
                            <div class="product_button">
                                <a href="cart.html"><i class="fa fa-shopping-bag"></i></a>
                                <a href="wishlist.html"><i class="fa fa-heart"></i></a>
                                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product_detail">
                            <h5 class="product_title">
                                <a href="product_detail.html">United Colors of Benetton</a>
                            </h5>
                            <p class="item_price">$39.00</p>
                        </div>
                    </div>
                    <div class="product_item_two">
                        <div class="product_item_inner">
                            <div class="product_img_wrap">
                                <a href="shop-left-sidebar.html">
                                    <img src="assets/img/electronics/product/3.jpg" alt="product_img">
                                </a>
                            </div>
                            <div class="product_button">
                                <a href="cart.html"><i class="fa fa-shopping-bag"></i></a>
                                <a href="wishlist.html"><i class="fa fa-heart"></i></a>
                                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product_detail">
                            <h5 class="product_title">
                                <a href="product_detail.html">United Colors of Benetton</a>
                            </h5>
                            <p class="item_price">$39.00</p>
                        </div>
                    </div>
                    <div class="product_item_two">
                        <div class="product_item_inner">
                            <div class="product_img_wrap">
                                <a href="shop-left-sidebar.html">
                                    <img src="assets/img/electronics/product/4.jpg" alt="product_img">
                                </a>
                            </div>
                            <div class="product_button">
                                <a href="cart.html"><i class="fa fa-shopping-bag"></i></a>
                                <a href="wishlist.html"><i class="fa fa-heart"></i></a>
                                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product_detail">
                            <h5 class="product_title">
                                <a href="product_detail.html">United Colors of Benetton</a>
                            </h5>
                            <p class="item_price">$39.00</p>
                        </div>
                    </div>
                    <div class="product_item_two">
                        <div class="product_item_inner">
                            <div class="product_img_wrap">
                                <a href="shop-left-sidebar.html">
                                    <img src="assets/img/electronics/product/7.jpg" alt="product_img">
                                </a>
                            </div>
                            <div class="product_button">
                                <a href="cart.html"><i class="fa fa-shopping-bag"></i></a>
                                <a href="wishlist.html"><i class="fa fa-heart"></i></a>
                                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product_detail">
                            <h5 class="product_title">
                                <a href="product_detail.html">United Colors of Benetton</a>
                            </h5>
                            <p class="item_price">$39.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Story Area -->
<section id="blog_area_two" class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="center_heading_two">
                    <h2>Blog Post</h2>
                    <span class="heading_border"></span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($next_blog as $item)
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="blog_post_wrapper">
                    <div class="blog_post_img">
                        <a href="{{route('readblog',['id'=>$item->id])}}">
                            <img src="{{$item->image_blog}}" alt="img">
                        </a>
                        <div class="blog_post_date">
                            <i class="far fa-calendar-alt"></i>
                            <span>{{ Carbon\Carbon::parse($item->created_at)->format('M d Y')}}</span>
                        </div>
                    </div>
                    <div class="right_block">
                        <div class="right_side_content">
                            <h5>{{$item->name_blog}}</h5>
                            {!! $item->content !!}
                            <a href="{{route('readblog',['id'=>$item->id])}}">Read More...</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection