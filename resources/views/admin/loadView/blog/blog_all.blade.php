@extends('layouts.index')
@section('css')
<link href="{{asset('external_library/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row delete-pr">
                <div class="col-lg-12 stretched_card mt-4">
                    <div class="card ">
                        @include('admin.loadView.blog.blog_all_recusi')
                    </div>
                </div>
   </div>
@endsection
@section('js')
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('external_library/select2/select2.min.js')}}"></script>
<script src="{{asset('admin/private_file/blog/delete.js')}}"></script>
@endsection