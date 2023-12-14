@extends('layouts.login_register')
@section('content')
                    <form action = "{{route('user.register')}}" method = "POST">
                        @csrf
                        <div class="login-form-body">
                        @include('components.alert')
                            <div class="form-gp">
                                <label for="exampleInputName1">Full Name</label>
                                <input type="text" name = "name" id="exampleInputName1">
                                <i class="ti-user"></i>
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name = "email" id="exampleInputEmail1">
                                <i class="ti-email"></i>
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name = "password" id="exampleInputPassword1">
                                <i class="ti-lock"></i>
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input type="password" name = "password_confirmation" id="exampleInputPassword2">
                                <i class="ti-lock"></i>
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" class="btn btn-primary" type="submit">Submit <i class="fas fa-arrow-right"></i></button>
                                <div class="login-other row mt-4">
                                    <div class="col-6">
                                        <a class="fb-login" href="#"><span class="login_txt">Sign up with</span>  <i class="fab fa-facebook-square"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <a class="google-login" href="#"><span class="login_txt">Sign up with</span>  <i class="fab fa-google-plus"></i></a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-footer text-center mt-5">
                                <p class="text-muted">Don't have an account? <a href="{{route('user.login')}}">Sign in</a></p>
                            </div>
                        </div>
                    </form>
@endsection