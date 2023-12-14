@php
$users = Auth::user();
@endphp
<div class="card-body">
                        @include('components.alert')
                            <h4  class="card_title d-inline">Danh Sách Các Bài Viết</h4>
                            @if($users->can('admin.create.blog'))
                            <a href="{{route('admin.create.blog')}}" class="btn btn-success float-right">Viết Blog</a>
                            @endif
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên Bài Viết</th>
                                            <th scope="col">Lượng truy cập</th>
                                            <th scope="col">Chức Năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <th scope="row">{{$blog->id}}</th>                                
                                            <td class="font-weight-bold">{{$blog->name_blog}}</td>
                                            <td>{{$blog->care_product}}</td>
                                            <td>     
                                                  @if($users->can('admin.edit.blog'))                               
                                                <a  href="{{route('admin.edit.blog',['id' =>$blog->id])}}" class="btn btn-warning" ><i class="far fa-edit"></i></a>
                                                @endif
                                                @if($users->can('admin.delete.blog'))
                                                <a  href="" data-url="{{route('admin.delete.blog',['id'=>$blog->id])}}" class="delete btn btn-danger" ><i class="far fa-trash-alt"></i></a>
                                                @endif
                                                @csrf
                                            </td>
                                        </tr>
                                        @endforeach                                     
                                        </tbody>
                                    </table>
                                    <div class="col-lg-8" >{{ $blogs->links() }} </div>
                                </div>
                            </div>
                        </div>