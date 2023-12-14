@extends('layouts.index')
@section('content')
@section('js')
<script src="{{asset('external_library/switch_alert/sweetalert2@11.js')}}"></script>
<script src="{{asset('admin/private_file/product/delete.js')}}"></script>
@endsection
@php
$users = Auth::user();
@endphp
 <!-- table dark start -->
 <div class="col-sm-12">
                @include('admin.partial.grid_content',[ 'name' => 'San Pham'])                                                              
     </div>
    <div class="row">
        <div class="col-lg-12 stretched_card mt-4">
            <div  class="card">
                        @include('components.alert')
                        <div class="card-body">
                            <h4  class="card_title d-inline">Danh Sách Sản Phẩm</h4>
                            @if($users->can('admin.product.create'))
                            <a  href="{{route('admin.product.create')}}" class="btn btn-success float-right">Thêm sản phẩm</a>
                            @endif
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col">Id</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Ảnh đại diện </th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Danh mục</th>      
                                            <th scope="col">Số lượng</th>                                          
                                            <th scope="col">Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $productsItem)
                                            <tr>
                                                <td>{{$productsItem->id}}</td> 
                                                <td>{{$productsItem->name}}</td>                   
                                                <td> <img style = "width:100px; height:100px;" src="{{$productsItem->feature_image_path}}" alt="{{$productsItem->feature_image_name}}"></td>
                                                <td>{{number_format($productsItem->price)}}</td>
                                                <td>{{optional($productsItem->product_corresponding)->nameCategory}}</td>   
                                                <td>{{number_format($productsItem->amount)}}</td>
                                                <td>  
                                                      @if($users->can('admin.product.edit'))                                  
                                                    <a  href="{{route('admin.product.edit',['id'=>$productsItem->id])}}" class="btn btn-warning" ><i class="far fa-edit"></i></a>
                                                    @endif
                                                    @if($users->can('admin.product.delete'))
                                                    <a   data-url="{{route('admin.product.delete',['id'=>$productsItem->id])}}" class="btn btn-danger delete_switch" ><i class="far fa-trash-alt"></i></a>
                                                    @endif
                                                </td>                                            
                                            </tr>      
                                        @endforeach           
                                        </tbody>
                                    </table>
                                    <div  class="col-lg-8" >{{$products->links()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
   </div>
                  
<!-- table dark end -->
@endsection

