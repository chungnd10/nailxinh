@extends('client.layouts.index')
@section('content')
        <!-- Start: Breadcrumb Area
    ============================= -->

    <section id="breadcrumb-area">
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
            <h2 class="section-title text-center pt-5">{!! $introduction->title !!}</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="nail-img">
                        <img src="upload/images/introductions/{{ $introduction->image }}" alt="{{ $introduction->title }}">
                    </div>
                </div>
                <div class="col-md-6">
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
    <section id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <div class="section-title">
                        <h2>KHÁM PHÁ ALBUM ẢNH</h2>
                        <hr>
                        <p>Bạn có thể tham khảo những hình ảnh dưới đây để rõ hơn về NAILXINH</p>
                    </div>
                    <div class="section-desc">
                        Ngoài những chất lượng về dịch vụ, NAIL XINH còn tự hào là chuỗi làm đẹp có không gian được yêu thích nhất. Với 
                        concept các tone màu sang chảnh, nền nã, NAIL XINH luôn làm hài lòng khách yêu mỗi khi đặt chân đến. Bên cạnh 
                        ó, NAIL XINH tự hào sở hữu kho sơn khổng lồ, đa dạng để khách yêu có thể thỏa thích lựa chọn. Đến với chúng 
                        mình để được nhận những điều tuyệt vời nhất nhé!!!
                    </div>
                </div>
            </div>
            <div class="row mt-5" id="lightgallery">
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
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
