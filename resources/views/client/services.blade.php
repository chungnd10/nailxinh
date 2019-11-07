@extends('client.layouts.index')
@section('content')
    <!-- Start: Breadcrumb Area
    ============================= -->

    <section id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>NailXinh</h2>
                    <ul class="breadcrumb-nav list-inline">
                        <li><a href="index-2.html">NailXinh</a></li>
                        <li>Dịch vụ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- End: Breadcrumb Area
    ============================= -->

    
    <!-- Start: Our Service
    ============================= -->
    <section id="services" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12 text-center">
                    <div class="section-title">
                        <h2>DỊCH VỤ CỦA NAILXINH</h2>
                        <hr>
                        <p>Bạn có thể tham khảo những dịch vụ dưới đây để rõ hơn về NAILXINH</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#hair">Lông Mày</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#nail">Nail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#massage">Da</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#nail">Mi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="hair" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio01.png" alt="">
                                    <a href="#"><h4>Sơn móng tay <span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio02.png" alt="">
                                    <a href="#"><h4>Sơn móng tay<span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="nail" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio01.png" alt="">
                                    <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio05.png" alt="">
                                    <a href="#"><h4>Massage Relax<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio04.png" alt="">
                                    <a href="#"><h4>Massage Water<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="massage" class="tab-pane fade-in active">
                            <ul>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio01.png" alt="">
                                    <a href="#"><h4>Massage <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio05.png" alt="">
                                     <a href="#"><h4>Sơn móng tay <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio02.png" alt="">
                                     <a href="#"><h4>Sơn móng tay & Steam <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio06.png" alt="">
                                     <a href="#"><h4>Sơn móng tay <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio03.png" alt="">
                                     <a href="#"><h4>Sơn móng tay <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio07.png" alt="">
                                     <a href="#"><h4>Sơn móng tay <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio04.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio08.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="nail" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio07.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio01.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="waxing" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio08.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio04.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="facial" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio02.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="client_assets/img/portfolio/portfolio03.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End:  Our Service
    ============================= -->

     <!-- Start: Testimonial
    ============================= -->
    
    <section id="testimonial" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-carousel text-center">
                        <div class="single-testimonial">
                            <p>“Sản phẩm tốt, thái độ phục vụ chu đáo, đây là nơi mà tôi luôn tin tưởng suốt 
                                mấy năm qua. Chúng tôi sẽ tiếp tục ủng hộ trong thời gian tới.”</p>
                            <h5>Ngọc Trinh</h5>
                            <p class="title">Người mẫu</p>
                            <div class="testimonial-img">
                                <img src="/assets/img/testimonial/testimonial01.png" alt="">
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <p>“Sản phẩm tốt, thái độ phục vụ chu đáo, đây là nơi mà tôi luôn tin tưởng suốt 
                                mấy năm qua. Chúng tôi sẽ tiếp tục ủng hộ trong thời gian tới.”</p>
                            <h5>Ngọc Trinh</h5>
                            <p class="title">Người mẫu</p>
                            <div class="testimonial-img">
                                <img src="/assets/img/testimonial/testimonial02.png" alt="">
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <p>“Sản phẩm tốt, thái độ phục vụ chu đáo, đây là nơi mà tôi luôn tin tưởng suốt 
                                mấy năm qua. Chúng tôi sẽ tiếp tục ủng hộ trong thời gian tới.”</p>
                            <h5>Ngọc Trinh</h5>
                            <p class="title">Người mẫu</p>
                            <div class="testimonial-img">
                                <img src="/assets/img/testimonial/testimonial03.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Testimonial
    ============================= -->

     <!-- Start: Subscribe
    ============================= -->
    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 text-lg-left text-center mb-lg-0 mb-3">
                    <i class="ei ei-icon_phone"></i>
                    <h3>ĐĂNG KÍ ĐỂ NHẬN TIN TỨC VÀ THEO DÕI</h3>
                    <p>Nhập số điện thoại để cùng NAILXINH nhận thông tin khi có khuyến mãi</p>
                </div>
                <div class="col-lg-5 col-md-12 text-center">
                    <form id="subscribe-form" action="#" method="POST">
                        <input type="email" name="email" id="subscribe-mail" placeholder="Số điện thoại" required>
                        <button>ĐĂNG KÝ</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Subscribe
    ============================= -->

@endsection
@section('script')
    {{-- example--}}
@endsection
