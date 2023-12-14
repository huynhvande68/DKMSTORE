@extends('layouts.index')
@section('content')


 <!-- table dark start -->
 <div class="col-sm-12">
                @include('admin.partial.grid_content',[ 'name' => 'Ma giam gia'])                                                              
     </div>
     <div class="row thathere">
    @include('admin.loadView.coupon.recusive_index')
    </div>
<!-- table dark end -->
@endsection
@section('js')
<script src="{{asset('admin/private_file/coupon/delete_coupon.js')}}"></script>
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
@endsection
