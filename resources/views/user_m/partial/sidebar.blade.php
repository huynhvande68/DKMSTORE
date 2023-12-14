 <!-- Preloader Area -->
 <div id="preloader">
     <div id="status">
         <img src="{{asset('assets/img/loader.gif')}}" alt="img" />
     </div>
 </div>
 <!-- Start Header Area -->
 <header class="header-section d-none d-xl-block">
     <div class="header-wrapper">
         <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
             <div class="container">
                 <div class="row">
                     <div class="col-12 d-flex align-items-center justify-content-between">
                         <!-- Start Header Logo -->
                         <div class="header-logo">
                             <div class="logo">
                                 <a href="{{route('user.home')}}"><img src="{{asset('assets/img/logo.png')}}" alt="logo" /></a>
                             </div>
                         </div>
                         <!-- End Header Logo -->

                         <!-- Start Header Main Menu -->
                         <div class="main-menu menu-color--black menu-hover-color--golden">
                             <nav>
                                 <ul>
                                     <li>
                                         <a href="{{route('user.home')}}" class="active main-menu-link">Home</a>
                                         <ul class="sub-menu">
                                             <li><a href="{{route('user.home2')}}">Shop</a></li>
                                         </ul>
                                     </li>

                                     @foreach($slidebar as $slidebar_item)
                                     <li class="has-dropdown">
                                         <a href="{{route('user.part_sidebar',['param' => $slidebar_item->id])}}">{{$slidebar_item->nameCategory}} <i class="fa fa-angle-down"></i></a>
                                         @if($slidebar_item->category_rev->count())
                                         <ul class="sub-menu">
                                             @foreach($slidebar_item->category_rev as $item_rev)
                                             <li>
                                                 <a href="{{route('user.part_sidebar',['param' => $item_rev->id])}}">{{$item_rev->nameCategory}}</a>
                                             </li>

                                             @endforeach

                                         </ul>
                                         @endif

                                     </li>
                                     @endforeach

                                     <li class="has-dropdown">
                                         <a href="{{route('viewmainblog')}}">Blog </a>
                                         <!-- Sub Menu -->

                                     </li>
                                     <li class="has-dropdown">
                                         <a href="#">Contact <i class="fa fa-angle-down"></i></a>
                                         <!-- Sub Menu -->
                                         <ul class="sub-menu">
                                             <li><a href="{{route('aboutus')}}">About Us</a></li>
                                             <li><a href="{{route('contactme')}}">Contact me</a></li>

                                         </ul>
                                     </li>

                                 </ul>
                             </nav>
                         </div>
                         <!-- End Header Main Menu Start -->

                         <!-- Start Header Action Link -->
                         <ul class="header-action-link action-color--black action-hover-color--golden">
                             <li>
                                 <a href="{{route('my_account')}}" class="">
                                     <i class="fas fa-user-circle"></i>

                                 </a>
                             </li>
                             <li>
                                 @php
                                 $sum = 0;
                                 $ses = session()->get('cart');
                                 if(isset($ses)){
                                 foreach($ses as $item)
                                 {
                                 $sum+=$item['quantity'];
                                 }
                                 }
                                 @endphp
                                 <a href="{{route('cart.viewcart_product')}}" class="">
                                     <i class="fas fa-shopping-bag"></i>
                                     <span class="item-count">{{$sum}}</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#search" class="search_width">
                                     <img src="{{asset('assets/img/svg/search.svg')}}" alt="img" />
                                 </a>
                             </li>
                             <li>
                                 <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                     <i class="fas fa-bars"></i>
                                 </a>
                             </li>
                         </ul>
                         <!-- End Header Action Link -->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- Start Header Area -->

 <!-- Start Mobile Header -->
 <div class="mobile-header sticky-header sticky-color--golden mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
     <div class="container">
         <div class="row">
             <div class="col-12 d-flex align-items-center justify-content-between">
                 <!-- Start Mobile Left Side -->
                 <div class="mobile-header-left">
                     <ul class="mobile-menu-logo">
                         <li>
                             <a href="index-2.html">
                                 <div class="logo">
                                     <img src="{{asset('assets/img/logo.png')}}" alt="logo" />
                                 </div>
                             </a>
                         </li>
                     </ul>
                 </div>
                 <!-- End Mobile Left Side -->

                 <!-- Start Mobile Right Side -->
                 <div class="mobile-right-side">
                     <ul class="header-action-link action-color--black action-hover-color--golden">
                         <li>
                             <a href="#search" class="search_width">
                                 <img src="{{asset('assets/img/svg/search.svg')}}" alt="img" />
                             </a>
                         </li>
                         <li>
                             <a href="" class="offcanvas-toggle">
                                 <i class="far fa-heart"></i>
                                 <span class="item-count">3</span>
                             </a>
                         </li>
                         <li>
                             <a href="{{route('cart.viewcart_product')}}" class="">
                                 <i class="fas fa-shopping-bag"></i>
                                 <span class="item-count">4</span>
                             </a>
                         </li>
                         <li>
                             <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                 <i class="fas fa-bars"></i>
                             </a>
                         </li>
                     </ul>
                 </div>
                 <!-- End Mobile Right Side -->
             </div>
         </div>
     </div>
 </div>
 <!-- End Mobile Header -->

 <!--  Start Offcanvas Mobile Menu Section -->
 <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
     <!-- Start Offcanvas Header -->
     <div class="offcanvas-header text-right">
         <button class="offcanvas-close">
             <img src="{{asset('assets/img/svg/cancel.svg')}}" alt="icon" />
         </button>
     </div>
     <!-- End Offcanvas Header -->
     <!-- Start Offcanvas Mobile Menu Wrapper -->
     <div class="offcanvas-mobile-menu-wrapper">
         <!-- Start Mobile Menu  -->
         <div class="mobile-menu-bottom">
             <!-- Start Mobile Menu Nav -->
             <div class="offcanvas-menu">
                 <ul>
                     <li>
                         <a href="#" class="active"><span>Home</span></a>
                     </li>
                     @foreach($slidebar as $item_b)
                     <li>
                         <a href="#"><span>{{$item_b->nameCategory}}</span></a>
                         @if($item_b->category_rev->count())
                         <ul class="mobile-sub-menu">
                             <li>
                                 <a href="#">Cua Hang</a>
                                 @foreach($item_b->category_rev as $item_sa)
                                 <ul class="mobile-sub-menu">
                                     <li><a href="">{{ $item_sa->nameCategory}}</a></li>
                                 </ul>
                                 @endforeach
                             </li>
                         </ul>
                         @endif
                     </li>
                     @endforeach

                     <li>
                         <a href="{{route('viewmainblog')}}"><span>Blogs</span></a>

                     </li>
                     <li>
                         <a href="#"><span>Pages</span></a>
                         <ul class="mobile-sub-menu">
                             <li><a href="about-us.html">About Us</a></li>
                             <li><a href="vendor.html">Vendor</a></li>
                             <li><a href="my-account.html">My Account</a></li>
                             <li><a href="contact-us.html">Contact Us One</a></li>
                             <li><a href="contact-us-2.html">Contact Us Two</a></li>
                             <li><a href="coming-Soon.html">Coming Soon</a></li>
                             <li><a href="faq.html">Frequently Questions</a></li>
                             <li><a href="privacy-policy.html">Privacy Policy</a></li>
                             <li><a href="404.html">404 Page</a></li>
                             <li><a href="login.html">Login</a></li>
                         </ul>
                     </li>
                 </ul>
             </div>
             <!-- End Mobile Menu Nav -->
         </div>
         <!-- End Mobile Menu -->

         <!-- Start Mobile contact Info -->
         <div class="mobile-contact-info">
             <div class="logo">
                 <a href="index-2.html"><img src="{{asset('assets/img/logo-white.png')}}" alt="img" /></a>
             </div>

             <address class="address">
                 <span>Address: 26 Nguyen Tao.</span>
                 <span>Call Us: 0123456789, 0123456789</span>
                 <span>Email: nqkhanh.20it9@vku.udn.vn</span>
             </address>

             <ul class="social-link">
                 <li>
                     <a href="#"><i class="fab fa-facebook"></i></a>
                 </li>
                 <li>
                     <a href="#"><i class="fab fa-twitter"></i></a>
                 </li>
                 <li>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                 </li>
                 <li>
                     <a href="#"><i class="fab fa-linkedin"></i></a>
                 </li>
             </ul>

             <ul class="user-link">
                 <li><a href="wishlist.html">Wishlist</a></li>
                 <li><a href="cart.html">Cart</a></li>
                 <li><a href="checkout.html">Checkout</a></li>
             </ul>
         </div>
         <!-- End Mobile contact Info -->
     </div>
     <!-- End Offcanvas Mobile Menu Wrapper -->
 </div>
 <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

 <!-- Start OffcanvasSect Mobile Menu ion -->
 <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
     <!-- Start Offcanvas Header -->
     <div class="offcanvas-header text-right">
         <button class="offcanvas-close">
             <img src="{{asset('assets/img/svg/cancel.svg')}}" alt="icon" />
         </button>
     </div>
     <!-- End Offcanvas Header -->
     <!-- Start Offcanvas Mobile Menu Wrapper -->
     <!-- Start Mobile contact Info -->
     <div class="mobile-contact-info">
         <address class="address">
             <img src="{{asset('assets/img/logo-white.png')}}" alt="logo" />
             <span>Address: 19 Nguyễn Hữu Thọ.</span>
             <span>Call Us: 0123456789, 0123456789</span>
             <span>Email: 520H0070@student.tdtu.edu.vn</span>
         </address>

         <ul class="social-link">
             <li>
                 <a href="https://www.facebook.com/chikhanh2002/"><i class="fab fa-facebook-f"></i></a>
             </li>
             <li>
                 <a href="https://www.instagram.com/dede.9822"><i class="fab fa-instagram"></i></a>
             </li>
             <li>
                 <a href="#"><i class="fab fa-linkedin"></i></a>
             </li>
         </ul>

     </div>
     <!-- End Mobile contact Info -->
 </div>
 <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->



 <!-- Start Offcanvas Search Bar Section -->
 <div id="search" class="search-modal">
     <button type="button" class="close">
         <img src="{{asset('assets/img/svg/cancel.svg')}}" alt="icon" />
     </button>
     <form action="{{route('user.search_sidebar')}}" method="POST">
         @csrf
         <input type="search" name="search" placeholder="nhập từ khóa cần tìm" />
         <button type="submit" class="btn btn-lg btn-golden">Tìm kiếm</button>
     </form>
 </div>
 <!-- End Offcanvas Search Bar Section -->