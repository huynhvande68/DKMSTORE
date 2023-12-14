@php
$users = Auth::user();
@endphp
<div class="col-lg-12 stretched_card mt-4">
                    <div class="card ">
                    <div class="card-body">
                        @include('components.alert')
                            <h4  class="card_title d-inline">Danh Sách khach hang</h4>                         
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Ảnh đại diện</th>
                                            <th scope="col">Tên người dùng</th>
                                            <th scope="col">Mức độ thân thiết</th>
                                            <th scope="col">Chức Năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customer as $cus)
                                        <tr>
                                            <th scope="row">{{$cus->id}}</th>                                
                                            <td class="font-weight-bold"><img src="{{$cus->image}}" alt="Girl in a jacket" width="100" height="100"></td>
                                            <td>{{$cus->name}}</td>
                                         
                                            @php  $start = App\Models\Admin\Transaction::where('customer_id',$cus->id)->get();  @endphp
    
                                           @if(count($start) > 10)
                                           <td class="text-warning">
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                            </td>
                                           @elseif(count($start) > 7 && count($start) < 10 )
                                           <td class="text-warning">
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="far fa-star"></i>
                                              
                                            </td>
                                           @elseif(  count($start) >5 && count($start) < 8)
                                           <td class="text-warning">
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="far fa-star"></i>
                                               <i class="far fa-star"></i>
                                               
                                            </td>
                                           @elseif( count($start) >3 && count($start) < 6)
                                           <td class="text-warning">
                                               <i class="fas fa-star"></i>
                                               <i class="fas fa-star"></i>
                                               <i class="far fa-star"></i>
                                               <i class="far fa-star"></i>
                                               <i class="far fa-star"></i>
                                         
                                            </td>
                                           @else
                                           <td class="text-warning">
                                               <i class="fas fa-star"></i>
                                               <i class="far fa-star"></i>
                                               <i class="far fa-star"></i>
                                               <i class="far fa-star"></i>
                                               <i class="far fa-star"></i>
                                             
                                            </td>
                                           @endif
                                            <td>    
                                            @if($users->can('admin.detail.customer'))                                
                                                <a  href="{{route('admin.detail.customer',['id' => $cus->id])}}" class="btn btn-success" ><i class="far fa-eye"></i></a>
                                            @endif
                                                @if($users->can('admin.delete.customer'))
                                                <a  href="" data-url="{{route('admin.delete.customer',['id' => $cus->id])}}" class="delete btn btn-danger" ><i class="far fa-trash-alt"></i></a>
                                                @csrf
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach                                     
                                        </tbody>
                                    </table>
                                    <div class="col-lg-8" > </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>