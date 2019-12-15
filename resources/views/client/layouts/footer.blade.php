<footer id="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 mb-lg-0 mb-4">
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
            
            <div class="col-lg-2 col-md-6 col-sm-6 mb-lg-0 mb-4">
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
                    </div>
                </aside>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 mb-lg-0 mb-md-0 mb-4">
                <aside class="widget widget_recent widget_links">
                    <h4 class="widget-title"><img src="client_assets/img/section-icon.png" alt="">Loại dịch vụ</h4>
                    
                    <div class="widget-adress">
                        <ul>
                            @foreach($type_services as $type_service)
                                <li>
                                    <a class="text-uppercase" href="{{ route('type-service', [$type_service->slug, $type_service->id ]) }}">{{ $type_service->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <aside class="widget widdget-instagram">
                    <h4 class="widget-title">
                        <img src="client_assets/img/section-icon.png" alt="">Theo dõi chúng tôi
                    </h4>
                    <div class="facebook-widget">
                        <iframe src="{{ $info->facebook }}"
                                width="340" height="200"
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
<div class="booking-fixed">
    <a href="{{route('booking')}}" target="_blank"><svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg><br>Đặt lịch</a>
</div>
