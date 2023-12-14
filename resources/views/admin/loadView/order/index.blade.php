@extends('layouts.index')
@section('content')


<!--==================================*
           Main Section
*====================================-->
<div class="partents main-content-inner">
    @include('admin.loadView.order.cursive_index')
</div>


@endsection
@section('js')
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('admin/private_file/order/cofirm_order.js')}}"></script>
<script src="{{asset('admin/private_file/order/remove_order.js')}}"></script>

@endsection
