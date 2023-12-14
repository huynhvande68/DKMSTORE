<div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-toggle="tab" class="dasboard active"><i
                                        class="fas fa-tachometer-alt"></i>Trang chủ 
                                        @if(!isset($information_customer->email) ||!isset($information_customer->sex) ||!isset($information_customer->mobiephone)  )
                                        <span class="notif">1</span>
                                        @endif
                                    </a></li>
                            <li> <a href="#orders" data-toggle="tab" class="orders-ok"><i
                                        class=" fas fa-cart-arrow-down"></i>Các sản phẩm đã đặt</a></li>        
                            <li><a href="#account-details" data-toggle="tab" class=""><i class="fas fa-user"></i>Thông tin khách hàng </a>
                            </li>
                            <li><a href="login.html" class=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade dasabc show active" id="dashboard">
                            <div class="myaccount-content">
                                <h4 class="title">Trang chủ </h4>
                                <p>Trang chủ là nơi sẽ thông báo về tình trạng đơn hàng giúp quý khách kiểm soát sản phẩm tốt hơn  </p>
                                <br>
                                @if(!isset($information_customer->email) ||!isset($information_customer->sex) ||!isset($information_customer->mobiephone)  )
                                <div class="alert alert-danger">Vui lòng cập nhật đầy đủ thông tin ở (Thông tin khách hàng)</div>
                                @endif
                                @include('components.alert')
                            </div>
                        </div>
                        <div class="tab-pane fade orderabc" id="orders">
                            <div class="myaccount-content">
                                <h4 class="title">Orders </h4>                              
                                <div class="table_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Ngày đặt</th>
                                                <th>Tình trạng</th>
                                                <th>Tổng </th>
                                                <th>Xem </th>
                                                <th>Hủy đơn </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!isset($show_err))
                                           @foreach($transs as $item)
                                           <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->created_at->format('M d Y')}}</td>
                                                @if($item->status == 0)
                                                <td><span class="success text-warning">Đang chờ </span></td>
                                                @elseif($item->status ==1)
                                                <td><span class="success text-success">Đã xác nhận</span></td>
                                                @elseif($item->status ==2)
                                                <td><span class="success text-danger">Đã hủy </span></td>
                                                @endif

                                                @if($item->tranor->total_discount == 20000)
                                                <td>{{number_format($item->tranor->total_discount)}} VND</td>
                                                @else
                                                <td>{{number_format($item->tranor->total_discount+$item->tranor->shipping)}} VND</td>
                                                @endif                                               
                                                @if($item->status == 0)
                                                <td><a href="{{route('detail_order',['id' => $item->orders_id])}}" class="view">view</a></td>
                                                <td><a href="" data-url="{{route('err_order',['id' => $item->id])}}" class="huy"><i class="fas fa-times"></i></a></td>
                                                @elseif($item->status ==1)
                                                <td><a href="{{route('detail_order',['id' => $item->orders_id])}}" class="view">view</a></td>
                                                @elseif($item->status ==2)
                                                
                                                @endif
                                                
                                            </tr>
                                           @endforeach
                                           @else
                                           @endif
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                       
                        <div class="tab-pane fade" id="account-details">
                            <div class="myaccount-content">
                                <h4 class="title">Thông tin khách hàng</h4>
                                <div class="login_form_container">
                                    <div class="account_details_form">
                                        <form action="#">
                                           @if(!isset($information_customer->image))
                                           <div class="img_profiles">
                                                <img src="{{asset('assets/img/team/team1.png')}}" alt="img">
                                            </div>
                                           @else
                                           <div class="img_profiles">
                                                <img src="{{$information_customer->image}}" alt="img">
                                            </div>
                                           @endif
                                            <div class="input-radio">
                                                <span class="custom-radio">
                                                    @if(!isset($information_customer->sex))
                                                        <input type="radio" value="" name="mr" disabled = "true"> Mr.</span>
                                                        <input type="radio" value="" name="mrs" disabled = "true" > Mrs.</span>
                                                    @elseif($information_customer->sex == 'mr')
                                                    <input type="radio" value="mr" name="mr" checked> Mr.</span>
                                                    @elseif($information_customer->sex == 'mrs')
                                                    <input type="radio" value="mrs" name="mrs" checked> Mrs.</span>
                                                    @endif
                                                   
                                            </div>                                         
                                            <div class="default-form-box mb-20">
                                                <label>Tên đăng nhập</label>
                                                <input type="text" name="email-name" value="{{$information_customer->name}}"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Email</label>
                                                <input type="text" name="email-name" value="{{$information_customer->email}}"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Password</label>
                                                <input type="password" name="user-password" value="{{$information_customer->password}}"
                                                    class="form-control" readonly>
                                            </div>      
                                            <div class="default-form-box mb-20">
                                                <label>Số điện thoại</label>                                                                                     
                                                <input type="text" name="numberphone" value="{{$information_customer->mobiephone}}"
                                                    class="form-control" readonly>
                                            </div>                                     
                                         
                                            <br>
                                            <label class="checkbox-default checkbox-default-more-text" for="newsletter">
                                               
                                                <span>Khi bạn đến với shop chúng tôi<br><em>mọi thông tin giao dịch , tài khoản cá nhân sẽ được bảo mật ở mức độ cao.</em></span>
                                            </label>
                                            <div class="save_button mt-3">
                                                <a href="{{route('edit_my_account')}}"
                                                    class="theme-btn-one bg-black btn_sm">Cập nhật</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>