@extends('client.layouts.index')
@section('content')
    {{--START: banner
    =======================--}}
    @if($slides->first())
        @include('client.layouts.banner')
    @endif
    {{--END: banner
    ==============================================--}}

    {{--START:type services
    =======================--}}
    @if($type_services->first())
        @include('client.layouts.type_services')
    @endif
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
    @if($technicians->first())
        @include('client.layouts.technician')
    @endif
    {{--END:  technician
    ==============================================--}}

    {{--START: feedbacks
    =======================--}}
    @if($feedbacks->first())
        @include('client.layouts.feedbacks')
    @endif
    {{--END:  feedbacks
    ==============================================--}}

    {{--START: statistic
    =======================--}}
    @if($branch || $user || $service || $orders)
        @include('client.layouts.statistic')
    @endif
    {{--END:  statistic
    ==============================================--}}

    {{--START: subscribe
    =======================--}}
    @include('client.layouts.subscribe')
    {{--END:  subscribe
    ==============================================--}}

@endsection
