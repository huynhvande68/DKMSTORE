@extends('layouts.center')
@section('css')
<style>
    .notif{
        display: inline-block;
        float: right;
        border-radius: 50%;
        background-color: white;
        color:black;
        padding: 2px 7px;
    }
</style>
@endsection
@section('contents')
@include('user_m.partial.banner',['p1' => 'My Account']);

  <!-- My-account-area-Area -->
  <section id="my-account_area" class="account-cha ptb-100">
      @include('user_m.loadView.my_account.recusive_show_order')
    </section>


@endsection
@section('js')
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('user_m/order/error_order.js')}}"></script>
@endsection