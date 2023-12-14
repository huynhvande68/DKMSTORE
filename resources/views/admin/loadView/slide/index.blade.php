@extends('layouts.index')
@section('css')
<link rel="stylesheet" href="{{asset('external_library/dropzone/dropzone.min.css')}}">
  <style>
      .carousel-item{
          height:250px;
      }
      .carousel-item img {
          width: 100%;
      }
      .atention{
    font-size: 12px;
    color: #d62b2b;
}

      }
  </style>
@endsection


@section('content')

     <div class="main-content-inner">
        <div class="row">
             <div class="col-lg-6 stretched_card mt-mob-4">
                 <div class="card">
                        <div class="card-body">
                            <h4 class="card_title">Slider Demo</h4>
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{$path_id->path}}" alt="First slide">
                                    </div>  
                                @foreach($path as $path_item)
                                   <div class="carousel-item ">
                                        <img class="d-block w-100" src="{{$path_item->path}}" alt="First slide">
                                    </div>
                                   @endforeach
                                
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
             </div>
                <div class="col-md-6 ">
                           <div class="card">
                               <div class="card-body">
                               <h4 class="card_title">Vui lòng chọn ảnh</h4>
                               <p class="atention"> <b>Chú ý</b>(*): Ảnh đúng kính thước 1000x1000 để tránh tình trạng vỡ ảnh
                            , hình ảnh bên trái chỉ mang tính chất demo</p>
                                    <form method="post" action="{{route('admin.slide.store')}}" enctype="multipart/form-data" 
                                    class="dropzone" id="dropzone">                                        
                                             @csrf
                                    </form> 
                                    <a  data-pjax href ="{{route('admin.slide.show')}}" class="btn btn-success mt-4">Xuất</a>
                               </div>
                           </div>
                 </div>

         </div>
</div>
@endsection
@section('js')
<script src="{{asset('external_library/dropzone/dropzone.js')}}"></script> -->
<script src="{{asset('external_library/dropzone/dropzone_maintant.js')}}"></script> -->
@endsection