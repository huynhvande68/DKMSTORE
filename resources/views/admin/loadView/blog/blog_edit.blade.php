@extends('layouts.index')
@section('css')
<link href="{{asset('external_library/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
<div class="col-12 mt-4">
                    <div class="card">
                        <form action="{{route('admin.update.blog',['id' =>$blog->id])}}"  method = "POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                        <div class="card-body">
                            <h4 class="card_title">Sửa Blog</h4>
                            <!-- enter the box product -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập tên tiêu đề </label>
                            <input class="@error('name_blog') is-invalid @enderror form-control form-control-lg  mb-3" type="text" name="name_blog" value="{{ $blog->name_blog }}" >  
                                                 
                            @error('name_blog')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           
                            <label  class=" pl-2 "  style=" font-size: 14px;">Chọn ảnh đại diện </label>
                            <input class="@error('file_blog') is-invalid @enderror form-control form-control-lg  mb-3" type="file" name="file_blog" >
                            <div>
                            <img style="height: 100px; width:200px;" src="{{ $blog->image_blog }}"> 
                            </div>                        
                            @error('file_blog')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           <!-- choose category -->
                           <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Chọn tag liên quan</label>
                                <select  id="cate " class="select_pr form-control form-control-sm " name = "blog_tags[]"  multiple="multiple" >
                                    @foreach($blog->blogs as $i)
                                    <option value = "{{$i->id}} " selected  >{{ $i->name  }}</option>                                  
                                     
                                    @endforeach
                                     @foreach($tags as $tag)    
                                                                                                                                                
                                     <option value = "{{$tag->id}} ">{{ $tag->name  }}</option>  
                                 
                                    @endforeach  
                                </select>
                             
                               
                            <!-- content product -->
                            <div class="form-group pt-3">
                                <label for="exampleFormControlTextarea1">Nội dung sản phẩm</label>
                                <textarea name = "content"  class="@error('content') is-invalid @enderror form-control editor " id="exampleFormControlTextarea1" rows="10">{{$blog->content}}</textarea>
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
@section('js')

<script src="{{asset('external_library/select2/select2.min.js')}}"></script>
<script src="{{asset('external_library/select2/tinymce.min.js')}}" ></script>
<script src="{{asset('admin/private_file/blog/create.js')}}"></script>
@endsection