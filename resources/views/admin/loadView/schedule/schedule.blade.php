@extends('layouts.index')
@section('content')
<div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>
                                Lap lich gui email
                            </h3>
                        </div>
                        @include('components.alert')
                    </div>
                </div>
            </div>
            <form action="{{route('admin.schedule.create')}}" method="post" enctype="multipart/form-data">
                @csrf
<div class="row">
        <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary btn-block" href="javascript:void(0);">Ds email khach hang</a>
                            <input type="checkbox" class="select-all"/><span >Check all</span>
                            <ul class="list-unstyled mail_tabs">
                                @foreach($customer as $item)
                                <li class="active">
                                    <input type="checkbox" name="customer[]" value="{{$item->email}}"/><span style="padding: 10px;">{{$item->email}}</span>
                                </li>    
                                @endforeach                   
                            </ul>
                        </div>
                    </div>
                </div>
<div class="col-lg-8 col-sm-12 mt-mob-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mail_content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3 class="mail_head mb-3">Thiet lap</h3>
                                    </div>
                          
                                    <div class="mail_message col-lg-12">
                                      
                                          
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Tieu de</label>
                                                <input class="form-control" type="text" name="title" value="" id="example-text-input">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Thoi gian bat dau</label>
                                                <input class="form-control" name="daystart" type="datetime-local" value="" id="example-text-input">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Thoi gian ket thuc</label>
                                                <input class="form-control" name="dayend" type="datetime-local" value="" id="example-text-input">
                                            </div>
                                            <div class="form-group">  
                                            <label for="example-text-input" class="col-form-label">Noi dung</label>                                            
                                            <textarea name = "content"  class=" form-control editor " id="exampleFormControlTextarea1" rows="10"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary mb-3"><i class="ion-paper-airplane"></i> Send Message</button>
                                               
                                            </div>
                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>        
</div>
</form>

@endsection
@section('js')
<script src="{{asset('external_library/select2/tinymce.min.js')}}" ></script>
<script src="{{asset('admin/private_file/schedule/index.js')}}"></script>
@endsection