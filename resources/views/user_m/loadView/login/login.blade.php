@extends('layouts.center')
@section('contents')
@include('user_m.partial.banner',['p1' => 'Login']);
<!-- Checkout-Area -->
<section id="login_area" class="ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="account_form">
                        <h3>Login</h3>
                        <form action="{{route('customer.login')}}" method="POST">
                            @csrf
                            <div class="default-form-box">
                           @include('components.alert') 
                                <label>Username or email <span>*</span></label>
                                <input type="text" name="name" class="form-control ">

                            </div>
                            <div class="default-form-box">
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password" class="form-control">
                         
                            </div>
                            <div class="login_submit">
                                <button class="theme-btn-one btn-black-overlay btn_md" type="submit">login</button>
                            </div>
                            <div class="remember_area">
                                <label class="checkbox-default">
                                    <input type="checkbox" name="remember_me">
                                    <span>Remember me</span>
                                </label>
                            </div>

                            <a href="{{route('customer.register')}}">Create Your Account?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection