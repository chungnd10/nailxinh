<section id="testimonial" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-carousel text-center">
                    @foreach($feedbacks as $feedback)
                        <div class="single-testimonial">
                            <p>“{{ $feedback->content }}”</p>
                            <h5>{{ $feedback->full_name }}</h5>
{{--                            <p class="title">Người mẫu</p>--}}
                            <div class="testimonial-img">
                                <img class="fix-border-radius" width="80" src="upload/images/feedbacks/{{ $feedback->image }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
