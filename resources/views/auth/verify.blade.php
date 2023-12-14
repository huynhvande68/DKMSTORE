@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Xác thực email của bạn') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Vui lòng kiểm tra email của bạn.') }}
                        </div>
                    @endif

                    {{ __('Trước khi truy cập, vui lòng xác thực email của bạn.') }}                   
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click vào đây để gửi yêu cầu') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
