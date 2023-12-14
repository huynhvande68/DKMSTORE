 <!--==================================*
               Header Section
 *====================================-->
<div class="header-area">

        <!--======================*
                   Logo
        *=========================-->
        <div class="header-area-left">
            <a href="{{route('admin.home')}}" class="logo">
                <span>
                    <img src="{{ asset('admin/images/favicon.png') }}" style="width: 60px;" alt="" height="12">
                </span>             
            </a>
        </div>
        <!--======================*
                  End Logo
        *=========================-->

        <div class="row align-items-center header_right">
            <!--==================================*
                     Navigation and Search
            *====================================-->
            <div class="col-md-6 d_none_sm d-flex align-items-center">
                <div class="nav-btn button-menu-mobile pull-left">
                    <button class="open-left waves-effect">
                      <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="search-box pull-left">
                    <form action="#">
                        <i class="ti-search"></i>
                        <input type="text" name="search" placeholder="Search..." required="">
                    </form>
                </div>
            </div>
            <!--==================================*
                     End Navigation and Search
            *====================================-->
            <!--==================================*
                     Notification Section
            *====================================-->
            <div class="col-md-6 col-sm-12">
                <ul class="notification-area pull-right">
                
                    <li class="dropdown">                    
                        <i class="fas fa-bell dropdown-toggle" data-toggle="dropdown"><span class="badge bg-danger rounded-pill">{{$head->count()}}</span></i>
                        <div class="dropdown-menu bell-notify-box notify-box">
                            <span class="notify-title">Thong bao</span>
                            <div class="nofity-list nofity-nf">    
                         
                            @foreach($head as $notification)
                          
                                <a href="{{route('admin.read.at',['id' => $notification->norder_id])}}" class="notify-item">
                                    <div class="notify-thumb"><img src="{{$notification->nimg}}" alt=""></div>
                                    <div class="notify-text">
                                        <h3>
                                        {{$notification->name_cus}}
                                        </h3>
                                        <p>Yêu cầu xác nhận đơn hàng  {{$notification->norder_id}}</p>

                                        <span>{{$notification->created_at->diffForHumans(Carbon\Carbon::now('Asia/Ho_Chi_Minh'))}}</span>
                                        <span class ="mark"></span>
                                    </div>
                                </a>
                               
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <i class="fas fa-envelope-open dropdown-toggle" data-toggle="dropdown"><span class="notification_dot"></span></i>
                        <div class="dropdown-menu notify-box nt-enveloper-box">
                            <span class="notify-title">You have 3 new Messages</span>
                            <div class="nofity-list">
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img  alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <h3>Jhon Doe</h3>
                                        <span class="msg">Hello are you there?</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img  alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <h3>David Boos</h3>
                                        <span class="msg">Waiting for your Response...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img  alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <h3>Jason Roy</h3>
                                        <span class="msg">Hi there, Hope you are well</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img  alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <h3>Malika Roy</h3>
                                        <span class="msg">Your Product Dispatched form Warehouse...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img  alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <h3>Raven Jhon</h3>
                                        <span class="msg">Please recieve your parcel from our store</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img  alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <h3>Angela Yo</h3>
                                        <span class="msg">You recieved a new message...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img  alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <h3>Rebecca Jhon</h3>
                                        <span class="msg">Hey I am waiting for you...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    
                    <li class="user-dropdown">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user" style="font-size:23px; color:#555555;"></i>
                            </button>
                            <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton" >
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="user_img mb-3">
                                        <img src="{{$author->avatar}}"  alt="User Image">
                                    </div>
                                    <div class="user_bio text-center">
                                        <p class="name font-weight-bold mb-0">{{$author->name}}</p>
                                        <p class="email text-muted mb-3"><a class="pl-3 pr-3" href="">{{$author->email}}</a></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="profile.html"><i class="fas fa-user"></i> Profile</a>
                                <span role="separator" class="divider"></span>
                                <a class="dropdown-item" href="{{route('user.logout')}}"><i class=" fas fa-sign-out-alt"></i>Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--==================================*
                     End Notification Section
            *====================================-->
        </div>

    </div>
    <!--==================================*
               End Header Section
    *====================================-->