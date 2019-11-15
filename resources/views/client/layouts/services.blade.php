<section id="portfolio" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12 text-center">
                <div class="section-title">
                    <h2>DỊCH VỤ CỦA CHÚNG TÔI</h2>
                    <hr>
                    <p>Bạn có thể tham khảo những dịch vụ dưới đây để rõ hơn về NAILXINH</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="portfolio-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($type_services as $type_service)
                            @if($type_service->getServices($type_service->id)->isNotEmpty())
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab"
                                       href="#{{ $type_service->slug }}">{{ $type_service->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content">
                    @foreach($type_services as $type_service)
                        <div id="{{ $type_service->slug }}"
                             class="tab-pane {{ $loop->first ? 'fade-in active' : '' }}"
                        >
                            @foreach($type_service->getServices($type_service->id) as $service)
                                @if($service)
                                    <ul>
                                        <li>
                                            <a href="{{ route('service-detail', [ $service->slug, $service->id ] ) }}">
                                                <img width="80" class="fix-border-radius"
                                                    src="upload/images/service/{{ $service->image }}" alt="services">
                                                <h4>{{ limit($service->name, 19, '...') }}
                                                        <span class="price">{{ number_format($service->price) }} VNĐ</span>
                                                    </h4>
                                                <p class="text-dark">{{ limit($service->description, 70, '...') }}</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
