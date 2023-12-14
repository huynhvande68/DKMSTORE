@extends('layouts.center')
@section('contents')
@include('user_m.partial.banner',['p1' => 'About-us']);
<section id="about-top" class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="about_top_img">
                    <img src="assets/img/common/img-about.jpg" alt="img">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="about_top_left_content">
                    <h2>VỀ DKM STORE</h2>
                    <h4>Chúng tôi tin rằng mọi dự án tồn tại trong thế giới kỹ thuật số đều là kết quả của một ý tưởng và mọi ý tưởng đều có nguyên nhân.</h4>
                    <p>Vì lý do này, mỗi thiết kế của chúng tôi phục vụ một ý tưởng.
                        Sức mạnh của chúng tôi trong thiết kế được phản ánh qua tên của chúng tôi,
                        sự chăm chút của chúng tôi đến từng chi tiết. Chuyên gia của chúng tôi sẽ không ngại đi
                        thêm dặm chỉ để đạt đến mức gần như hoàn hảo. Chúng ta không yêu cầu mọi thứ phải hoàn hảo,
                        nhưng chúng ta cần chúng được chăm sóc một cách hoàn hảo nhất. </p>
                    <p>
                        Đó là lý do tại sao chúng tôi sẵn sàng đóng góp tốt nhất.
                        Không một chi tiết nào bị bỏ sót dưới con mắt chuyên nghiệp của Billey.
                        Mức độ cống hiến và nỗ lực tương đương với mức độ đam mê và quyết tâm.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Promo -->
<section id="service_promo_area" class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="service_promo_single_item">
                    <div class="service_prom_image">
                        <img src="assets/img/icon/icon_about1.jpg" alt="img">
                    </div>
                    <div class="service_prom_content">
                        <h3>Luôn luôn sáng tạo</h3>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="service_promo_single_item">
                    <div class="service_prom_image">
                        <img src="assets/img/icon/icon_about2.jpg" alt="img">
                    </div>
                    <div class="service_prom_content">
                        <h3>Tùy chỉnh nhanh chóng</h3>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="service_promo_single_item">
                    <div class="service_prom_image">
                        <img src="assets/img/icon/icon_about3.jpg" alt="img">
                    </div>
                    <div class="service_prom_content">
                        <h3>Tích hợp cao cấp</h3>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="service_promo_single_item">
                    <div class="service_prom_image">
                        <img src="assets/img/icon/icon_about4.jpg" alt="img">
                    </div>
                    <div class="service_prom_content">
                        <h3>Thay đổi thời gian thực</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Area -->
<section id="team_area" class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="center_heading">
                    <h2>Đội ngũ sáng tạo trang web </h2>
                    <p>Đây là các thành viên thuộc đội ngũ TDTU University </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team_slider owl-carousel owl-theme">
                    <div class="team-single">
                        <div class="team-img">
                            <!-- <img src="https://scontent.fhan5-6.fna.fbcdn.net/v/t39.30808-1/p320x320/252022477_934322463958078_657522906832302001_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=7206a8&_nc_ohc=8_w2Jtj35kMAX9OUdyw&_nc_ht=scontent.fhan5-6.fna&oh=46121064368b14f0f8e331bc93c42778&oe=61B470D8" alt="img"> -->
                        </div>
                        <div class="team-content">
                            <h4 class="team-name font--bold">Trần Hữu Khánh</h4>
                            <span class="team-title">BE</span>
                            <ul class="team-social pos-absolute">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-single">
                        <div class="team-img">
                            <!-- <img style="height:286px; object-fit:cover;" src="https://scontent.fhan5-9.fna.fbcdn.net/v/t39.30808-6/219180897_2982857665374482_6696718770216226670_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=2OWHLhVGskUAX-zCHsz&_nc_ht=scontent.fhan5-9.fna&oh=fc64574014b883c76d849909d74130a9&oe=61B480D1" alt="img"> -->
                        </div>
                        <div class="team-content">
                            <h4 class="team-name font--bold">Huỳnh Văn Đệ</h4>
                            <span class="team-title">BE</span>
                            <ul class="team-social pos-absolute">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>

@endsection