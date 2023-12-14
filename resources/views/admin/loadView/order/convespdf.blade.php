<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>PDF</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
     <!-- Fontawesome css -->
     <link rel="stylesheet" href="{{asset('assets/css/fontawesome.all.min.css')}}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{asset('assets/css/color.css')}}" />


</head>
 
<body>

      <section class="theme-invoice-1 ptb-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 m-auto">
              <div class="invoice-wrapper">
                <div class="invoice-header">
                  <div class="upper-icon">
                    <img src="{{asset('assets/img/invoice/invoice.svg')}}" class="img-fluid" alt="">
                  </div>
                  <div class="row header-content">
                    <div class="col-md-6">
                        <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="">
                        <div class="mt-md-4 mt-3">
                        <h4 class="mb-2">
                          DKMShop
                        </h4>
                        <h4 class="mb-0">DKMShop@gmail.com</h4>
                      </div>
                    </div>
                    <div class="col-md-6 text-md-right mt-md-0 mt-4">
                      <h2>Hóa đơn</h2>
                      <div class="mt-md-4 mt-3">
                        <h4 class="mb-2">
                        {{$wards->name_wards}} - {{$distric->name_district}} - {{$province->name_city}}
                        </h4>
                        <h4 class="mb-0">{{$order->address}}</h4>
                      </div>
                    </div>
                  </div>
                  <div class="detail-bottom">
                    <ul>
                      <li><span>Ngày giao :</span><h4>{{$order->created_at}} </h4></li>
                      <li><span>mã đơn hàng :</span><h4> {{$order->id}}</h4></li>
                      <li><span>Sdt :</span><h4>{{$info_cus[0]->mobiephone}}</h4></li>
                    </ul>
                  </div>
                </div>
                <div class="invoice-body table-responsive-md">
                  <table class="table table-borderless mb-0">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm </th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($order->order_order_detail as $item )
                    @php
                    $ma = $item->qr_code_id;
                    $sale = $item->order_coupon;
                    @endphp
                      <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{number_format($item->price)}}</td>
                        <td>{{$item->quantity}}</td>                                                    
                        <td>{{number_format($item->price * $item->quantity)}}</td>    
                      </tr>
                    @endforeach 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="2"></td>
                        <td class="font-bold text-dark" colspan="2">Tổng Cộng</td>
                        <td class="font-bold text-theme">{{number_format($order->total)}} VND</td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td class="font-bold text-dark" colspan="2">Ship</td>
                        <td class="font-bold text-theme">20.000 VND</td>
                      </tr>
                    @if($ma !=0)
                    @if($sale->coupon_select == 1)
                    <tr>
                        <td colspan="2"></td>
                        <td class="font-bold text-dark" colspan="2">Ma giam gia theo %</td>
                        <td class="font-bold text-theme">- {{$sale->coupon_detail}}</td>
                      </tr>
                    @elseif($sale->coupon_select == 2)
                    <tr>
                        <td colspan="2"></td>
                        <td class="font-bold text-dark" colspan="2">Ma giam gia theo tien mat</td>
                        <td class="font-bold text-theme">- {{number_format($sale->coupon_detail)}} VND</td>
                      </tr>
                    @endif
                    @endif
                      <tr>
                        <td colspan="2"></td>
                        <td class="font-bold text-dark" colspan="2">Cần thanh toán</td>
                        @if($order->total_discount == 20000 )
                        <td class="font-bold text-theme text-danger">{{number_format($order->shipping)}} VND</td>
                        @else
                        <td class="font-bold text-theme text-danger">{{number_format($order->total_discount + $order->shipping)}} VND</td>
                        @endif
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="invoice-footer text-right">
                  <div class="authorise-sign">
                    <img src="{{asset('assets/img/invoice/sign.png')}}" class="img-fluid" alt="sing">
                    <span class="line"></span>
                    <h6>Chữ kí chủ shop</h6>
                  </div>
                  <div class="buttons">
                    <a href="#" class="theme-btn-one btn-black-overlay btn_sm" onclick="window.print();">print</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   
    </body>


<!-- Mirrored from andit.co/projects/html/andshop/electronics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Aug 2021 02:57:20 GMT -->
</html>