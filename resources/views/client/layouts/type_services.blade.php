
<!-- Start: Type Service
============================= -->
<section id="services" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12 text-center">
                <div class="section-title">
                    <h2>CÁC LOẠI DỊCH VỤ</h2>
                    <hr>
                    <p>Bạn có thể tham khảo những dịch vụ dưới đây để rõ hơn về NAILXINH</p>
                </div>
            </div>
        </div>
        <div class="row" id="our_service_mobi">
            <div class="col-md-12">
                <div class="our_service_mobile">
                @foreach($type_services as $type_service)
                    <div class="service-box text-center">
                        <figure>
                            <img class="fix-border-radius" src="upload/images/type_services/{{ $type_service->image }}" alt="">
                            <figcaption>
                                <div class="inner-text">
                                    <a href="{{ route('type-service', [ $type_service->slug, $type_service->id ] ) }}" class="boxed-btn">Chi tiết</a>
                                </div>
                            </figcaption>
                        </figure>
                        <h4>{{ $type_service->name }}</h4>
                        <p>{{ limit( $type_service->description, 60, '...') }}</p>
                    </div>
                @endforeach
                </div>  
            </div>
        </div>
    </div>
</section>
<!-- End:  Type Service
============================= -->
