@extends('layouts.index')
<!-- load css -->
@section('css')
<style>

    .show_mess{
        margin-top: 38px;
        font-weight: 800;
        margin-left: -12px;
    }
</style>
@endsection
<!-- end load -->

<!-- end load js -->
@section('content')
<div class="col-sm-12">
                @include('admin.partial.grid_content',[ 'name' => 'Chinh sua ma giam gia',
                                                        'value'=>  route('admin.coupon.show')])       
     </div>
<div class="row">
<div class="col-12 mt-4">
                                @if ($message = Session::get('warning'))

                                <div class="alert alert-warning alert-block">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong>{{ $message }}</strong>

                                </div>

                                @endif 
                    <div class="card">
                        <form  action="{{route('admin.coupon.update',['id' =>$edit_coupon->id])}}"  method = "POST" >
                            @csrf
                        <div class="form-group">
                        <div class="card-body">
                            <h4 class="card_title">Cap nhat ma giam gia</h4>
                            <!-- enter the box product -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập tên chuong trinh giam gia </label>
                            <input class="@error('coupon_name') is-invalid @enderror form-control form-control-lg  mb-3" type="text" name="coupon_name" value="{{ $edit_coupon->coupon_name}}">                        
                            @error('coupon_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- enter the box price -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">So luong ma </label>
                            <input class="@error('coupon_number') is-invalid @enderror form-control form-control-lg  mb-3" type="text" name="coupon_number" value="{{ $edit_coupon->coupon_number }} "> 
                            @error('coupon_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <!-- day -->
                            <!-- enter the box price -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Ngay bat dau</label>
                            <input class="@error('coupon_begin') is-invalid @enderror form-control form-control-lg  mb-3" type="datetime-local" name="coupon_begin" value=" {{ $edit_coupon->day_start }} "> 
                            @error('coupon_begin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label  class=" pl-2 "  style=" font-size: 14px;">Ngay ket thuc</label>
                            <input class="@error('coupon_end') is-invalid @enderror form-control form-control-lg  mb-3" type="datetime-local" name="coupon_end" value="{{ $edit_coupon->day_end }}  "> 
                            @error('coupon_end')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <!-- choose category -->
                             <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Giam theo phan tram & Tien mat</label>
                                <select  id=" " class="pers cate_coupon form-control form-control-sm @error('coupon_select') is-invalid @enderror " name = "coupon_select"   value="{{$edit_coupon->coupon_select}}" >
                                                                   
                                    @if($edit_coupon->coupon_select == 1)
                                    <option selected value = "1" >Giam theo phan tram</option>
                                    @elseif($edit_coupon->coupon_select == 2)
                                    <option selected value = "2" >Giam tien mat</option>
                                    @else
                                    <option selected value = "0" >Chọn danh mục</option>
                                    @endif  
                                </select>
                                @error('coupon_select')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror    
                                  <!-- enter the box price -->
                    
                      <div class="row">
                      <div class="col-sm-4">
                          <label  class=" pl-2 "  style=" font-size: 14px;">So phan tram (%)- tien can giam gia</label>
                            <input class=" perss @error('coupon_detail') is-invalid @enderror form-control form-control-lg  mb-3"  type="text" name="coupon_detail" value="{{ $edit_coupon->coupon_detail}} " >    
                               
                            @error('coupon_detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror    
                          </div>
                          <div class="col-sm-4 show_mess">
                          <span class ="show"></span>   
                          </div>
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

<script src="{{asset('admin/private_file/coupon/edit_coupon.js')}}"></script>
@endsection
