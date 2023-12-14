@extends('layouts.center')
@section('contents')
@include('user_m.partial.banner',['p1' => 'Chi tiết Blog']);
<section id="blog_single_area" class="ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog_single_content">
                        <div class="blog_single_img img-zoom-hover">
                            <img src="{{$blog->image_blog}}" alt="img">
                        </div>
                        <div class="blog_single_widget">
                            <div class="blog_single_date">
                                <ul>
                                    <li>{{ Carbon\Carbon::parse($blog->created_at)->format('M d Y')}}<a href="#!"> Tác giả: {{$blog->author->name}}</a> </li>
                                </ul>
                            </div>
                            <div class="blog_single_first_Widget">
                            <h2>{{$blog->name_blog}}</h2>
                              {!! $blog->content !!}
                            </div>


                            <div class="single_categoris_bottom">
                                <ul>
                                   @foreach($blog->blogs as $item)
                                   <li><a href="{{route('tagblog',['id' => $item->id])}}">{{$item->name}}</a></li>  
                                   @endforeach                                 
                                </ul>
                            </div>
                        </div>
                        <div class="related_blogs">
                            <div class="row">
                                @foreach($next_blog as $item)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="blog_one_item img-zoom-hover">
                                        <div class="blog_one_img">
                                            <a href="{{route('readblog',['id'=> $item->id])}}">
                                                <img src="{{$item->image_blog}}" alt="img">
                                            </a>
                                        </div>
                                        <div class="blog_text">
                                            <h5 class="date_area"><a href="{{route('readblog',['id'=> $item->id])}}">{{ Carbon\Carbon::parse($item->created_at)->format('M d Y')}}</a></h5>
                                            <h4 class="heading"><a href="{{route('readblog',['id'=> $item->id])}}">{{$item->name_blog}}</a></h4>                                           
                                            <a href="{{route('readblog',['id'=> $item->id])}}" class="button">Đọc ngay<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            </div>
                        </div>
            
                        
                        <div class="comment_replay_box">
                            <div class="content_title">
                                <h3>Write a comment</h3>
                            </div>
                            <form class="field_form">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <input name="name" class="form-control" placeholder="Your Name"
                                            required="required" type="text">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input name="email" class="form-control" placeholder="Your Email"
                                            required="required" type="email">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input name="website" class="form-control" placeholder="Your Website"
                                            required="required" type="text">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea rows="3" name="message" class="form-control"
                                            placeholder="Your Comment" required="required"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button value="Submit" name="submit"
                                            class="theme-btn-one btn_md btn-black-overlay" title="Submit Your Message!"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left-sidebar shop-sidebar-wrap">
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title mt-0">Search</h3>
                            <div class="search-widget">
                                <form action="{{route('searchblog')}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input class="form-control @error('param') is-invalid @enderror" name="param" placeholder="Search entire store here ..."
                                            type="text">                                            
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                        
                                    </div>
                                             @error('param')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                </form>
                            </div>
                        </div>
                      
                      
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget mt-40px">
                            <h3 class="sidebar-title">Bài Đăng Gần Đây</h3>
                            <div class="recent-post-widget">
                                @foreach( $recentely_blog as $item)
                                <div class="recent-single-post d-flex">
                                    <div style="width: 145px;" class="thumb-side img-zoom-hover">
                                        <a href="{{route('readblog',['id'=>$item->id]) }}"><img  src="{{ $item->image_blog  }}" alt="img" /></a>
                                    </div>
                                    <div class="media-side">
                                        <h5>
                                            <a href="{{route('readblog',['id'=>$item->id]) }}">{{ $item->name_blog  }}</a>
                                        </h5>
                                        <span class="date">{{ Carbon\Carbon::parse($item->created_at)->format('M d Y')}}</span>
                                    </div>
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget mt-40px">
                            <h3 class="sidebar-title">Tags</h3>

                            <div class="sidebar-widget-tag d-inline-block">
                                <ul>
                                    @foreach($tag as $itema)
                                    <li><a href="{{route('tagproduct',['id' => $itema->id])}}">{{$itema->name}}</a></li>   
                                    @endforeach                                
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <!-- Sidebar single item -->
                        <div class="follow-widget mt-40px">
                            <h3 class="sidebar-title">Follow Us</h3>
                            <div class="follwos_icons">
                                <ul>
                                    <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <!-- Sidebar single item -->
                        <div class="bio-widget mt-40px">
                            <h3 class="sidebar-title">About Blog</h3>
                            <div class="follwos_icons">
                                <a href="#!">
                                    <img src="{{asset('assets/img/common/nav_banner.png')}}" alt="img">
                                </a>
                                <p>Đây là các bài viết giới thiệu về sản phẩm đưa sản phẩm đến gần
                                    mọi khách hàng hơn .</p>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection