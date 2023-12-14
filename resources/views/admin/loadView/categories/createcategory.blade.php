@extends('layouts.index')
@section('content')
<div class="row">
<div class="col-12 mt-4">
                    <div class="card">
                        <form action="{{route('admin.category.store')}}" id="form" method = "POST" >
                            @csrf
                        <div class="form-group">
                        <div class="card-body">
                            <h4 class="card_title">Tạo các danh mục Category</h4>
                            <input class="form-control form-control-lg input-rounded mb-3" type="text" name="name" placeholder="Nhập Tên Danh Mục">            
                             <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Danh Sách Danh Mục</label>
                                        <select id="cate" class="form-control form-control-sm input-rounded" name = "partent_Id">
                                            <option value = "0">Chọn danh mục cha</option>
                                             {!! $htmlOption!!}
                                        </select>
                                        <button class="btn btn-success float-right mt-1" type = "submit">Submit</button>
                          </div>
                        </div>
                    
                    
                        </form>
                    </div>
</div>          
</div>
@endsection