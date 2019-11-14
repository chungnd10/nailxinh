@extends('client.layouts.index')
@section('content')
     <!-- Start: Breadcrumb Area
    ============================= -->

    <section id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Gallery</h2>
                    <ul class="breadcrumb-nav list-inline">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Breadcrumb Area
    ============================= -->


    <!-- Start: Gallery
    ============================= -->
    
    <section id="gallery" class="section-padding gallery-page">
        <div class="container">
            <div class="row gallery-tab">
                <div class="col-md-12 text-center">
                    <ul class="gallery-tab-sorting sorting-btn" id="filter">
                        <li><a href="#" data-group="Show All" class="active">Tất cả</a></li>
                        <li><a href="#" data-group="beautyspa">Lông Mày</a></li>
                        <li><a href="#" data-group="haircut">Nail</a></li>
                        <li><a href="#" data-group="nailcare">Da</a></li>
                        <li><a href="#" data-group="skincare">Mi</a></li>
                        <li><a href="#" data-group="message">Massage</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row gallery" id="grid">
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["beautyspa", "haircut", "skincare", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery01.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery01.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["beautyspa", "haircut","message", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery02.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery02.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["beautyspa", "haircut", "nailcare", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery03.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery03.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["nailcare", "skincare","message", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery04.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery04.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["beautyspa", "haircut", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery05.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery05.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["beautyspa", "message", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery06.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery06.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["beautyspa", "haircut", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery07.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery07.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["beautyspa", "haircut", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery08.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery08.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["message", "haircut", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery09.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery09.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["beautyspa", "haircut", "skincare", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery10.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery10.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["skincare", "haircut", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery11.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery11.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-groups='["message", "haircut", "nailcare", "Show All"]'>
                    <figure>
                        <img src="client_assets/img/gallery/gallery12.jpg" alt="">
                        <figcaption>
                            <div class="inner-text">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a class="popup" href="client_assets/img/gallery/gallery12.jpg"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <a href="#" class="btn btn-pink btn-custom">Đặt lịch</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Gallery
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
