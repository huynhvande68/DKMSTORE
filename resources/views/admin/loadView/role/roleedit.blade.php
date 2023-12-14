@extends('layouts.index')
@section('css')
<link href="{{asset('external_library/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
<div class="col-12 mt-4">
                    <div class="card">
                        <form action="{{route('admin.role.update',['id' => $role->id])}}"  method = "POST" >
                            @csrf
                        <div class="form-group">
                            @include('components.alert')
                        <div class="card-body">
                            <h4 class="card_title">Tao chuc nang</h4>
                            <!-- enter the box product -->
                            <label  class=" pl-2 "  style=" font-size: 14px;">Nhập tên chuc nang</label>
                            <input class="form-control form-control-lg  mb-3" type="text" name="name_role" value="{{ $role->name}}" placeholder="Nhập tên tiêu đề">                        
                          

                           <label for="cate" class="pt-3 pl-2 "  style=" font-size: 14px;">Chon cac quyen</label>
                                <select  id="cate " class="select_pr form-control form-control-sm " name = "role_tags[]"  multiple="multiple" >
                                @foreach($permission as $item)
                                    <option 
                                    {{ $prs->contains($item->id) ? 'selected' : ''}}
                                    value = "{{$item->id}} " >{{ $item->name }}</option>                                    
                                @endforeach        
                                </select>

                                <div class="button-container">
                                <button type="button" style="background-color: gray; color:aliceblue; padding:3px; margin-top:5px; border-radius:5px;" onclick="selectAll()">Chon het</button>
                                <button type="button" style="background-color: gray; color:aliceblue; padding:3px; margin-top:5px; border-radius:5px;" onclick="deselectAll()">Xoa het</button>
                                </div>
                             
                            </div>
                            
                            <button class="btn btn-warning float-right mt-1" type = "submit">Update</button>
                          </div>
                        </div>
                    
                    
                        </form>
                    </div>
</div>          
</div>
@endsection
@section('js')

<script src="{{asset('external_library/select2/select2.min.js')}}"></script>
<script src="{{asset('admin/private_file/role/create.js')}}"></script>
@endsection