@extends('layouts.center')
@section('contents')
    <!-- Banner Area -->
    <section id="common_banner_one">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_banner_text">
                        <h2>Shop</h2>
                        <ul>
                            <li><a href="{{route('user.home2')}}">Shop</a></li>
                            <li><i class="fas fa-slash"></i></li>
                            <li class="active">Product Single</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Product Single Area -->
     <section id="product_single_two" class="ptb-100">
        <div class="container">
            <div class="row area_boxed">
                <div class="col-lg-4">
                    <div class="product_single_two_img slider-for">
                        @foreach($product->img as $item)
                        <div class="product_img_two_slider">   
                            <img src="{{$item->image_path}}" alt="img"/>
                        </div>                       
                        @endforeach
                    </div>
                    <div class="slider-nav">
                        @foreach($product->img as $item)
                        <div class="">   <!--class="nav-img" -->
                            <img src="{{$item->image_path}}" alt="img"/>
                        </div>   
                        @endforeach                        
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product_details_right_one">
                        <div class="modal_product_content_one">
                            <h3>{{$product->name}}</h3>
                            <div class="reviews_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(2 Customer Review)</span>
                            </div>
                            <h4>${{number_format($product->price)}}<del>$456.43</del> </h4>
                           {!! $product->content !!}                          
                            <div class="variable-single-item">
                                <span>Color</span>
                                <div class="product-variable-color">
                                    <label for="modal-product-color-red1">
                                        <input name="modal-product-color" id="modal-product-color-red1"
                                            class="color-select" type="radio" checked="">
                                        <span class="product-color-red"></span>
                                    </label>
                                    <label for="modal-product-color-green3">
                                        <input name="modal-product-color" id="modal-product-color-green3"
                                            class="color-select" type="radio">
                                        <span class="product-color-green"></span>
                                    </label>

                                    <label for="modal-product-color-blue5">
                                        <input name="modal-product-color" id="modal-product-color-blue5"
                                            class="color-select" type="radio">
                                        <span class="product-color-blue"></span>
                                    </label>
                                </div>
                            </div>
                            <form action="#!" id="product_count_form_two">
                                <div class="product_count_one">
                                    <div class="plus-minus-input">
                                        <div class="input-group-button">
                                            <button type="button" class="button" data-quantity="minus"
                                                data-field="quantity">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <input class="form-control quantity-sing" type="number" name="quantity" value="1">
                                        <div class="input-group-button">
                                            <button type="button" class="button" data-quantity="plus"
                                                data-field="quantity">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="links_Product_areas">
                                
                            <a href data-url="{{route('cart.addtocart',['id'=>$product->id])}}" class="sing-cart theme-btn-one btn-black-overlay btn_sm">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_details_tabs">
                        <ul class="nav nav-tabs">
                            <li><a data-toggle="tab" href="#description" class="active">Mô tả</a></li>
                            <li><a data-toggle="tab" href="#additional">Thông tin sản phẩm</a></li>
                            <li><a data-toggle="tab" href="#review">Đánh giá</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="description" class="tab-pane fade in show active">
                                <div class="product_description">
                                {!! $product->content !!}  
                                </div>
                            </div>
                            <div id="additional" class="tab-pane fade">
                                <div class="product_additional">
                                    <ul>
                                        <li>Màu sắc: <span>đen,vàng kim,trắng</span></li>
                                        <li>Chất liệu: <span>được làm bằng thép không gỉ</span></li>
                                        <li>Thuộc danh mục: <span>{{$product->product_corresponding->nameCategory }}</span></li>
                                   
                                    </ul>
                                </div>
                            </div>
                            <div id="review" class="tab-pane fade">
                                <div class="product_reviews">
                                    <ul>                                                                           
                                        <li class="media">
                                            <div class="media-img">
                                                <img src="{{asset('assets/img/user/user3.png')}}" alt="img">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-header">
                                                    <div class="media-name">
                                                        <h4>Sara Anela</h4>
                                                        <p>5 days ago</p>
                                                    </div>
                                                    <div class="post-share">
                                                        <a href="#!" class="replay">Replay</a>
                                                        <a href="#!" class="">Report</a>
                                                    </div>
                                                </div>
                                                <div class="media-pragraph">
                                                    <div class="product_review_strat">
                                                        <span><a href="#!"><i class="fas fa-star"></i></a></span>
                                                        <span><a href="#!"><i class="fas fa-star"></i></a></span>
                                                        <span><a href="#!"><i class="fas fa-star"></i></a></span>
                                                        <span><a href="#!"><i class="fas fa-star"></i></a></span>
                                                        <span><a href="#!"><i class="fas fa-star"></i></a></span>
                                                    </div>
                                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                                        scelerisque Praesent sapien massa, convallis a pellentesque nec,
                                                        egestas non nisi. Cras ultricies ligula sed magna dictum porta.
                                                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                                                        dui.
                                                        Vivamus magna justo.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Related Product -->
     <section id="related_product" class="pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center_heading">
                        <h2>Sản phẩm liên quan</h2>
                        <p>Các sản phẩm chất lượng dựa trên nhu cầu đánh giá của người dùng</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($product_similler as $item_similler)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product_wrappers_one">
                        <div class="thumb">
                            <a href="{{route('user.product_singer',['id'=>$item_similler->id])}}" class="image">
                                <img src="{{$item_similler->feature_image_path}}" alt="Product" />                               
                            </a>
                            <div class="actions">
                                <a href="" class="action wishlist" title="Wishlist"><i
                                        class="far fa-heart"></i></a>                                
                            </div>
                            <a href="#offcanvas-add-cart"  title="Add To Cart" class="add-to-cart offcanvas-toggle">Add To Cart</a>
                        </div>
                        <div class="content">
                            <h5 class="title"><a href="{{route('user.product_singer',['id'=>$item_similler->id])}}">{{$item_similler->name}}</a></h5>
                            <span class="price">
                                <span class="new">${{number_format($item_similler->price)}}</span>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </section>

@endsection