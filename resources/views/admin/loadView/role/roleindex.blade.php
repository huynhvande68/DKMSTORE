@extends('layouts.index')
@section('content')
<div class="row delete-role">
                
                        @include('admin.loadView.role.roleindexrecusive')
                
   </div>
@endsection
@section('js')
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('admin/private_file/role/delete.js')}}"></script>

@endsection