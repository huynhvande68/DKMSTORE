@if($check)
@foreach($product as $product_item)
<div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                
                                <div class="product_wrappers_one">
                                    <div class="thumb">
                                        <a href="{{route('user.product_singer',['id'=>$product_item->id])}}" class="image">
                                            <img src="{{$product_item->feature_image_path}}" alt="Product" />
                                            <!-- <img class="hover-image" src="assets/img/product-image/product4.png" alt="Product" /> -->
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                            <input type="number" class="quantity" hidden value ="1">
                                        </span>
                                        <div class="actions">
                                            <a  class="action wishlist" title="Wishlist"><i
                                                    class="far fa-heart"></i></a>
                                            <a href="" class="action quickview" data-link-action="quickview" title="Quick view"
                                                data-toggle="modal" data-target="#{{$product_item->slug_product}}"><i
                                                    class="fas fa-expand"></i></a>                                           
                                        </div>
                                        <a  href="" data-url ="{{route('cart.addtocart',['id'=>$product_item->id])}}" title="Add To Cart" class="add-to-cart add-cart hcc offcanvas-toggle">Add To Cart</a>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="{{route('user.product_singer',['id'=>$product_item->id])}}">{{$product_item->name}}</a></h5>
                                        <span class="price">
                                            <span class="new">{{number_format($product_item->price)}}</span>
                                        </span>
                                    </div>
                                </div>
                               
                            </div>
                            @endforeach                                                        
                            <div class="col-lg-12">
                                <!-- pagination start -->
                                <ul class="pagination">                                    
                                    <li  class="page-item active" style = "cursor:pointer;">{{$product->links()}}</li>                                                                        
                                </ul>
                                <!-- pagination end -->
                            </div>
@else
 <!--Empty Cart-Area -->

 <section id="empty_cart_area" class="ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-12">
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