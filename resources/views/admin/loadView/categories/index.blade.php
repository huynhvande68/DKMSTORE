@extends('layouts.index')
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('content')

 <!--==================================*
               Main Content Section
    *====================================-->
    

        <!--==================================*
                   Main Section
        *====================================-->
        <div class="main-content-inner">
    
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card primary_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Đơn Hàng Tháng {{$month}}</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$status}}</h3>
                             
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card success_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Doanh Thu Tháng {{$month}}</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{number_format($all)}} D</h3>                               
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card warning_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Đơn Chưa Xác Thực</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$dem_no}}</h3>
                                <p style="color:white; margin:10px;">Đã hủy: {{$huy}}<p>
                            </div>
                         
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card info_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Đang Vận Chuyển</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$dem_month}}</h3>
                              
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
  
            <div class="row">
          <div class="col-lg-12">
            @csrf
            <div class="row">
            <div class="col-lg-3">
                <div  width="200" height="100" style="padding-top: 20px;"> 
                    <input class="form-control from"name ="from"  type="date" > 
                </div>               
            </div>
            <div class="col-lg-3">
                <div  width="200" height="100" style="padding-top: 20px;"> 
                    <input class="form-control to"name ="to"  type="date" > 
                </div>               
            </div> 
            <div class="col-lg-2">          
                <div  width="200" height="100" style="padding-top: 20px;"> 
                    <a href="" data-url="{{route('admin.statiscialday')}}" class="btn btn-info" id="loc">Loc</a href="">
                </div>   
            </div>        
                
                   
                
            </div>
           
          </div>
         <div class="col-lg-12">
         <div id="myfirstchart" style="height: 250px;"></div>
         </div>
        
         
         <div class="col-lg-6 col-md-12 mt-4 stretched_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                <div>
                                    <h4 class="card_title mb-0">Blog trong tuần</h4>
                                </div>
                             
                            </div>
                            <div class="card-body">
                                <div id="sales_country" style="height: 250px;"></div>
                                <div class="sales_country_labels mt-4">
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table cols-align-middle">
                                                <tbody>
                                                @foreach($blog as $item)
                                                <tr>
                                                    <td>{{$item->name_blog}}</td>
                                                    <td>{{$item->author->name}}</td>                                             
                                                    <td><span class="badge badge-danger">{{$item->care_product}} view</span></td>
                                                </tr>                                               
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-12 col-md-12 mt-4 stretched_card">
                    <div class="card">                        
                        <div class="card-body">                      
                            <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                <div>
                                    <h4 class="card_title mb-0">Nhân Viên</h4>                                 
                                </div>
                                <div>
                                   
                                </div>
                            </div>
                            <div class="table-responsive mt-10">
                                <table class="table table-hover table-center">
                                    <thead>
                                    <tr>
                                        <td class="w-70">Avatar</td>
                                        <td class="w-30p">Name</td>
                                        <td>Chức vụ</td>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-md">
                                                <img src="../assets/images/author/author-img1.jpg" alt="Image" class="img-responsive">
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="fw-600 ">Denis A. Short </div>
                                        </td>
                                        <td>547</td>
                                        <td>Thường Xuyên</td>
                                      
                                        <td>12-06-2022</td>
                                    </tr>
                            
                             
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        
            
        </div>
        <!--==================================*
                   End Main Section
        *====================================-->

@endsection
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    window.onload = function(){
        $.ajax({                         
           type: 'GET', 
           url :'/admin/onload',                 
           success: function (data){        
             if(data.code == 200){
                chart.setData(data.main)
             }
         
           }
        })
        $.ajax({                         
           type: 'GET', 
           url :'/admin/onload_dount',                 
           success: function (data){        
             if(data.code == 200){
                aer.setData(data.main)
               
             }
         
           }
        })
    }
</script>
<script src="{{asset('admin/private_file/statiscial/morris.js')}}"></script>
<script src="{{asset('admin/private_file/statiscial/index.js')}}"></script>

@endsection