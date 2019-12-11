<!-- Start: Preloader
============================= -->
@if(!session()->has('success'))
    <div class="preloader">
        <div class="wrapper">
            <div class="circle circle-1"></div>
            <div class="circle circle-1a"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>
        <h1>Loading&hellip;</h1>
    </div>
@endif
<!-- End: Preloader
============================= -->
<!-- Start: Header Top
============================= -->
<section id="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 text-left text-md-center">
                <p>
                    <i class="fas fa-clock"></i>Giờ mở cửa: {{ $info->open_time." - ".$info->close_time}}
                </p>
            </div>
            <div class="col-lg-6 col-md-6 text-center text-md-right header-top-right">
                <ul class="">
                    <li class="mr-2"><i class="fas fa-envelope"></i>{{ $info->email }}</li>
                    <li><i class="fas fa-phone"></i>{{ $info->phone_number }}</li>
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
                        <a href="{{ route('index') }}">
                            <img class="responsive" src="upload/images/web_settings/{{ $info->logo }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 d-none d-lg-block text-right">
                    <nav class="main-menu">
                        <ul>
                            <li {{ isset($index_active) ? 'class=active' : ''}}>
                                <a href="{{ route('index') }}">TRANG CHỦ</a>
                            </li>
                            <li {{ isset($introduction_active) ? 'class=active' : ''}}>
                                <a href="{{ route('introduction') }}">GIỚI THIỆU</a>
                            </li>
                            <li {{ isset($services_active) ? 'class=active' : ''}}>
                                <a href="{{ route('services') }}">DỊCH VỤ</a>
                            </li>
                            <li {{ isset($gallery_active) ? 'class=active' : ''}}>
                                <a href="{{ route('gallery') }}">THƯ VIỆN ẢNH</a>
                            </li>
                            <li {{ isset($contact_active) ? 'class=active' : ''}}>
                                <a href="{{ route('contact') }}">LIÊN HỆ</a>
                            </li>
                            <li {{ isset($booking_active) ? 'class=active' : ''}}>
                                <a href="{{ route('booking') }}">ĐẶT LỊCH</a>
                            </li>
                        </ul>
                    </nav>
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
                                        <a href="{{ route('index') }}">TRANG CHỦ</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('introduction') }}">GIỚI THIỆU</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('services') }}">DỊCH VỤ</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('gallery') }}">THƯ VIỆN ẢNH</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">LIÊN HỆ</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('booking') }}">ĐẶT LỊCH</a>
                                    </li>
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

