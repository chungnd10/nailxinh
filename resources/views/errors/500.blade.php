<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.errors.top_assets')
    <title>500</title>
</head>
<body>
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h3>500</h3>
        </div>
        <h2>Lỗi máy chủ nội bộ !</h2>
        <a href="{{ url()->previous() }}"><span class="arrow"></span>Trờ về</a>
    </div>
</div>
</body>
</html>

{{--@extends('errors::minimal')--}}
{{--@section('title', __('Not Found'))--}}
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}


{{--@extends('errors::minimal')--}}

{{--@section('title', __('Server Error'))--}}
{{--@section('code', '500')--}}
{{--@section('message', __('Server Error'))--}}
