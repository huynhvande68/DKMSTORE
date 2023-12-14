<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from andit.co/projects/html/andshop/email-template-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 02:57:33 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title -->
    <title>Email Template - AndShop</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png" />
    <link rel="manifest" href="assets/img/favicon/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Lato', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        h5 {
            margin: 10px;
            color: #777;
        }

        .text-center {
            text-align: center
        }

        .main-bg-light {
            background-color: #fafafa;
        }

        .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 0px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        .menu {
            width: 100%;
        }

        .menu li a {
            text-transform: capitalize;
            color: #444;
            font-size: 16px;
            margin-right: 15px
        }

        .main-logo {
            width: 180px;
            padding: 10px 20px;
            margin-bottom: -5px;
        }

        .product-box .product {
            text-align: center;
            position: relative;
        }

        .product-info {
            margin-top: 15px;
        }

        .product-info h6 {
            line-height: 1;
            margin-bottom: 0;
            padding-bottom: 5px;
            font-size: 14px;
            font-family: "Open Sans", sans-serif;
            color: #777;
            margin-top: 0;
        }

        .product-info h4 {
            font-size: 16px;
            color: #444;
            font-weight: 700;
            margin-bottom: 0;
            margin-top: 5px;
            padding-bottom: 5px;
            line-height: 1;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body style="margin: 20px auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0"
        style="background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr class="header">
                            <td align="left" valign="top">
                                <img src="{{asset('assets/img/logo.png')}}" class="main-logo">
                            </td>
                            <td class="menu" align="right">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Danh Sach</a></li>
                                    <li><a href="#">page</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                    <table class="slider" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <th align="center" width="40%"><img src="{{asset('assets/img/email/header.jpg')}}" alt=""
                                    style="margin-bottom: -5px;">
                            </th>
                </td>
            </tr>
    </table>
    
    <table border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:30px;">
        <tbody>
            <tr align="center" class="add-with-banner">
                <td>
                    <h4 class="title" style="width: 100%; text-align:center;margin-top: 50px;">Ưu đãi cực sốc</h4>
                    <p style="margin:0">DKM Shop xin gửi tặng bạn mã giảm giá theo 
                    @if($coupon->coupon_select == 2)
                    tiền mặt trị giá <b>{{ number_format($coupon->coupon_detail) }}</b> vnđ
                    @elseif($coupon->coupon_select == 1)
                    phần trăm trị giá <b> {{$coupon->coupon_detail}} %(phần trăm)</b>
                    @endif
                    </p>
                    <h4 style="width: 100%; font-size:30px; text-align:center;margin-top: 50px;">{{$coupon->coupon_code}}</h4>
                </td>
                

            </tr>
            <tr align="center" class="add-with-banner">
                <td>
                    
           
                  <p style="margin:0 ;font-size:14px;line-height: 22px;">Áp dụng từ ngày<br> <b>{{ $coupon->day_start }}</b> đến ngày <b>{{ $coupon->day_end}}</b> <br> cho tất cả các sản phẩm</p>
             
                   
                </td>
                

            </tr>

        </tbody>
    </table>
    <table class="main-bg-light text-center" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="margin-top:30px;">
        <tr>
            <td style="padding: 30px;">
                <div>
                    <h4 class="title" style="margin:0">Follow us</h4>
                </div>
                <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon" align="center"
                    class="text-center" style="margin-top:20px;">
                    <tr>
                        <td>
                            <a href="https://www.facebook.com/NQK.A3LT1/"><img src="{{asset('assets/img/email/facebook.png')}}" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="{{asset('assets/img/email/youtube.png')}}" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="{{asset('assets/img/email/twitter.png')}}" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="{{asset('assets/img/email/gplus.png')}}" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="{{asset('assets/img/email/linkedin.png')}}" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="{{asset('assets/img/email/pinterest.png')}}" alt=""></a>
                        </td>
                    </tr>
                </table>
                <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
                  
                    <tr>
                        <td>
                            <p style="font-size:13px; margin:0;">2021 Copy Right by Khanh Nguyen Quoc</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#" style="font-size:13px; margin:0;text-decoration: underline;">20se3</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    </td>
    </tr>
    </tbody>
    </table>
</body>

<!-- Mirrored from andit.co/projects/html/andshop/email-template-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 02:57:34 GMT -->
</html>