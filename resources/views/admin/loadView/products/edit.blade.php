@extends('layouts.index')
<!-- load css -->
@section('css')
<link href="{{asset('external_library/select2/select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('admin/private_file/product/add/add.css')}}">
@endsection
<!-- end load -->

<!-- end load js -->
@section('content')
<div class="row">
<div class="col-12 mt-4">
                    <div class="card">
                        @include('components.alert')
                        <form action="{{route('admin.product.update',['id'=>$product_e->id])}}"  method = "POST" enctype="multipart/form-data" >
                            @csrf
                        <div class="form-group">
                        <div class="card-body">
                            <h4 class="card_title">Cập nhật sản phẩm</h4>
                            <!-- enter the box product -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập tên sản phẩm </label>
                            <input class="form-control form-control-lg  mb-3" value = "{{$product_e->name}}" type="text" name="name_product" placeholder="Nhập tên sản phẩm">                        
                            <!-- enter the box price -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập giá sản phẩm </label>
                            <input class="form-control form-control-lg  mb-3" value = "{{$product_e->price}}" type="text" name="price_product" placeholder="Nhập giá sản phẩm"> 
                            <!-- enter the path images -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Chọn ảnh đại diện</label>
                            <input class="form-control form-control-lg  mb-3" type="file" name="feature_image_path" >
                            <div class="col-sm-4 edit_product_img_partent">
                                <div class="row">
                                    <img class = "edit_product_img_item" src="{{$product_e->feature_image_path}}" alt="{{$product_e->feature_image_name}}">
                                </div>
                            </div> 
                            <!-- enter the multiple path images -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Những ảnh liên quan </label>
                            <input class="form-control form-control-lg  mb-3" type="file" multiple name="image_path[]" > 
                            <div class="col-sm-12 partent-big">
                                <div class="row ">
                                   @foreach($product_e->img as $productItemImg)
                                  <div class="col-md-3 multi_img_partent">
                                        <img class = "multi_img_item" src="{{$productItemImg->image_path}}" alt="{{$productItemImg->image_name}}">
                                  </div>
                                   @endforeach
                                </div>
                            </div>
                            <!-- choose category -->
                             <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Chọn danh mục phù hợp</label>
                                <select id="cate " class=" select_pr form-control form-control-sm  " name = "category_id" >
                                    <option value = ""></option>
                                        {!! $htmlOption!!}
                                </select>
                            <!-- enter the input tag  -->
                            <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Nhập tag </label>
                                <select id="chonn" name = "tags[]" class="form-control form-control-sm "  multiple="multiple">
                                    @foreach($product_e->tags as $productItem)
                                    <option selected value="{{$productItem->name}}">{{$productItem->name}}</option>
                                    @endforeach
                                </select>
                            <!-- content product -->
                            <div class="form-group pt-3">
                                <label for="exampleFormControlTextarea1">Nội dung sản phẩm</label>
                                <textarea name = "content" class="form-control my-editor" id="exampleFormControlTextarea1" rows="10">{{$product_e->content}}</textarea>
                            </div>
                            
                            <button class="btn btn-warning float-right mt-1" type = "submit">Cập nhật</button>
                          </div>
                        </div>
                    
                    
                        </form>
                    </div>
</div>          
</div>

@endsection
<!-- load js -->
@section('js')


<script src="{{asset('external_library/select2/select2.min.js')}}"></script>
<script src="{{asset('external_library/select2/tinymce.min.js')}}" ></script>
<script src="{{asset('admin/private_file/product/add/add.js')}}"></script>

@endsection
