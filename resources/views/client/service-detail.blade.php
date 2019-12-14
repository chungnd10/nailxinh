@extends('client.layouts.index')
@section('content')

    <!-- Start: Breadcrumb Area
    ============================= -->

    <section id="breadcrumb-area" class="breadcrumb-service-detail">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>NailXinh</h2>
                    <ul class="breadcrumb-nav list-inline">
                        <li><a href="/">NailXinh</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Liên hệ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Breadcrumb Area
    ============================= -->


    <!-- Start: Introduction 
    ============================= -->
    <section id="nailit" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class=" col-lg-5 col-md-6">
                    <div class="service-detail-img">
                        <img src="upload/images/service/{{ $service->image }}" alt="">
                    </div>
                </div>
                <div class=" col-lg-5 col-md-6">
                    <div class="service-detaill-content p-4">
                        <h2 class="text-upercase mb-3">{{ $service->name }}</h2>
                        <h4 class="mb-2">Giá: {{ number_format($service->price, 0, ',', '.') }}</h4>
                        <h4 class="mb-2">Thời gian hoàn thành: {{ $service->completion_time }}</h4>
                        <p>{{ $service->description }}</p>
                        <a class="btn btn-dl text-uppercase" href="{{ route('booking') }}">Đặt lịch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Introduction 
    ============================= -->
    <!-- Start : Implementation Process 
    ============================= -->

    @if($process->first())
        <section id="process">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12 text-center">
                    <div class="section-title">
                        <h2>QUY TRÌNH THỰC HIỆN</h2>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($process as $item)
                    <div class="col-md-4">
                        <div class="process-content text-center">
                            <div class="text-brown mb-2">{{ $item->step }}. {{ $item->name }}</div>
                            <div>{{ $item->content }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    <!-- End : Implementation Process 
    ============================= -->

    <!-- Start : Call action 
    ============================= -->
    <section id="calltoaction">
        <div class="container">
            <div class="cta-content text-center" data-aos="fade-up">
                <h3 class="mb-3"><span style="color: #b7752b;">Đặt lịch liền tay</span></h3>
                <h3 class="mb-3">HƯỞNG NGAY ƯU ĐÃI</h3>
                <div class="cta-booking">
                    <a href="{{ route('booking') }}" class="btn btn-default button-a text-uppercase" >Đặt lịch online</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End : Call action 
    ============================= -->


    <!-- Start: Expert Beauticians
    ============================= -->
    <section id="services" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12 text-center">
                <div class="section-title">
                    <h2>DỊCH VỤ KHÁC</h2>
                    <hr>
                    <p>Bạn có thể tham khảo những dịch vụ dưới đây để rõ hơn về NAILXINH</p>
                </div>
            </div>
        </div>
        <div class="row" id="our_service_mobi">
            <div class="col-md-12">
                <div class="our_service_mobile" id="our_service">
                @foreach($orther_services as $item)
                    <div class="service-box service-box-detail text-center">
                        <figure>
                            <img class="fix-border-radius" src="upload/images/service/{{ $item->image }}" alt="">
                            <figcaption>
                                <div class="inner-text">
                                    <a href="{{ route('service-detail', $item->slug ) }}" class="boxed-btn">Chi tiết</a>
                                </div>
                            </figcaption>
                        </figure>
                        <h4>{{ $item->name }}</h4>
                        <p>{{ limit( $item->description, 60, '...') }}</p>
                    </div>
                @endforeach
                </div>  
            </div>
        </div>
    </div>
</section>
    <!-- End: Expert Beauticians
    ============================= -->

    
    {{--START: subscribe
    =======================--}}
    @include('client.layouts.subscribe')
    {{--END:  subscribe
    ==============================================--}}
@endsection
@section('script')
    {{-- example--}}
@endsection
