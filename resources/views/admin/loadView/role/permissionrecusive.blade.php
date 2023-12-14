<div class="col-lg-12 stretched_card mt-4">    
 <div class="card ">
    <div class="card-body">
                        @include('components.alert')
                                                   
                            <div class="single-table">
                                <div class="table-responsive">                                   
                              <form action="{{route('admin.add.permission')}}" method="POST">
                                  @csrf
                              <label  class=" pl-2 "  style=" font-size: 14px;">Tạo quyền</label>
                                <input class="form-control form-control-lg  mb-3" type="text" name="name_permission"  placeholder="Nhập tên tiêu đề">    
                                <button type = "submit" class="btn btn-success"> Tạo quyền</button> 
                              </form>     
                                                               
                            <form method="POST" action="{{route('admin.adds.permission')}}">
                                @csrf
                            <div class="form-group">
                             <table class="table text-center">
                                        <thead class="text-uppercase bg-dark">
                                        <tr class="text-white">
                                            <th scope="col"><input type="checkbox" class="select-all"/></th>
                                            <th scope="col">Tên chức vụ</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @foreach($route as $item)
                                        <tr>
                                            <td scope="row" id="checkboxes"><input 
                                            type="checkbox"
                                            {{ $permi->contains('name',$item) ? 'checked' : '' }}                                            
                                            
                                            name="permission[]" value="{{$item}}" /></td>                            
                                            <td class="font-weight-bold">{{$item}}</td>                                            
                                        </tr>
                                        @endforeach                               
                                        </tbody>
                                    </table>
                                    <button type = "submit" class="btn btn-success"> Tạo quyền</button> 
                            </div>
                            </form>
                                
                                </div>
                            </div>
                        </div>
                        </div>
                </div>