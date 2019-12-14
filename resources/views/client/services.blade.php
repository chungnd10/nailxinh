@extends('client.layouts.index')
@section('content')
    <!-- Start: Breadcrumb Area
        ============================= -->

        <section id="breadcrumb-area" class="breadcrumb-services">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>NailXinh</h2>
                        <ul class="breadcrumb-nav list-inline">
                            <li><a href="/">NailXinh</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Dịch vụ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
    <!-- End: Breadcrumb Area
        ============================= -->

        
        {{--START:services
            =======================--}}
            @include('client.layouts.services')
            {{--END: services
                ==============================================--}}

                {{--START: feedbacks
                    =======================--}}
                    @include('client.layouts.feedbacks')
                    {{--END:  feedbacks
                        ==============================================--}}

                        {{--START: subscribe
                            =======================--}}
                            @include('client.layouts.subscribe')
                            {{--END:  subscribe
                                ==============================================--}}

                                @endsection
                                @section('script')
                                {{-- example--}}
                                @endsection
