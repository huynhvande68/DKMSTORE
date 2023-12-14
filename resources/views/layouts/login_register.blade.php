
<!DOCTYPE html>
<html  lang="en">
<head>

    <!--=========================*
                Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=========================*
              Page Title
    *===========================-->
    <title>Trang Chủ</title>

    <!--=========================*
            Bootstrap Css
    *===========================-->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">

    <!--=========================*
              Custom CSS
    *===========================-->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <!--=========================*
               Owl CSS
    *===========================-->
    <link href="{{asset('admin/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">

    <!--=========================*
            Font Awesome
    *===========================-->
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--=========================*
              Modernizer
    *===========================-->
    <script src="{{asset('js/modernizr-2.8.3.min.js')}}"></script>

    <!--=========================*
               Metis Menu
    *===========================-->
    <link rel="stylesheet" href="{{asset('admin/css/metisMenu.css')}}">

    <!--=========================*
               Slick Menu
    *===========================-->
    <link rel="stylesheet" href="{{asset('admin/css/slicknav.min.css')}}">
    
    <!--=========================*
               Morris Css
    *===========================-->
    <link rel="stylesheet" href="{{asset('admin/vendors/charts/morris-bundle/morris.css')}}">

    <!--=========================*
            Google Fonts
    *===========================-->
        
    <!-- Font USE: 'Roboto', sans-serif;-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>


<div class="wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="login-bg">
                    <div class="login-overlay"></div>
                    <div class="login-left">
                        <img src="{{ asset('admin/images/favicon.png') }}" alt="Logo">
                        <p>Trang Quản Lí Shop Bán Hàng Online</p>
                        <a href="{{route('user.home')}}" class="btn btn-primary">Đi đến cửa hàng</a>
                    </div><!--login-left-->
                </div><!--login-bg-->
                <div class="login-form" >
            @yield('content')
                </div>  <!-- end login form -->
            </div><!--row-->
        </div><!--container-fluid-->
    </div><!--wrapper-->

<!-- Jquery Js -->
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<!-- Owl Carousel Js -->
<script src="{{asset('admin/js/owl.carousel.min.js')}}"></script>
<!-- Metis Menu Js -->
<script src="{{asset('admin/js/metisMenu.min.js')}}"></script>
<!-- SlimScroll Js -->
<script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
<!-- Slick Nav -->
<script src="{{asset('admin/js/jquery.slicknav.min.js')}}"></script>
<!-- ========== This Page js ========== -->
<!-- <script src="{{asset('admin/js/home.js')}}"></script> -->
<!-- Main Js -->
<script src="{{asset('admin/js/main.js')}}"></script>
<script>

</script>

</body>

<!-- Mirrored from rtsolutionz.com/vizzstudio/demo-falr/falr/dark-sidebar/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Aug 2021 06:16:13 GMT -->
</html>
