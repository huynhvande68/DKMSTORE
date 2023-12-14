@extends('layouts.center')

@section('contents')
@include('user_m.partial.banner',['p1' => 'Edit My Account']);

   <!-- Account Info Edit Area  -->
   <section id="account_edit" class="pt-100">
   <form action="{{route('update_my_account')}}" method="POST" id="account_info_form" enctype="multipart/form-data">
                            @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="account_thumd">
                        <div class="account_thumb_img">
                            @if(isset($information_customer->image))
                            <img src="{{$information_customer->image}}" alt="img" class="profile-pic">
                            @else
                            <img src="assets/img/team/team1.png" alt="img" class="profile-pic">
                            @endif
                            <div class="fixed_icon"><input type="file" class="file-upload " name="image_ok" accept="image/*"><i class="fas fa-camera"></i></div>                          
                        </div>
                        @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <h4>{{$information_customer->name}} </h4>
                        <p>sdt : {{$information_customer->mobiephone}}</p>
                    </div>
                </div>
                <div class="col-lg-9">

                    @include('components.alert')

                    <div class="account_setting">
                        <div class="account_setting_heading">
                            <h2>Chỉnh sửa thông tin chi tiết</h2>
                            <p>Chỉnh sửa những cài đặt và thay đổi password tại đây.</p>
                        </div>
  
                            <div class="input-radio">
                                <span class="custom-radio"><input type="radio" name="sex" value="mr" name="id_gender"> Mr.</span>
                                <span class="custom-radio"><input type="radio" name="sex" value="mrs" name="id_gender"> Mrs.</span>
                            </div>
                            <div class="form-group">
                                <label for="f_name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{$information_customer->name}}" required>    
                                            
                            </div>
                            <div class="form-group">
                                <label for="email_address">Phone number</label>
                                <input type="text" class="form-control @error('phonenumber') is-invalid @enderror"  value="{{ $information_customer->mobiephone }}" name="phonenumber">
                              
                            </div>
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email_address" name="email"
                                value="{{$information_customer->email}}" >
                              
                            </div>
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control @error('password_current') is-invalid @enderror" value="{{ old('password_current') }}" name="password_current" id="current_password"
                                    placeholder="Enter your current password" >
                                 
                                <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" id="new_password"
                                    placeholder="Enter your new password" >
                                 
                                <input type="password" class="form-control "  name="password_confirmation" id="re_password"
                                    placeholder="Re-type your new password" >

                            </div>
                            <button type="submit" class="theme-btn-one bg-black btn_sm">Cập nhật thông tin</button>                                             
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
    <br>
@endsection
@section('js')
<script>
    $(document).ready(function() {
	
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>
@endsection