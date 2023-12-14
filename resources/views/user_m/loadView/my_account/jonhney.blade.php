<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from andit.co/projects/html/andshop/email-order-success.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 02:57:25 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title -->
    <title>Order Success - AndShop</title>
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

    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Open Sans', sans-serif;
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

        p {
            margin: 15px 0;
        }

        h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
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
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-detail,
        .order-detail th,
        .order-detail td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        .order-detail th {
            font-size: 16px;
            padding: 15px;
            text-align: center;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body style="margin: 20px auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0"
        style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <img src="{{asset('assets/img/common/delivery_success.png')}}" alt="" style="margin-bottom: 30px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="{{asset('assets/img/email/success.png')}}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2 class="title">thank you</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Đơn hàng của bạn đã được xác nhận - Hàng của bạn sẽ về trong vòng 3-6 ngày tới</p>
                                <p>Mã đơn :{{ $order->id }} </p>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <div style="border-top:1px solid #777;height:1px;margin-top: 30px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="{{asset('assets/img/email/order-success.png')}}" alt=""
                                    style="margin-top: 30px;">
                            </td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <h2 class="title">Đơn hàng chi tiết</h2>
                            </td>
                        </tr>
                    </table>
                    <table class="order-detail" style="width: 100%;" border="0" cellpadding="0" cellspacing="0" align="left">
                        <tr align="left">
                            <th>SẢN PHẨM</th>
                            <th style="padding-left: 15px;">MÔ TẢ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ </th>
                        </tr>
                        @foreach($order->order_order_detail as $item )
                        @php
                        $ma = $item->qr_code_id;
                        $sale = $item->order_coupon;
                        @endphp
                        <tr>
                            <td>
                                <img src="{{$item->product_relation->feature_image_path}}" alt="" width="70">
                            </td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="margin-top: 15px;">{{$item->name}}</h5>
                            </td>
                            <td valign="top" style="padding-left: 15px;">                        
                                <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>{{$item->quantity}}</span></h5>
                            </td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>{{number_format($item->price * $item->quantity)}} VND</b></h5>
                            </td>
                        </tr>
                       @endforeach
                        <tr>
                            <td colspan="2"
                                style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                                Sản phẩm:</td>
                            <td colspan="3" class="price"
                                style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;">
                                <b>{{number_format($order->total)}} VND</b></td>
                        </tr>
                        @if($ma !=0)
                        @if($sale->coupon_select == 1)                      
                        <tr>
                            <td colspan="2"
                                style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                                Mã giảm giá theo % :</td>
                            <td colspan="3" class="price"
                                style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;">
                                <b>- {{$sale->coupon_detail}}</b></td>
                        </tr>
                        @elseif($sale->coupon_select == 2)
                        <tr>
                            <td colspan="2"
                                style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                                Mã giảm giá theo tiền mặt :</td>
                            <td colspan="3" class="price"
                                style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;">
                                <b>- {{number_format($sale->coupon_detail)}} VND</b></td>
                        </tr>
                        @endif
                        @endif
                    
                        <tr>
                            <td colspan="2"
                                style="line-height: 49px;font-family: Arial;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                                Shipping: </td>
                            <td colspan="3" class="price"
                                style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;">
                                <b>{{number_format($order->shipping)}} VND</b></td>
                        </tr>                      
                        <tr>
                            <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000;
                                    padding-left: 20px;text-align:left;border-right: unset;">TỔNG CẦN THANH TOÁN :</td>
                            <td colspan="3" class="price"
                                style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;">
                            @if($order->total_discount==20000)
                            <b class="text-danger">{{number_format($order->total_discount )}} VND</b>
                            @else
                            <b class="text-danger">{{number_format($order->total_discount + $order->shipping)}} VND</b>
                            @endif   
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" border="0" align="left"
                        style="width: 100%;margin-top: 30px;    margin-bottom: 30px;">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                                    <h5
                                        style="font-size: 16px; font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
                                        ĐỊA CHỈ</h5>
                                    <p
                                        style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
                                        {{$wards->name_wards}},<br> {{$distric->name_district}} <br>{{$province->name_city}}</p>
                                </td>
                                <td width="57" height="25" class="user-info"><img
                                        src="{{asset('assets/img/email/space.jpg')}}" alt=" " height="25" width="57"></td>
                                <td class="user-info"
                                    style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                                    <h5
                                        style="font-size: 16px;font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
                                       ĐỊA CHỈ ĐẦY ĐỦ</h5>
                                    <p
                                        style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
                                       {{$order->address}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </td>
            </tr>
        </tbody>
    </table>
    <table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0"
        width="100%">
        <tr>
            <td style="padding: 30px;">
                <div>
                    <h4 class="title" style="margin:0;text-align: center;">Follow us</h4>
                </div>
                <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon" align="center"
                    class="text-center" style="margin-top:20px;">
                    <tr>
                        <td>
                            <a href="#"><img src="{{asset('assets/img/email/facebook.png')}}" alt=""></a>
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
                            <p style="font-size:13px; margin:0;">2022 Tôn Đức Thắng University</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('user.home')}}" style="font-size:13px; margin:0;text-decoration: underline;">Trở về shop</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>


<!-- Mirrored from andit.co/projects/html/andshop/email-order-success.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 02:57:28 GMT -->
</html>