 <!--=========================*
             Side Bar Menu
    *===========================-->
    <div class="sidebar_menu" >
        <div class="menu-inner">
            <div id="sidebar-menu">
                <!--=========================*
                           Main Menu
                *===========================-->
                <ul class="metismenu" id="sidebar_menu">
                    <li>
                        <a href="{{route('admin.home')}}">
                            <i class="fas fa-home"></i>
                            <span>Trang Chủ</span>
                        </a>
                    </li>
                    <li class="menu-title">Chức Năng</li>
                    <!-- order -->
                    @if($users->can('admin.order.morder'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                        <i class="fas fa-shopping-cart"></i>
                            <span>Quản Lí Đơn hàng</span>
                            <span class="float-right arrow"><i class="fas fa-chevron-circle-down"></i></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('admin.order.morder')}}"><i class="ion-ios-folder-outline"></i><span>Đơn chờ xác thực</span></a></li>
                            
                          
                        </ul>
                    </li>
                    @endif
                    <!--=========================*
                              Quản lí nhân viên
                    *===========================-->
                    @if($users->can('admin.index'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fas fa-users"></i>
                            <span>Quản Lí Nhân Viên</span>
                            <span class="float-right arrow"><i class="fas fa-chevron-circle-down"></i></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('admin.index')}}"><i class="ion-ios-folder-outline"></i><span>Danh sách nhân viên</span></a></li>
                          
                        </ul>
                    </li>
                    @endif
                    <!--=========================*
                              Quản lí đăng bài 
                    *===========================-->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fas fa-globe"></i>
                            <span> Các Hoạt Động Của Web</span>
                            <span class="float-right arrow"><i class="fas fa-chevron-circle-down"></i></span>
                        </a>
                        <ul class="submenu">
                            @if($users->can('admin.prepare.sendcoupon'))
                            <li><a href="{{route('admin.prepare.sendcoupon')}}"><span>Chăm sóc khách hàng</span></a></li>
                            @endif
                            @if($users->can('admin.coupon.show'))
                            <li><a id="load" href="{{route('admin.coupon.show')}}"><i class="ti-pencil-alt"></i><span>Mã giảm giá</span></a></li>
                            @endif
                            @if($users->can('admin.customer'))
                            <li><a  href="{{route('admin.customer')}}"><i class="ti-pencil-alt"></i><span>Tài khoản người dùng</span></a></li>
                            @endif
                            @if($users->can('admin.schedule.index'))
                            <li><a  href="{{route('admin.schedule.index')}}"><i class="far fa-calendar-alt"></i><span>Lên lịch </span></a></li>
                            @endif
                        </ul>
                    </li>
                 
                    <!--=========================*
                              Quản lí web hàng
                    *===========================-->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fas fa-briefcase"></i>
                            <span>Quản Lí web DKM Shop</span>
                            <span class="float-right arrow"><i class="fas fa-chevron-circle-down "></i></span>
                        </a>
                        <ul class="submenu">
                            @if($users->can('admin.category.show'))
                            <li><a id = "load" href="{{route('admin.category.show')}}"><span>Phần Danh Mục</span></a></li>
                            @endif
                            @if($users->can('admin.product.show'))
                            <li><a id = "load" href="{{route('admin.product.show')}}"><span>Phần Sản Phẩm</span></a></li>
                            @endif
                            @if($users->can('admin.slide.show'))
                            <li><a id = "load" href="{{route('admin.slide.show')}}"><span>Phần Slide</span></a></li>
                            @endif
                            @if($users->can('admin.blog'))
                            <li><a id = "load" href="{{route('admin.blog')}}"><span>Phần Blog</span></a></li>
                            @endif
                        </ul>
                    </li>
                    @if($users->can('admin.role.user'))
                    <li>
                        <a href="{{route('admin.role.user')}}" aria-expanded="true">
                        <i class="fas fa-users-cog"></i>
                            <span>Phân quyền</span>
                           
                        </a>                       
                    </li>
                    @endif
                    @if($users->can('admin.permission'))
                    <li>
                        <a href="{{route('admin.permission')}}" aria-expanded="true">
                        <i class="fas fa-user-plus"></i>
                            <span>Thêm các quyền</span>
                           
                        </a>                       
                    </li>
                    @endif
                <!--=========================*
                          End Main Menu
                *===========================-->
            </div>
        </div>
    </div>
    <!--=========================*
           End Side Bar Menu
    *===========================-->
