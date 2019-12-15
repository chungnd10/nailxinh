<!-- Start: Header Slider
============================= -->
<header>
    <div class="row">
        <div class="col-md-12">
            <div class="header-slider">
                @foreach($slides as $slide)
                    <div class="header-single-slider">
                        <figure>
                            <img src="upload/images/slides/{{ $slide->images }}" alt="">
                            <figcaption>
                                <div class="content">
                                    <div class="container inner-content {{ $slide->location_display == config('contants.location_display_left') ? 'text-left' : 'text-right'}}">
                                        <h3 class="uppercase">Chào mừng bạn đến với Nail Xinh</h3>
                                        <h1>{{ $slide->title }}</h1>
                                        <p>{{ limit($slide->description, 100, '...') }}</p>
                                        @if($slide->url != '')
                                            <a href="{{ $slide->url  }}" class="boxed-btn">Xem thêm</a>
                                        @endif
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
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
        <div class="row show_desk">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 single-contact">
                <img src="client_assets/img/icons/icon01.png" alt="">
                <h4>Mở cửa</h4>
                <p>{{ $info->open_time." - ".$info->close_time}}</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 single-contact">
                <img src="client_assets/img/icons/icon02.png" alt="">
                <h4>Địa chỉ</h4>
                <p>{{ $info->address }}</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 single-contact">
                <img src="client_assets/img/icons/icon03.png" alt="">
                <h4>Số điện thoại</h4>
                <p>{{ $info->phone_number }}</p>
            </div>
        </div>
        <div class="row hidden_desk">
            <div class="col-md-12">
                <div class="contact-section">
                    <div class="single-contact">
                        <img src="client_assets/img/icons/icon01.png" alt="">
                        <h4>Mở cửa</h4>
                        <p>{{ $info->open_time." - ".$info->close_time}}</p>
                    </div>
                    <div class="single-contact">
                        <img src="client_assets/img/icons/icon02.png" alt="">
                        <h4>Địa chỉ</h4>
                        <p>{{ $info->address }}</p>
                    </div>
                    <div class="single-contact">
                        <img src="client_assets/img/icons/icon03.png" alt="">
                        <h4>Số điện thoại</h4>
                        <p>{{ $info->phone_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Contact
============================= -->
