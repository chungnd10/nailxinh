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
<script type="text/javascript">
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
</body>
</html>
