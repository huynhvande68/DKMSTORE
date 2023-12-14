@extends('layouts.center')
@section('contents')
@include('user_m.partial.banner',['p1' => 'Contact']);

<section id="contact_area" class="ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact_info">
                        <h3>Liên hệ với chúng tôi</h3>
                        <p>Nếu bạn cần trợ giúp, vui lòng truy cập Trung tâm trợ giúp của chúng tôi.
                             Ở đó, bạn sẽ tìm thấy câu trả lời cho nhiều câu hỏi thường gặp về việc tạo tài khoản,
                             mua hàng.
                            Nếu bạn không thể tìm thấy những điều mình đang tìm kiếm trong Trung tâm trợ giúp,
                            chúng tôi khuyên bạn nên truy cập Diễn đàn trợ giúp cộng đồng của chúng tôi. 
                            Bạn gặp phải lỗi? Hãy xem trang Các vấn đề hiện tại trên trang web của chúng tôi 
                            để xem danh sách các vấn đề đã biết mà chúng tôi đang cố gắng khắc phục.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="left_side_contact" style="margin:auto;">
                        <ul>
                            <li class="address_location">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>19, Nguyễn Hữu Thọ, Tân Phong, Quận 7, Hồ Chí Minh</p>
                            </li>
                            <li class="address_location">
                                <i class="fas fa-phone-volume"></i>
                                <div class="contact_widget">
                                    <a href="#!">+84 (833) 287-3077</a>
                                    <a href="#!">+84 (833) 528-8619</a>
                                </div>
                            </li>
                            <li class="address_location">
                                <i class="far fa-envelope"></i>
                                <div class="contact_widget">
                                    <a href="#">520H00070@student.tdtu.edu.vn</a>
                                    <a href="#">520H00070@student.tdtu.edu.vn</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>   
                <div class="col-lg-8">
                    <div class="contact_form_one">
                        <h3>Điền thông tin cần tư vấn</h3>
                        <form action="#!">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name*">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email*">
                                    </div>
                                </div>                               
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <textarea rows="7" class="form-control" name="message" placeholder="Message*"></textarea>
                                    </div>
                                    <div class="submit_bitton_contact_one">
                                        <button class="theme-btn-one btn-black-overlay btn_md">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>        
                <div class="col-lg-12">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=19%20nguyen%20huu%20tho&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://fmovies-online.net">fmovies</a><br>
                            <style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style>
                            <a href="https://www.embedgooglemap.net">google map responsive</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
                </div>
            </div>
        </div>
    </section>

@endsection