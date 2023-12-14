<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from andit.co/projects/html/andshop/electronics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 02:57:15 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Electronics - AndShop</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!-- jquery css -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.all.min.css')}}" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
    <!-- animate css -->
    <link href="{{asset('assets/css/animate.min.css')}}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <!-- Left-bar css -->
    <link rel="stylesheet" href="{{asset('user_m/center2/leftbar.css')}}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{asset('assets/css/color.css')}}" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/img/favicon/apple-icon-57x57.png')}}" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/img/favicon/apple-icon-60x60.png')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicon/apple-icon-72x72.png')}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/favicon/apple-icon-76x76.png')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicon/apple-icon-114x114.png')}}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/img/favicon/apple-icon-120x120.png')}}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/img/favicon/apple-icon-144x144.png')}}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicon/apple-icon-152x152.png')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicon/apple-icon-180x180.png')}}" />
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/img/favicon/android-icon-192x192.png')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon/favicon-32x32.png')}}" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon/favicon-96x96.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicon/favicon-16x16.png')}}" />
    <link rel="manifest" href="{{asset('assets/img/favicon/manifest.json')}}" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="{{asset('assets/img/favicon/ms-icon-144x144.png')}}" />
    <meta name="theme-color" content="#ffffff" />

</head>
 
<body>
    @include('user_m.partial.sidebar')
   <!-- Banner Area -->
   @include('user_m.partial.banner',['p1' =>'Shop'])
<!-- Shop Main Area -->
    <section id="shop_main_area" class="ptb-100">
            <div class="container">
                <div class="row">
                @include('user_m.partial.left_sidebar')   
                    <div class="col-lg-9">
                        <div class="row " id="pjax-container">
                             @yield('content')                     
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @include('user_m.partial.footer')
    @include('user_m.partial.modals')
    
    
    <!-- Modal Area End-->
    <!-- Jquery -->
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- owl carousel js -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- pagination js -->
    <script src="{{asset('assets/js/pagination-bootpage.js')}}"></script>
    <script src="{{asset('assets/js/pagination.js')}}"></script>
    <!-- Menu js -->
    <script src="{{asset('assets/js/menu.js')}}"></script>
    <!-- Count js -->
    <script src="{{asset('assets/js/count.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <!-- Left-bar js -->
    <script src ="{{asset('user_m/center2/leftbar.js')}}"></script>
    <!-- Cart js -->
    <script src ="{{asset('user_m/cart/viewcart.js')}}"></script>
    <script src ="{{asset('user_m/cart/viewcart2.js')}}"></script>

   
    </body>


<!-- Mirrored from andit.co/projects/html/andshop/electronics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 02:57:20 GMT -->
</html>