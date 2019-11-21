<section id="beauticians" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12 text-center">
                <div class="section-title">
                    <h2>KỸ THUẬT VIÊN CHUYÊN NGHIỆP</h2>
                    <hr>
                    <p>Hãy đến với NAILXINH để được nhận những dịch vụ tốt nhất</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="beauticians-slider">
                    @foreach($technicians as $technician)
                        <div class="single-beauticians">
                            <div class="img-wrapper">
                                <img src="upload/images/users/{{ $technician->avatar }}" alt="">
                                <div class="beautician-footer-text">
                                    <h5>{{ get_last_words(1, $technician->full_name) }}</h5>
                                    @if($technician->getNameTechnician($technician->id)->first())
                                        <p>Kỹ thuật viên:
                                            @foreach($technician->getNameTechnician($technician->id) as $item)
                                                @if($item->name != "")
                                                        {{ $item->name}}@if($loop->remaining){{ ", " }}@endif
                                                @endif
                                            @endforeach
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- End Single Beauticans Slider -->
        </div>
    </div>
</section>
