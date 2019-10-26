<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts.top_assets')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    {{--  header  --}}
    @include('admin.layouts.header')
    {{--  sidebar- menu--}}
    @include('admin.layouts.sidebar')
    {{--Content--}}
    <div class="content-wrapper">
        @yield('content')
    </div>
    {{-- footer --}}
    @include('admin.layouts.footer')
</div>
{{-- bottom_assets--}}
@include('admin.layouts.bottom_assets')
{{--page script--}}
@yield('script')
</body>
</html>
