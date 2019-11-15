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
                        <li><a href="/">NailXinh</a></li>
                        <li>Liên hệ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Breadcrumb Area
    ============================= -->

    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12 text-center">
                    <div class="section-title">
                        <h2>HỆ THỐNG NAILXINH</h2>
                        <hr>
                        <p>Hãy đến với chúng tôi để thay đổi chính mình</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($cities as $city)
                    @if(!$city->getBranch($city->id)->isEmpty())
                        <div class="col-md-4">
                            <div class="showroom">
                            <span style="background-image: url(https://nailroom.vn/wp-content/uploads/2019/09/HCM.jpg)">
                                <span>{{ $city->name }}</span>
                            </span>
                                <ul>
                                    @foreach($city->getBranch($city->id) as $branch)
                                        <li class="aos-init">{{ $branch->name.', '.$branch->address }}
                                            <a href="tel:{{ $branch->phone_number }}">{{ $branch->phone_number }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- End: Contact
    ============================ -->

    <section id="calltoaction">
        <div class="container">
            <div class="cta-content text-center" data-aos="fade-up">
                <h3 class="mb-3"><span style="color: #b7752b;">Đặt lịch liền tay</span></h3>
                <h3 class="mb-3">HƯỞNG NGAY ƯU ĐÃI</h3>
                <div class="cta-booking">
                    <a href="#" class="btn btn-default button-a text-uppercase" target="_blank">Đặt lịch online</a>
                </div>
            </div>
        </div>
    </section>
    {{--START: subscribe
    =======================--}}
    @include('client.layouts.subscribe')
    {{--END:  subscribe
    ==============================================--}}
@endsection
@section('script')
    {{-- example--}}
@endsection
