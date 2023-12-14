@extends('layouts.index')
@section('content')
@php
$users = Auth::user();
@endphp
 <!-- table dark start -->
    <div class="row">
                <div class="col-lg-12 stretched_card mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4  class="card_title d-inline">Danh Sách Category</h4>
                            @if($users->can('admin.category.create'))
                            <a id = "load" href="{{route('admin.category.create')}}" class="btn btn-success float-right">Tạo mới</a>
                            @endif
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên Category</th>
                                            <th scope="col">Chức Năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $items)
                                        <tr>
                                            <th scope="row">{{$items->id}}</th>                                
                                            <td>{{$items->nameCategory}}</td>
                                            <td>         
                                                 @if($users->can('admin.category.edit'))                           
                                                <a id = "load" href="{{route('admin.category.edit',['id'=>$items->id])}}" class="btn btn-warning" ><i class="far fa-edit"></i></a>
                                                @endif
                                                @if($users->can('admin.category.delete'))
                                                <a id = "load" href="{{route('admin.category.delete',['id'=>$items->id])}}" class="btn btn-danger" ><i class="far fa-trash-alt"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach                                       
                                        </tbody>
                                    </table>
                                    <div class="col-lg-8" > {{ $data->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
   </div>
                  
<!-- table dark end -->
@endsection