<!-- Modal Area Start-->
@if($check)
@foreach($product as $item)
<div class="modal fade" id="{{$item->slug_product}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="product_one_modal_top modal-content">
                <button type="button" class="close close_modal_icon" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body" id="product_slider_one">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                            <div class="products_modal_sliders owl-carousel owl-theme">
                                @foreach($item->img as $img_p)
                                <img src="{{$img_p->image_path}}" alt="img">      
                                @endforeach                      
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                            <div class="modal_product_content_one">
                                <h3>{{$item->name}}</h3>
                                <div class="reviews_rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(2 Customer Review)</span>
                                </div>
                                <h4>{{number_format($item->price)}}</h4>
                                 {!!$item->content!!}
                                <div class="variable-single-item">
                                    <span>Color</span>
                                    <div class="product-variable-color">
                                        <label for="modal-product-color-red">
                                            <input name="modal-product-color" id="modal-product-color-red"
                                                class="color-select" type="radio" checked="">
                                            <span class="product-color-red"></span>
                                        </label>
                                        <label for="modal-product-color-tomato">
                                            <input name="modal-product-color" id="modal-product-color-tomato"
                                                class="color-select" type="radio">
                                            <span class="product-color-tomato"></span>
                                        </label>
                                        <label for="modal-product-color-green">
                                            <input name="modal-product-color" id="modal-product-color-green"
                                                class="color-select" type="radio">
                                            <span class="product-color-green"></span>
                                        </label>
                                        <label for="modal-product-color-light-green">
                                            <input name="modal-product-color" id="modal-product-color-light-green"
                                                class="color-select" type="radio">
                                            <span class="product-color-light-green"></span>
                                        </label>
                                        <label for="modal-product-color-blue">
                                            <input name="modal-product-color" id="modal-product-color-blue"
                                                class="color-select" type="radio">
                                            <span class="product-color-blue"></span>
                                        </label>
                                        <label for="modal-product-color-light-blue">
                                            <input name="modal-product-color" id="modal-product-color-light-blue"
                                                class="color-select" type="radio">
                                            <span class="product-color-light-blue"></span>
                                        </label>
                                    </div>
                                </div>
                                <form action="#!" id="product_count_form_one">
                                    <div class="product_count_one">
                                        <div class="plus-minus-input">
                                            <div class="input-group-button">
                                                <button type="button" class="button" data-quantity="minus"
                                                    data-field="quantity">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <input class="form-control quantity-modal" type="number" name="quantity" value ="1">
                                            <div class="input-group-button">
                                                <button type="button" class="button" data-quantity="plus"
                                                    data-field="quantity">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <a href="" data-url="{{route('cart.addtocart',['id'=>$item->id])}}" class="modal-cart theme-btn-one btn-black-overlay btn_sm">Add To Cart</a>
                                    </div>
                                </form>
                                <div class="modal_share_icons_one">
                                    <h4>SHARE THIS PRODUCT</h4>
                                    <div class="posted_icons_one">
                                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#!"><i class="fab fa-instagram"></i></a>
                                        <a href="#!"><i class="fab fa-twitter"></i></a>
                                        <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#!"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#!"><i class="fab fa-pinterest-p"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endif