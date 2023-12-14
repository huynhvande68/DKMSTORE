@extends('layouts.index')
@section('content')
<div class="row delete-user">
            @include('admin/loadView/mcustomer/all_cus_recusi')
   </div>
@endsection
@section('js')
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('admin/private_file/mcustomer/delete.js')}}"></script>
@endsection