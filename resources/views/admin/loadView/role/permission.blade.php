@extends('layouts.index')
@section('content')
<div class="row delete-role">
                
                        @include('admin.loadView.role.permissionrecusive')
                
   </div>
@endsection
@section('js')
<!-- <script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('admin/private_file/role/delete.js')}}"></script> -->
<script>

$('.select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 

</script>
@endsection