@extends('client.layouts.index')
@section('content')
     <!-- Start: Breadcrumb Area
        ============================= -->

        <section id="breadcrumb-area" class="breadcrumb-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Gallery</h2>
                        <ul class="breadcrumb-nav list-inline" id="filter">
                            <li><a href="/">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
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
                            @if($type_services->first())
                            @foreach($type_services as $type_service)
                            @if($type_service->getPhotoLibraryWithType($type_service->id)->first())
                            <li>
                                <a href="#"
                                data-group="{{ Hashids::encode($type_service->id) }}"
                                class="{{ $loop->first ? 'active' : '' }}"
                                >
                                {{ $type_service->name }}
                            </a>
                        </li>
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row gallery" id="grid">
                @if($type_services->first())
                @foreach($type_services as $type_service)
                @if($type_service->getPhotoLibraryWithType($type_service->id)->first())
                @foreach($type_service->getPhotoLibraryWithType($type_service->id) as $photo)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item "
                data-groups='["{{ Hashids::encode($type_service->id) }}"]'>
                <figure>
                    <img src="upload/images/photo_library/{{ $photo->image }}" alt="">
                    <figcaption>
                        <div class="inner-text">
                            <a class="popup" href="upload/images/photo_library/{{ $photo->image }}"><i
                                class="fas fa-eye" title="Phóng to ảnh"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                @endforeach
                @endif
                @endforeach
                @endif
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
