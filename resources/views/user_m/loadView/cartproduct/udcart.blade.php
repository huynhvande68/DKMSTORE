<div class="container">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table class ="update-cart-url" data-url ="{{route('cart.updatetocart')}}">
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                        <th class="product_remove">Remove</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                            
                                <tbody>
                                    @php
                                    $tutorial = 0;
                                    @endphp                                 
                                    @foreach($carts as $id => $cart_item)
                                    <!-- Start Cart Single Item-->
                                    @php
                                    $tutorial += $cart_item['price'] * $cart_item['quantity'] ;
                                    @endphp
                                    <tr>
                                        <td class="product_thumb">
                                            <a href="{{route('user.product_singer',['id' => $id ])}}">
                                                <img src="{{$cart_item['image']}}" alt="img">
                                            </a>
                                        </td>
                                        <td class="product_name">
                                            <a href="{{route('user.product_singer',['id' => $id ])}}">{{$cart_item['name']}}</a>
                                        </td>
                                        <td class="product-price">{{number_format($cart_item['price'])}}</td>
                                        <td class="product_quantity">

                                            <div class="plus-minus-input">
                                                <div class="input-group-button">
                                                    <button type="button" class="button" data-quantity="minus"
                                                        data-field="{{$id}}">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <input class="ip input form-control" type="number" name="{{$id}}" value="{{$cart_item['quantity']}}">
                                                <div class="input-group-button">
                                                    <button type="button" class="button" data-quantity="plus"
                                                        data-field="{{$id}}">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        @php
                                        $product_total = $cart_item['price'] * $cart_item['quantity'];
                                        @endphp
                                        <td class="product_total">{{number_format($product_total)}}</td>
                                        <td class="product_remove"><a href="#" data-url = "{{route('cart.deletetocart',['id'=>$id])}}" class="delete-cart"><i class="far fa-trash-alt"></i></a>
                                    </tr> <!-- End Cart Single Item-->
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button  class="cart-update theme-btn-one btn-black-overlay btn_sm" type="submit">cập nhật giỏ hàng</button>
                        </div>
                    </div>                  
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                        <h3>Cart Total</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Tổng</p>
                                <p class="cart_amount ">{{number_format($tutorial)}} VND</p>
                            </div>                          
                            <div class="cart_subtotal ">
                                <p>Shipping</p>
                                 <p class="cart_amount">20.000 VND</p>
                            </div>  
                            @php
                            $tutorials = $tutorial+20000;
                            @endphp                        
                            <div class="cart_subtotal">               
                                <p>Tổng tiền</p>
                                <p class="cart_amount">{{number_format($tutorials)}} VND</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{route('index.checkout')}}" class="theme-btn-one btn-black-overlay btn_sm">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
