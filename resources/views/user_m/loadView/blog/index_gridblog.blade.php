@extends('layouts.center')
@section('contents')
@include('user_m.partial.banner',['p1' => 'Blog']);
<!-- Blog Area -->
@if(isset($check) && $check == false)
<section id="empty_cart_area" class="ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-12">
                    <div class="empaty_cart_area">
                        <img src="{{asset('assets/img/common/empty-cart.png')}}" alt="img">
                        <h2>Danh sách blog rỗng</h2>
                        <h3>Xin lỗi... Không có kết quả được tìm thấy!</h3>
                        <a href="{{route('viewmainblog')}}" class="btn btn-black-overlay btn_md">Trở lại trang Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
<section id="blog_grid_area_one" class="ptb-100">
        <div class="container">
            <div class="row">
               
                @foreach($blog as $blog_item)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="blog_one_item img-zoom-hover">
                            <div class="blog_one_img">
                                <a href="{{route('readblog',['id'=> $blog_item->id])}}">
                                    <img src="{{$blog_item->image_blog}}" alt="img">
                                </a>
                            </div>
                            <div class="blog_text">
                                <h5 class="date_area" style="display: inline-block;"><a href="{{route('readblog',['id'=> $blog_item->id])}}">{{ Carbon\Carbon::parse($blog_item->created_at)->format('M d Y')}}</a></h5>
                                <h5 class="date_area" style="float: right;font-size: 13px;color: #f79962;">Số người đã quan tâm ({{ $blog_item->care_product }})</h5>
                                <h4 class="heading"><a href="{{route('readblog',['id'=> $blog_item->id])}}">{{$blog_item->name_blog}}</a></h4>                                
                                <a href="{{route('readblog',['id'=> $blog_item->id])}}" class="button">Đọc ngay<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                 @endforeach
               
                <div class="col-lg-12">
                    <ul class="pagination">
                        
                        <li class="page-item">{{$blog->links()}}</li>
                      
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endif

@endsection