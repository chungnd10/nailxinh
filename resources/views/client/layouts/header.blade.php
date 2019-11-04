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
                        <a href="{{ route('index') }}"><img class="responsive" src="client_assets/img/logo.png"
                                                            alt="Startkit"></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 d-none d-lg-block text-right">
                    <nav class="main-menu">
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

                <div class="col-6 text-right">
                    <ul class="mbl d-lg-none">
                        <li class="search-button">
                            <div class="sb-search">
                                <form>
                                    <input class="sb-search-input"
                                           onkeyup="buttonUp();"
                                           placeholder="Search"
                                           type="search" value="" name="search">
                                     <input class="sb-search-submit"
                                            type="submit"
                                            value="">
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

