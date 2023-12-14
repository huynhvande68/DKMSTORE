@php
$users = Auth::user();
@endphp
<div class="col-lg-12 stretched_card mt-4">
                    <div class="card ">
                    <div class="card-body">
                        @include('components.alert')
                            <h4  class="card_title d-inline">Danh sách tài khoản nhân viên</h4>                         
                            <div class="single-table">
                            @if($users->can('admin.create.user'))
                            <a  href="{{route('admin.create.user')}}"style="float:right;" class="btn btn-success" >Tạo tài khoản</a>
                            @endif
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Ảnh đại diện</th>
                                            <th scope="col">Tên người dùng</th>
                                            <th scope="col">Chức Năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user as $cus)
                                        <tr>
                                            <th scope="row">{{$cus->id}}</th>                                
                                            <td class="font-weight-bold"><img src="{{$cus->avatar}}" alt="avatar" width="100" height="100"></td>
                                            <td>{{$cus->name}}</td>                                      
                                            <td>      
                                                @if($users->can('admin.edit.user'))                              
                                                    <a  href="{{route('admin.edit.user',['id' => $cus->id])}}" class="btn btn-warning" ><i class="far fa-edit"></i></a>
                                                @endif
                                                @if($users->can('admin.delete.user'))
                                                     <a  href="" data-url="{{route('admin.delete.user',['id' => $cus->id])}}" class="delete btn btn-danger" ><i class="far fa-trash-alt"></i></a>
                                                @csrf
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach                                     
                                        </tbody>
                                    </table>
                                    <div class="col-lg-8" >{{$user->links()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>