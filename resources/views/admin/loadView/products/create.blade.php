@extends('layouts.index')
<!-- load css -->
@section('css')
<link href="{{asset('external_library/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
<!-- end load -->

<!-- end load js -->
@section('content')
<div class="col-sm-12">
                @include('admin.partial.grid_content',[ 'name' => 'San Pham',
                                                        'value'=>  route('admin.product.show')])       
     </div>
<div class="row">
<div class="col-12 mt-4">
                    <div class="card">
                        <form action="{{route('admin.product.store')}}"  method = "POST" enctype="multipart/form-data" >
                            @csrf
                        <div class="form-group">
                        <div class="card-body">
                            <h4 class="card_title">Thêm sản phẩm</h4>
                            <!-- enter the box product -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập tên sản phẩm </label>
                            <input class="@error('name_product') is-invalid @enderror form-control form-control-lg  mb-3" type="text" name="name_product" value="{{ old('name_product') }}" placeholder="Nhập tên sản phẩm">                        
                            @error('name_product')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- enter the box price -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập giá sản phẩm </label>
                            <input class="@error('price_product') is-invalid @enderror form-control form-control-lg  mb-3" type="text" name="price_product" value="{{ old('price_product') }} " placeholder="Nhập giá sản phẩm"> 
                            @error('price_product')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- enter the path images -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Chọn ảnh đại diện</label>
                            <input class="@error('feature_image_path') is-invalid @enderror form-control form-control-lg  mb-3" type="file" name="feature_image_path" value="{{ old('feature_image_path') }}" > 
                            @error('feature_image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- enter the multiple path images -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Những ảnh liên quan </label>
                            <input class="@error('image_path') is-invalid @enderror form-control form-control-lg  mb-3" type="file" multiple name="image_path[]" value="{{ old('image_path[]') }}" > 
                            @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- enter amount of products in store -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập số lượng sản phẩm</label>
                            <input class="@error('amount') is-invalid @enderror form-control form-control-lg  mb-3" type="text" name="amount" value="{{ old('amount') }}" > 
                            @error('feature_image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- choose category -->
                             <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Chọn danh mục phù hợp</label>
                                <select  id="cate " class=" select_pr form-control form-control-sm @error('category_id') is-invalid @enderror " name = "category_id"  >
                               
                                    <option value = "" placeholder = "Chọn danh mục"></option>

                                        {!! $htmlOption!!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                            <!-- enter the input tag  -->
                            <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Nhập tag </label>
                                <select id="chonn" name = "tags[]" class="form-control form-control-sm @error('tags') is-invalid @enderror"  multiple="multiple" >

                                </select>
                                @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                            <!-- content product -->
                            <div class="form-group pt-3">
                                <label for="exampleFormControlTextarea1">Nội dung sản phẩm</label>
                                <textarea name = "content"  class="form-control my-editor @error('content') is-invalid @enderror" id="exampleFormControlTextarea1" rows="10">{{ old('content') }}</textarea>
                                @error('content')
                                     <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                            </div>
                            
                            <button class="btn btn-success float-right mt-1" type = "submit">Submit</button>
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
