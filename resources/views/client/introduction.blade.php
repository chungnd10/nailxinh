@extends('client.layouts.index')
@section('content')
    <!-- Start: Breadcrumb Area
        ============================= -->

        <section id="breadcrumb-area" class="breadcrumb-introduction">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Giới thiệu</h2>
                        <ul class="breadcrumb-nav list-inline">
                            <li><a href="{{ route('index') }}">NailXinh</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li><a href="{{ route('introduction') }}" style="color: #fff">Giới thiệu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    <!-- End: Breadcrumb Area
        ============================= -->

    <!-- Start: Introduction 
        ============================= -->
        <section id="nailit">
            <div class="container">
                <div class="section-title text-center pt-5">{!! $introduction->title !!}</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="nail-img">
                            <img src="upload/images/introductions/{{ $introduction->image }}"
                            alt="{{ $introduction->title }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section-title section-title-intro text-center">
                            <h2>Về chúng tôi</h2>
                            <hr>
                        </div>
                        <div class="nail-content">
                            <p>
                                {!! $introduction->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- End: Introduction 
        ============================= -->

    <!-- Start: Gallery 
        ============================= -->
        @if($photo_gallery->first())
        <section id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <div class="section-title">
                            <h2>KHÁM PHÁ ALBUM ẢNH</h2>
                            <hr>
                        </div>
                        <div class="section-desc">
                            Ngoài những chất lượng về dịch vụ, NAIL XINH còn tự hào là chuỗi làm đẹp có không gian được
                            yêu thích nhất. Với
                            concept các tone màu sang chảnh, nền nã, NAIL XINH luôn làm hài lòng khách yêu mỗi khi đặt
                            chân đến. Đến với chúng
                            mình để được nhận những điều tuyệt vời nhất nhé!!!
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-5" id="lightgallery">
                    @foreach($photo_gallery as $item)
                    <a class="col-md-3 col-6 jg-entry" href="{{ asset('upload/images/photo_library/'. $item->image) }}">
                        <img src="{{ asset('upload/images/photo_library/'. $item->image) }}"/>
                        <div class="demo-gallery-poster">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

    <!-- Start: End 
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
