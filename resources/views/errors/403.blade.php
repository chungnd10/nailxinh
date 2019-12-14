<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{ asset('') }}">
    <title>403</title>
    @include('layouts.errors.top_assets')
</head>
<body>
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h3>403</h3>
        </div>
        <h2>Cấm truy cập !</h2>
        <a href="{{ url()->previous() }}"><span class="arrow"></span>Trờ về</a>
    </div>
</div>
</body>
</html>

{{--@extends('errors::minimal')--}}

{{--@section('title', __('Not Found'))--}}
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}
