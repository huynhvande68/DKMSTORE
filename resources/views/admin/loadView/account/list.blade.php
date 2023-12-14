@extends('layouts.index')
@section('content')
<div class="row delete-user">
            @include('admin/loadView/account/list_recusive')
   </div>
@endsection
@section('js')
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('admin/private_file/account/delete.js')}}"></script>
@endsection