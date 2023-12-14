@extends('layouts.login_register')
@section('content')
                    <form action = "{{route('user.sendmail')}}" method = "POST">
                        @csrf
                        <div class="login-form-body">
                        @include('components.alert')
                           
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name = "email" id="exampleInputEmail1">
                                <i class="ti-email"></i>
                            </div>                           
                            <div class="submit-btn-area">
                                <button id="form_submit" class="btn btn-primary" type="submit">Check <i class="fas fa-arrow-right"></i></button>
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