<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Hantus, Responsive, SPA Template, Bootstrap 4,">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />
    <title>NAILXINH - Spa and Beauty</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start: Preloader
    ============================= -->

    <div class="preloader">        
        <div class="wrapper">
            <div class="circle circle-1"></div>
            <div class="circle circle-1a"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>
        <h1>Loading&hellip;</h1>
    </div>

    <!-- End: Preloader
    ============================= -->

    <!-- Start: Header Top
    ============================= -->
    <section id="header-top">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-6 col-md-6 text-center text-md-left">
                    <p><i class="fas fa-clock"></i>Giờ mở cửa: 7h30 - 20h30</p>
                </div>
                <div class="col-lg-6 col-md-6 text-center text-md-right header-top-right">
                    <ul>
                        <li><a href="#"><i class="fas fa-envelope"></i>nailxinh@gmail.com</a></li>
                        <li><a href="#"><i class="fas fa-phone"></i>0965 695 055</a></li>
                    </ul>       
                </div>
            </div>
        </div>
    </section>
    <!-- End: Header Top
    ============================= -->

    <!-- Start: Navigation
    ============================= -->
    <section class="navbar-wrapper">
        <div class="navbar-area sticky-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-6">
                        <div class="logo main">
                            <a href="index-2.html"><img class="responsive" src="assets/img/logo.png" alt="Startkit"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 d-none d-lg-block text-right">
                        <nav class="main-menu">
                            <ul>
                                <li class="active">
                                    <a href="#">TRANG CHỦ</a>
                                </li>
                                <li>
                                    <a href="services.html">GIỚI THIỆU</a>
                                </li>
                                <li>
                                    <a href="services.html">DỊCH VỤ</a>
                                </li>
                                <li>
                                    <a href="services.html">THƯ VIỆN ẢNH</a>
                                </li>
                                <li>
                                    <a href="services.html">LIÊN HỆ</a>
                                </li>
                                <li>
                                    <a href="services.html">ĐẶT LỊCH</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-6 text-right">
                        <ul class="mbl d-lg-none">
                            <li class="search-button">
                                <div class="sb-search">
                                    <form>
                                        <input class="sb-search-input" onkeyup="buttonUp();" placeholder="Search"  type="search" value="" name="search">
                                        <input class="sb-search-submit" type="submit"  value="">
                                        <span class="sb-icon-search"><i class="ei ei-search"></i></span>
                                    </form>
                                </div>
                            </li>
                            <li class="cart-icon">
                                <div class="cart-icon-wrapper cart--open">
                                    <i class="ei ei-icon_bag_alt"></i>
                                    <span class="cart-count">2</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Start Mobile Menu -->
            <div class="mobile-menu-area d-lg-none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav class="mobile-menu-active">
                                    <ul>
                                        <li class="active">
                                            <a href="index-2.html">Home</a>
                                        </li>
                                        <li>
                                            <a href="services.html">Services</a>
                                        </li>
                                        <li class="c-dropdowns">
                                            <a href="#">Portfolio</a>
                                            <ul class="cr-dropdown-menu">
                                                <li>
                                                    <a href="portfolio-2-column.html">Portfolio 2 Column</a>
                                                </li>
                                                <li>
                                                    <a href="portfolio-3-column.html">Portfolio 3 Column</a>
                                                </li>
                                                <li>
                                                    <a href="portfolio-4-column.html">Portfolio 4 Column</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="c-dropdowns">
                                            <a href="#">Pages</a>
                                            <ul class="cr-dropdown-menu">
                                                <li>
                                                    <a href="about-us.html">About</a>
                                                </li>
                                                <li>
                                                    <a href="pricing.html">Pricing</a>
                                                </li>
                                                <li>
                                                    <a href="#">Other Pages</a>
                                                    <ul class="cr-sub-dropdown-menu">
                                                        <li>
                                                            <a href="404.html">404 Page</a>
                                                        </li>
                                                        <li>
                                                            <a href="coming-soon.html">Coming Soon</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="c-dropdowns">
                                            <a href="#">Blog</a>
                                            <ul class="cr-dropdown-menu">
                                                <li>
                                                    <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-right-sidebar.html">Blog Right Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-full-width.html">Blog Full Width</a>
                                                </li>
                                                <li>
                                                    <a href="blog-single.html">Blog Details</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                </nav>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mobile Menu -->
        </div>        
    </section>
    <!-- End: Navigation
    ============================= -->


    <!-- Start: Header Slider
    ============================= -->
    <header>
        <div class="row">
            <div class="col-md-12">
                <div class="header-slider">
                    <div class="header-single-slider">
                        <figure>
                            <img src="assets/img/sliders/slider01.jpg" alt="">
                            <figcaption>
                                <div class="content">
                                    <div class="container inner-content text-left">
                                        <h3>Chào mừng bạn đến với Nail Xinh</h3>
                                        <h1>DỊCH VỤ LÀM MÓNG</h1>
                                        <p>Là dịch vụ được yêu thích nhất tại NAIL XINH, với những mẫu nail hot trend, luôn đi
                                            đầu xu hướng</p>
                                        <a href="#" class="boxed-btn">Xem thêm</a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="header-single-slider">
                        <figure>
                            <img src="assets/img/sliders/slider02.jpg" alt="">
                            <figcaption>
                                <div class="content">
                                    <div class="container inner-content text-center">
                                        <h3>Chào mừng bạn đến với Nail Xinh</h3>
                                        <h1>DỊCH VỤ LÀM MÓNG</h1>
                                        <p>Là dịch vụ được yêu thích nhất tại NAIL XINH, với những mẫu nail hot trend, luôn đi
                                            đầu xu hướng</p>
                                        <a href="#" class="boxed-btn">Xem thêm</a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="header-single-slider">
                        <figure>
                            <img src="assets/img/sliders/slider03.jpg" alt="">
                            <figcaption>
                                <div class="content">
                                    <div class="container inner-content text-right">
                                        <h3>Chào mừng bạn đến với Nail Xinh</h3>
                                        <h1>DỊCH VỤ LÀM MÓNG</h1>
                                        <p>Là dịch vụ được yêu thích nhất tại NAIL XINH, với những mẫu nail hot trend, luôn đi
                                            đầu xu hướng</p>
                                        <a href="#" class="boxed-btn">Xem thêm</a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- End: Header Slider
    ============================= -->

    <!-- Start: Contact
    ============================= -->

    <section id="contact">
        <div class="container contact-wrapper text-center text-xl-left">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-sm-6 single-contact">
                    <img src="assets/img/icons/icon01.png" alt="">
                    <h4>Mở cửa</h4>
                    <p>Thứ 2 - Thứ 7: 7h30 - 20h30</p>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-6 single-contact">
                    <img src="assets/img/icons/icon02.png" alt="">
                    <h4>Địa chỉ</h4>
                    <p>20 Quang Trung, Hoàn Kiếm, Hà Nội</p>
                </div>
                <div class="col-xl-4 offset-xl-0 col-md-6 col-sm-6 offset-sm-3 single-contact">
                    <img src="assets/img/icons/icon03.png" alt="">
                    <h4>Số điện thoại</h4>
                    <p>0965 695 055</p>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Contact
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
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5 mb-lg-0">                    
                    <div class="service-box text-center">                        
                        <figure>
                            <img src="assets/img/service/service01.png" alt="">
                            <figcaption>
                                <div class="inner-text">
                                    <a href="#" class="boxed-btn">Đặt Lịch</a>
                                </div>
                            </figcaption>
                        </figure>
                        <h4>Lông Mày</h4>
                        <p>NAIL XINH đang có các dịch vụ về lông 
                            mày như: phun thêu, điêu khắc,…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5 mb-lg-0">                    
                    <div class="service-box text-center">                        
                        <figure>
                            <img src="assets/img/service/service02.png" alt="">
                            <figcaption>
                                <div class="inner-text">
                                    <a href="#" class="boxed-btn">Đặt Lịch</a>
                                </div>
                            </figcaption>
                        </figure>
                        <h4>Nail</h4>
                        <p>Là dịch vụ được yêu thích nhất tại NAIL
                            XINH, với những mẫu nail…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5 mb-sm-0">                    
                    <div class="service-box text-center">                        
                        <figure>
                            <img src="assets/img/service/service03.png" alt="">
                            <figcaption>
                                <div class="inner-text">
                                    <a href="#" class="boxed-btn">Đặt Lịch</a>
                                </div>
                            </figcaption>
                        </figure>
                        <h4>Chăm sóc da</h4>
                        <p>NAIL XINH đang có các dịch vụ chăm sóc da
                            như: massage, tẩy da chết,…</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">                    
                    <div class="service-box text-center">                        
                        <figure>
                            <img src="assets/img/service/service04.png" alt="">
                            <figcaption>
                                <div class="inner-text">
                                    <a href="#" class="boxed-btn">Đặt Lịch</a>
                                </div>
                            </figcaption>
                        </figure>
                        <h4>Mi</h4>
                        <p>NAIL XINH đang có các dịch vụ về mi như:
                            nối mi và uốn mi...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End:  Our Service
    ============================= -->



    <!-- Start: Portfolio
    ============================= -->
    
    <section id="portfolio" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12 text-center">
                    <div class="section-title">
                        <h2>SẢN PHẨM CỦA CHÚNG TÔI</h2>
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
                                    <img src="assets/img/portfolio/portfolio01.png" alt="">
                                    <a href="#"><h4>Sơn móng tay <span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio02.png" alt="">
                                    <a href="#"><h4>Sơn móng tay<span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="nail" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="assets/img/portfolio/portfolio01.png" alt="">
                                    <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio05.png" alt="">
                                    <a href="#"><h4>Massage Relax<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio04.png" alt="">
                                    <a href="#"><h4>Massage Water<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="massage" class="tab-pane fade-in active">
                            <ul>
                                <li>
                                    <img src="assets/img/portfolio/portfolio01.png" alt="">
                                    <a href="#"><h4>Massage <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio05.png" alt="">
                                     <a href="#"><h4>Sơn móng tay <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio02.png" alt="">
                                     <a href="#"><h4>Sơn móng tay & Steam <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio06.png" alt="">
                                     <a href="#"><h4>Sơn móng tay <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio03.png" alt="">
                                     <a href="#"><h4>Sơn móng tay <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio07.png" alt="">
                                     <a href="#"><h4>Sơn móng tay <span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio04.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio08.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="nail" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="assets/img/portfolio/portfolio07.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio01.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="waxing" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="assets/img/portfolio/portfolio08.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">150.000VNĐ</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio04.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                            </ul>
                        </div>
                        <div id="facial" class="tab-pane">
                            <ul>
                                <li>
                                    <img src="assets/img/portfolio/portfolio02.png" alt="">
                                     <a href="#"><h4>Sơn móng tay<span class="price">$24.95</span></h4></a>
                                    <p>Bạn có thể tham khảo những...</p>
                                </li>
                                <li>
                                    <img src="assets/img/portfolio/portfolio03.png" alt="">
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

    <!-- End: Portfolio
    ============================= -->

    <!-- Start: Feature
    ============================= -->
    <section id="feature" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12 text-center">
                    <div class="section-title">
                        <h2>QUY TRÌNH ĐẶT LỊCH</h2>
                        <hr>
                        <p>Để khách hàng không mất thời gian, hãy để E-booking giúp bạn</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5 mb-lg-0">                    
                    <div class="feature-box text-center">                        
                        <div class="feature-icon">
                            <img src="assets/img/feature-icon/feature-icon05.png" alt="">
                        </div>
                        <h4>Bước 1:</h4>
                        <p>Đặt lịch online trên website</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5 mb-lg-0">                    
                    <div class="feature-box text-center">                        
                        <div class="feature-icon">
                            <img src="assets/img/feature-icon/feature-icon06.png" alt="">
                        </div>
                        <h4>Bước 2:</h4>
                        <p>Nhân viên gọi điện xác nhận</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5 mb-sm-0">                    
                    <div class="feature-box text-center">                        
                        <div class="feature-icon">
                            <img src="assets/img/feature-icon/feature-icon03.png" alt="">
                        </div>
                        <h4>Bước 3:</h4>
                        <p>Đến tiệm để làm dịch vụ</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">                    
                    <div class="feature-box text-center">                        
                        <div class="feature-icon">
                            <img src="assets/img/feature-icon/feature-icon07.png" alt="">
                        </div>
                        <h4>Bước 4:</h4>
                        <p>Hoàn thành dịch vụ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End:  Our Feature
    ============================= -->


        <!-- Start: Expert Beauticians
    ============================= -->
    
    <section id="beauticians" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12 text-center">
                    <div class="section-title">
                        <h2>GẶP MẶT CÁC CHUYÊN GIA</h2>
                        <hr>
                        <p>Hãy đến với NAILXINH để được nhận những dịch vụ tốt nhất</p>
                    </div>
                </div>                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="beauticians-slider">
                        <div class="single-beauticians">
                            <div class="img-wrapper">
                                <img src="assets/img/beauticians/beauticians01.jpg" alt="">
                                <div class="beautician-footer-text">
                                    <h5>Phương Anh</h5>
                                    <p>Chuyên viên: Lông mày</p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="single-beauticians">
                            <div class="img-wrapper">
                                <img src="assets/img/beauticians/beauticians02.jpg" alt="">
                                <div class="beautician-footer-text">
                                    <h5>Phương Anh</h5>
                                    <p>Chuyên viên: Lông mày</p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="single-beauticians">
                            <div class="img-wrapper">
                                <img src="assets/img/beauticians/beauticians03.jpg" alt="">
                                <div class="beautician-footer-text">
                                    <h5>Phương Anh</h5>
                                    <p>Chuyên viên: Lông mày</p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="single-beauticians">
                            <div class="img-wrapper">
                                <img src="assets/img/beauticians/beauticians04.jpg" alt="">
                                <div class="beautician-footer-text">
                                    <h5>Phương Anh</h5>
                                    <p>Chuyên viên: Lông mày</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- End Single Beauticans Slider -->
            </div>
        </div>
    </section>

    <!-- End: Expert Beauticians
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

    <!-- Start: Fun Fact
    ============================= -->

    <section id="counter" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-box mb-5 mb-lg-0">
                    <img src="assets/img/counter/counter-icon01.png" alt="">
                    <h3><span class="counter">15</span></h3>
                    <p>Cơ sở</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-box mb-5 mb-lg-0">
                    <img src="assets/img/counter/counter-icon02.png" alt="">
                    <h3><span class="counter">400</span></h3>
                    <p>Nhân viên</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-box mb-5 mb-sm-0">
                    <img src="assets/img/counter/counter-icon03.png" alt="">
                    <h3><span class="counter">8</span></h3>
                    <p>Dịch vụ</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-box">
                    <img src="assets/img/counter/counter-icon05.png" alt="">
                    <h3><span class="counter">1256</span></h3>
                    <p>Khách hàng</p>
                </div>
            </div>
        </div>
    </section>

    <!-- End:  Fun Fact
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


    <!-- Start: Footer Sidebar
    ============================= -->
    <footer id="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-lg-0 mb-4">
                    <aside class="widget widget_about">
                        <div class="footer-logo"><img src="assets/img/logo.png" alt=""></div>
                        <p>NAILXINH là một trong số những 
                            tiệm nail cao cấp ở Hà Nội đầu tư
                            hệ thống trang thiết bị</p>
                        <ul class="widget-info">
                            <li><i class="fas fa-map-marker"></i>20 Quang Trung, Hoàn Kiếm, HN</li>
                            <li><i class="fas fa-phone"></i>0965 695 055</li>
                            <li><i class="fas fa-envelope"></i>nailxinh@gmail.com</li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-lg-0 mb-md-0 mb-4">
                    <aside class="widget widget_recent widget_links">
                        <h4 class="widget-title"><img src="assets/img/section-icon.png" alt="">Chi nhánh</h4>
                        <ul>
                            <li class="latest-news">
                                <a href="#">
                                    Hà Nội
                                </a>
                            </li>
                            <li class="latest-news">
                                <a href="#">
                                    Đà Nẵng
                                </a>
                            </li>
                            <li class="latest-news">
                                <a href="#">
                                    Hồ Chí Minh
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-lg-0 mb-4">
                    <aside class="widget widget_links">
                        <h4 class="widget-title"><img src="assets/img/section-icon.png" alt="">Menu</h4>
                        <ul>
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Dịch vụ</a></li>
                            <li><a href="#">Thư viện ảnh</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Đặt lịch</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Nail</a></li>
                            <li><a href="#">Da</a></li>
                            <li><a href="#">Lông mày</a></li>
                            <li><a href="#">Mi</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <aside class="widget widdget-instagram">
                        <h4 class="widget-title"><img src="assets/img/section-icon.png" alt="">Theo dõi chúng tôi</h4>
                        <ul class="instagram-photos">                                
                            <li>
                                <img src="assets/img/instagram/instagram01.jpg" alt="">
                                <div class="instagram-overlay">
                                    <a href="#">+</a>
                                </div>
                            </li>                                
                            <li>
                                <img src="assets/img/instagram/instagram02.jpg" alt="">
                                <div class="instagram-overlay">
                                    <a href="#">+</a>
                                </div>
                                
                            </li>                                
                            <li>
                                <img src="assets/img/instagram/instagram03.jpg" alt="">
                                <div class="instagram-overlay">
                                    <a href="#">+</a>
                                </div>
                            </li>                               
                            <li>
                                <img src="assets/img/instagram/instagram04.jpg" alt="">
                                <div class="instagram-overlay">
                                    <a href="#">+</a>
                                </div>
                            </li>                                
                            <li>
                                <img src="assets/img/instagram/instagram05.jpg" alt="">
                                <div class="instagram-overlay">
                                    <a href="#">+</a>
                                </div>
                                
                            </li>                                
                            <li>
                                <img src="assets/img/instagram/instagram06.jpg" alt="">
                                <div class="instagram-overlay">
                                    <a href="#">+</a>
                                </div>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>

        </div>
    </footer>
    <!-- End: Footer Sidebar
    ============================= -->


    
    <!-- Scripts -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    
    <!-- Custom Script -->
    <script src="assets/js/custom.js"></script>
    
</body>


</html>