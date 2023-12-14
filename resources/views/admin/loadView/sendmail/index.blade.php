@extends('layouts.index')
@section('content')
<form action="{{route('admin.sendcoupon')}}" method="POST">
    @csrf
<div class="row">
<div class="col-lg-12 stretched_card mt-4">
                    <div class="card ">
                    <div class="card-body">    
                    @include('components.alert')                
                            <h4  class="card_title d-inline">Danh Sách Gmail khách hàng</h4>   
                            <p class="text-danger">Chú ý: Khách hàng sẽ nhận được gmail sau 5p từ lúc gửi</p>                      
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col"><input type="checkbox" class="select-all"/></th>
                                            <th >Danh sach email khach hang</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customer as $item)
                                            <tr>
                                               <td scope="row" id="checkboxes"><input type="checkbox" name="customer[]" value="{{$item->email}}" /></td>
                                                <td>{{$item->email}}</td>
                                            </tr>                               
                                            @endforeach
                                        </tbody>
                                    </table>                                   
                                </div>
                            </div>
                        </div>
                    </div>

      </div>      
</div>
<div class="row">
    <div class="col-sm-6 pt-3">
        <div class="card">
            <div class="card-body">
            <h4>Chon chuong trinh giam gia</h4>
 <div class="select">
   <select name="coupon" >
     <option selected disabled>--Chon--</option>
    @foreach($coupon as $item)
    <option value="{{$item->id}}">{{ $item->coupon_name }}</option>  
    @endforeach
   </select>
 </div> 
            </div>
        </div>
    </div>
    <div class="col-sm-6 pt-3">
        <button class="btn btn-success">Gui mail</button>
    </div>
</div>
</form>
@endsection
@section('js')
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