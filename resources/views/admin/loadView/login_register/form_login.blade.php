@extends('layouts.login_register')
@section('content')
                    <form action = "{{route('user.login')}}" method = "POST">
                        @csrf
                        <div class="login-form-body">
                        @include('components.alert')
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name ="email" id="exampleInputEmail1">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name ="password" id="exampleInputPassword1">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="row mb-4 rmber-area">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox primary-checkbox mr-sm-2">
                                        <input type="checkbox" name ="remember_me" class="custom-control-input" id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{route('user.forgot')}}" class="text-primary">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" type="submit" class="btn btn-primary">Submit <i class="fas fa-arrow-right"></i></button>
                                <div class="login-other row mt-4">
                                    <div class="col-6">
                                        <a class="fb-login" href="#"><span class="login_txt">Log in with</span>  <i class="fab fa-facebook-square"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <a class="google-login" href="#"><span class="login_txt">Log in with</span>  <i class="fab fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer text-center mt-5">
                                <p class="text-muted">Don't have an account? <a href="{{route('user.register')}}" class="text-primary">Sign up</a></p>
                            </div>
                        </div>
                    </form>
@endsection