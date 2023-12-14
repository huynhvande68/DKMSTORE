<div class="col-lg-12 stretched_card mt-4">
 <div class="card ">
    <div class="card-body">
                        @include('components.alert')
                            <h4  class="card_title d-inline">Danh Sách Các Bài Viết</h4>
                            <a href="{{route('admin.role.create')}}" class="btn btn-success float-right">Tạo chức năng</a>
                            <div class="single-table">
                                <div class="table-responsive">                                   
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên chức vụ</th>
                                            <th scope="col">Các quyền</th>
                                            <th scope="col">Chức Năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @foreach($role as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>                                
                                            <td class="font-weight-bold">{{$item->name}}</td>
                                            <td style="width: 600px;">
                                            @foreach($item->roles_permission as $items)
                                            <span style="font-size: 12px;line-height: 5px;margin-top: 5px;" class="btn btn-info">{{$items->name}}</span>
                                            @endforeach
                                            </td>
                                            <td>                                    
                                                 <a  href="{{route('admin.role.edit',['id' =>$item->id])}}" class="btn btn-warning" ><i class="far fa-edit"></i></a>
                                                <a  href="" data-url="{{route('admin.role.delete',['id'=>$item->id])}}" class="delete btn btn-danger" ><i class="far fa-trash-alt"></i></a>
                                                @csrf
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