@php
$users = Auth::user();
@endphp
<div class="row">
    <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card_title">Xác thực đơn hàng</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên KH</th>
                                            <th scope="col">Ngày</th>                                 
                                            <th scope="col">Tình trạng</th>
                                            <th scope="col">Xác nhận đơn</th>
                                            <th scope="col">Thanh toán</th>
                                            <th scope="col">Chi tiết đơn hàng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                      @foreach($or as $item )
                                        <tr>
                                            <th scope="row">{{$item->tranor->id}}</th>
                                            <td>{{$item->cus->name}}</td>
                                            <td>{{$item->created_at->format('M d Y')}}</td>                                         
                                            <td>
                                                @if($item->status == 0)
                                                <span  class="st{{$item->id}} badge badge-danger">Đang chờ</span>
                                                @elseif($item->status ==1)
                                                <span  class="badge badge-success">Đã xác nhận</span>
                                                @elseif($item->status ==2)
                                                <span class="badge badge-warning">Đã hủy</span>
                                                @endif
                                            </td>
                                            <td>                                              
                                                @if($item->status ==1)
                                                <input type ="checkbox" data-url="{{route('admin.order.confirmorder',['id' => $item->id])}}" class="st-check" value="1" checked disabled >
                                                
                                                @elseif($item->status ==0)
                                                <input type ="checkbox" data-url="{{route('admin.order.confirmorder',['id' => $item->id])}}" class="confirm-wait st-check" value="0"  id="{{$item->id}}">
                                                @endif
                                                
                                            </td>
                                             
                                                @if($item->tranor->payment == 'option1')
                                                <td class="text-dark">Thanh toán khi nhận hàng</td>
                                                @elseif($item->tranor->payment =='option2')
                                                <td >Chuyển khoản <span class="text-danger">(chú ý)</span></td>
                                                @elseif($item->tranor->payment =='option3')
                                                <td  >Thanh toán Paypal<span class="text-danger">(chú ý)</span></td>
                                                @endif
                                                
                                         
                                            <td>
                                                @if($users->can('admin.order.detail'))
                                                        <a href="{{route('admin.order.detail',['idorder' =>$item->orders_id])}}" style="padding-right:20px;" class=" text-primary"><i class="fas fa-info-circle"></i></a>
                                                @endif
                                                    @if($users->can('admin.order.remove.confirmorder'))
                                                    <a href="" data-url="{{route('admin.order.remove.confirmorder',['id' =>$item->id])}}" class=" remove-confirm text-primary"><i class="far fa-trash-alt"></i></a>
                                                    @endif
                                                </td>
                                            </td>
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