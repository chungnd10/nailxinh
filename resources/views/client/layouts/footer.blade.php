<footer id="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 mb-lg-0 mb-4">
                <aside class="widget widget_about">
                    <div class="footer-logo"><img src="client_assets/img/logo.png" alt=""></div>
                    <p>{{ $info->introduction }}</p>
                    <ul class="widget-info">
                        <li><i class="fas fa-map-marker"></i>{{ $info->address }}</li>
                        <li><i class="fas fa-phone"></i>{{ $info->phone_number }}</li>
                        <li><i class="fas fa-envelope"></i>{{ $info->email }}</li>
                    </ul>
                </aside>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-lg-0 mb-md-0 mb-4">
                <aside class="widget widget_recent widget_links">
                    <h4 class="widget-title"><img src="client_assets/img/section-icon.png" alt="">Chi nhánh</h4>
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
                    <h4 class="widget-title">
                        <img src="client_assets/img/section-icon.png" alt="">Menu
                    </h4>
                    <div class="d-flex">
                        <ul>
                            <li>
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
                        <ul>
                            @foreach($type_services as $type_service)
                                <li>
                                    <a href="{{ route('type_services', $type_service->id) }}">{{ $type_service->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <aside class="widget widdget-instagram">
                    <h4 class="widget-title">
                        <img src="client_assets/img/section-icon.png" alt="">Theo dõi chúng tôi
                    </h4>
                    <div class="facebook-widget">
                        <iframe src="{{ $info->facebook }}"
                                width="255" height="196"
                                style="border:none;overflow:hidden"
                                allowTransparency="true"
                                allow="encrypted-media">

                        </iframe>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</footer>
