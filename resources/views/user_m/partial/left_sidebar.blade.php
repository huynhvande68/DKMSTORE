<div class="col-lg-6 col-md-12">
                    
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="product_shot">
                        <div class="product_shot_title">
                            <p> Sắp xếp theo
:</p>
                        </div>
                        
                      
                       
                        <div class="customs_selects">
                        
                            <select name="product" class="customs_sel_box">                               
                                    <option value=" ">--Chọn--</option>
                                    <option value="popularity">Mức phổ biến</option>
                                    <option value="newness">News</option>
                                    <option value="low">giá: thấp đến cao</option>
                                    <option value="high">giá: cao đến thấp</option>
                                    
                                </select>
                       
                        
                        </div>
                        
                        
                     
                    </div>
                </div>
            </div>

            <form action="{{route('user.search_leftbar')}}"  method = "POST">
                @csrf
                <div class="row">
                <div class="col-lg-3">
                    <div class="shop_sidebar_wrapper">
                        <div class="shop_Search">                            
                                <input type="text" name="input_search" class="form-control search_ajax" placeholder="Search...">                                                          
                        </div>
                        <div class="shop_sidebar_boxed">
                            <h4>Product Categories</h4>
                            <nav id="sidebar">
                                <ul class="list-unstyled components">

                                    @foreach($leftbar as $leftbar_item)
                                    <li class="active mr">
                                       <span href="#{{$leftbar_item->slug}}" data-toggle="collapse" aria-expanded="false"  class="check ">
                                            @if($leftbar_item->category_rev->count())
                                            <i class ="dropdown-toggle"></i>
                                            @endif 
                                        <label class="custom_boxed">{{$leftbar_item->nameCategory}}
                                                <input type="radio" checked="checked" name="radio" value = "{{$leftbar_item->id}}">
                                                <span class="checkmark"></span>
                                            </label> 
                                        </span>
                                       

                                        @include('user_m.partial.recusive_leftbar',['leftbar_item'=> $leftbar_item])
                                        
                                        
                                    </li>
                                    @endforeach
                                   
                                </ul>

                                
                            </nav>
                           
                        </div>
                        <div class="shop_sidebar_boxed">
                            <h4>Price</h4>
                            <div class="price_filter">                                
                                <div class="price_slider_amount ">
                                    <span>Price :</span>
                                    <input class="@error('price') is-invalid @enderror"  type="text" id="amount" name="price" placeholder="Add Your Price">
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>                             
                                </div>
                        </div>
                        <div class="shop_sidebar_boxed">
                            <h4>Color</h4>
                            <div class="product-variable-color">
                                <label for="modal-product-color-red6">
                                    <input name="modal-product-color" id="modal-product-color-red6" class="color-select"
                                        type="radio" checked="">
                                    <span class="product-color-red"></span>
                                </label>
                                <label for="modal-product-color-tomato1">
                                    <input name="modal-product-color" id="modal-product-color-tomato1"
                                        class="color-select" type="radio">
                                    <span class="product-color-tomato"></span>
                                </label>
                                <label for="modal-product-color-green2">
                                    <input name="modal-product-color" id="modal-product-color-green2"
                                        class="color-select" type="radio">
                                    <span class="product-color-green"></span>
                                </label>
                                <label for="modal-product-color-light-green3">
                                    <input name="modal-product-color" id="modal-product-color-light-green3"
                                        class="color-select" type="radio">
                                    <span class="product-color-light-green"></span>
                                </label>
                                <label for="modal-product-color-blue4">
                                    <input name="modal-product-color" id="modal-product-color-blue4" class="color-select"
                                        type="radio">
                                    <span class="product-color-blue"></span>
                                </label>
                                <label for="modal-product-color-light-blue5">
                                    <input name="modal-product-color" id="modal-product-color-light-blue5"
                                        class="color-select" type="radio">
                                    <span class="product-color-light-blue"></span>
                                </label>
                            </div>
                        </div>
                        <div class="clear_button">
                                    <button  type = "submit" class="theme-btn-one btn_sm btn-black-overlay">Clear Filter</button>
                                </div>
                       
                    </div>
                </div>
            </form>