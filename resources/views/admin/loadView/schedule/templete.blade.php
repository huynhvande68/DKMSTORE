

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from andit.co/projects/html/andshop/email-template-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 02:57:33 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title -->
    <title>Email Template - AndShop</title>


    
</head>

<body style="margin: 20px auto;">
    
    <table border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:30px;">
        <tbody>
            <tr align="center" class="add-with-banner">
                <td>
                    <h4 class="title" style="width: 100%; text-align:center;margin-top: 50px;">{{$titles}}</h4>
                   {!! $contents !!}

                   <p style="margin:0 ;font-size:14px;line-height: 22px;">Áp dụng từ ngày<br> <b>{{ $day_start }}</b> đến ngày <b>{{ $day_end}}</b></p>
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
                            <p style="font-size:13px; margin:0;">Tôn Đức Thắng University 2022</p>
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