@extends('client.layouts.index')
@section('content')
    {{--START: banner
    =======================--}}
    @include('client.layouts.banner')
    {{--END: banner
    ==============================================--}}

    {{--START:type services
    =======================--}}
    @include('client.layouts.type_services')
    {{--END: type services
    ==============================================--}}

    {{--START:services
    =======================--}}
    @include('client.layouts.services')
    {{--END: services
    ==============================================--}}

    {{--START:process_orders
    =======================--}}
    @include('client.layouts.process_orders')
    {{--END: process_orders
    ==============================================--}}

    {{--START: technician
    =======================--}}
    @include('client.layouts.technician')
    {{--END:  technician
    ==============================================--}}

    {{--START: feedbacks
    =======================--}}
    @include('client.layouts.feedbacks')
    {{--END:  feedbacks
    ==============================================--}}

    {{--START: statistic
    =======================--}}
    @include('client.layouts.statistic')
    {{--END:  statistic
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
