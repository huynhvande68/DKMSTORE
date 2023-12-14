@extends('layouts.index')
@section('css')
<link href="{{asset('external_library/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
<div class="col-12 mt-4">
                    <div class="card">
                        <form action="{{route('admin.store.user')}}"  method = "POST" enctype="multipart/form-data" >
                            @csrf
                        <div class="form-group">
                        <div class="card-body">
                            <h4 class="card_title">Tạo tài khoản</h4>
                            <!-- enter the box product -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhap ten</label>
                            <input class="@error('name') is-invalid @enderror form-control form-control-lg  mb-3" type="text" name="name" value="{{ old('name') }}" placeholder="Nhap ten">                        
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label  class=" pl-2 "  style=" font-size: 14px;">Chọn ảnh đại diện </label>
                            <input class="@error('avatars') is-invalid @enderror form-control form-control-lg  mb-3" type="file" name="avatars" >                        
                            @error('avatars')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- email -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập email</label>
                            <input class="@error('email') is-invalid @enderror form-control form-control-lg  mb-3" type="email" name="email" value="{{ old('email') }}" placeholder="Nhap email">                        
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                             <!-- passwords -->
                             <label  class=" pl-2 "  style=" font-size: 14px;">Nhập mật khẩu</label>
                            <input class="@error('password') is-invalid @enderror form-control form-control-lg  mb-3" type="password" name="password" value="{{ old('password') }}" placeholder="Nhap mat khau">                        
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           <!-- choose category -->
                           <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Chọn chức năng</label>
                                <select  id="cate " class="select_pr form-control form-control-sm " name = "roles[]"  multiple="multiple" >
                                @foreach($roles as $role)
                                    <option value = "{{$role->id}} " >{{ $role->name}}</option>                                    
                                @endforeach        
                                </select>
                                @error('roles')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                                                                            
                            
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
<script src="{{asset('admin/private_file/account/create.js')}}"></script>
@endsection