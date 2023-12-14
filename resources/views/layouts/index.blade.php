
<!DOCTYPE html>
<html  lang="en">
<head>

    <!--=========================*
                Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  
    

    <!--=========================*
               Metis Menu
    *===========================-->
    <link rel="stylesheet" href="{{asset('admin/css/metisMenu.css')}}">

    <!--=========================*
               Slick Menu
    *===========================-->
    <link rel="stylesheet" href="{{asset('admin/css/slicknav.min.css')}}">

    
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
    @yield('css')

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->

<div id="page-container " >
    @include('admin.partial.head')

   @include('admin.partial.sideBar')
   <div class="main-content page-content" id="pjax-container" >
        <div class="main-content-inner" >

                 @yield('content')
        </div>
   </div>       
  @include('admin.partial.footer')

</div>
<!--=========================*
        End Page Container
*===========================-->

<!--=========================*
            Scripts
*===========================-->

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
<script src="{{asset('admin/js/jquery.pjax.js')}}"></script>
@yield('js')
<!-- ========== This Page js ========== -->

<!-- Main Js -->
<script src="{{asset('admin/js/main.js')}}"></script>
<script>

$(document).ready(function(){

// does current browser support PJAX
if ($.support.pjax) {
        $.pjax.defaults.timeout = 1000; // time in milliseconds
}
$(document).pjax('#load', '#pjax-container');
$(document).pjax('[data-pjax] a', '#pjax-container');
$(document).on('submit', '#form', function(event) {
  $.pjax.submit(event, '#pjax-container')
})
});
</script>

<script src="https://johnresig.com/files/pretty.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.0/echo.common.min.js"></script>
<script>
        $(document).ready(function(){
            
  const echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':3001'

  })
  echo.channel('send')
  .listen('Orderproduct' , (event)=>{
        
        let string =  $('.rounded-pill').text()
               let num  = parseInt(string)
               num = num+1;
               $('.rounded-pill').html(num)   

    $('.nofity-nf').prepend(
   
    `    <a href='http://127.0.0.1:8000/read-at/`+event['trans']['norder_id']+`' class='notify-item'>
                <div class='notify-thumb'><img src='`+event['trans']['nimg']+`' alt=''></div>
                <div class="notify-text">
                <h3>
                `+event['trans']['name_cus']+`
                </h3>
                <p>Yêu cầu xác nhận đơn hàng `+event['trans']['norder_id']+` </p>

                <span>`+prettyDate(event['trans']['created_at'])+`</span>
                <span class ="mark"></span>
                </div>
           </a>`
    )
  })
})
</script>

</body>

<!-- Mirrored from rtsolutionz.com/vizzstudio/demo-falr/falr/dark-sidebar/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Aug 2021 06:16:13 GMT -->
</html>
