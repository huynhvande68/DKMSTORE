@php
$users = Auth::user();
@endphp
                <div class="col-lg-12 stretched_card mt-4">
          
                    <div  class="card">
                    @include('components.alert')
                        <div class="card-body">
                            <h4  class="card_title d-inline">Mã giảm giá</h4>
                            @if($users->can('admin.coupon.create'))
                            <a id="load"  href="{{route('admin.coupon.create')}}" class="btn btn-success float-right">Thêm ma</a>
                            @endif
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col">Id</th>
                                            <th scope="col">Tên CT giảm giá </th>
                                            <th scope="col">Mã giảm giá </th>
                                            <th scope="col">SL ban đầu</th>
                                            <th scope="col">SL còn lại</th>
                                            <th scope="col">SL % giảm & mệnh giá</th>
                                            <th scope="col">Thời hạn còn lại</th>  
                                            <th scope="col">Tình trạng</th>                                          
                                            <th scope="col">Chức năng</th>
                                        </tr>
                                        </thead>
                                    
                                
                                        <tbody>
                                        @foreach($coupon as $couponItem)
                                            <tr>
                                                @php
                                           
                                               $diff = Carbon\Carbon::parse( now('Asia/Ho_Chi_Minh'))->diffInDays($couponItem->day_end);
     
                                                @endphp
                                                <td>{{$couponItem->id}}</td> 
                                                <td>{{$couponItem->coupon_name}}</td>                   
                                                <td>{{$couponItem->coupon_code}}</td>                   
                                                <td>{{$couponItem->coupon_number}}</td>
                                                <td>{{$couponItem->coupon_unnumber}}</td>
                                                <td>{{$couponItem->coupon_detail}}</td> 
                                                <td>{{ $diff}} day</td>
                                                @if($couponItem->coupon_condition == 0 )
                                                <td><span class="badge condition badge-danger">da het han</span></td>    
                                                @elseif($couponItem->coupon_condition == 1)
                                                <td><span class="badge condition badge-success">dang su dung</span></td>    
                                                @else
                                                <td><span class="badge condition badge-warning">chua den ngay </span></td>    
                                                @endif

                                                <td>   
                                                @if($users->can('admin.coupon.edit'))                                  
                                                    <a  href="{{route('admin.coupon.edit',['id'=>$couponItem->id])}}" class="btn btn-warning" ><i class="far fa-edit"></i></a>
                                                @endif
                                                @if($users->can('admin.coupon.delete'))
                                                    <a   data-url="{{route('admin.coupon.delete',['id'=>$couponItem->id])}}" class="btn btn-danger delete_coupon" ><i class="far fa-trash-alt"></i></a>
                                                @endif
                                                </td>                                            
                                            </tr>      
                                        @endforeach           
                                        </tbody>
                                    </table>
                                    <div  class="col-lg-8" >{{$coupon->links()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>