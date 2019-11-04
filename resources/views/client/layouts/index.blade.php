<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Nailxinh, Responsive, SPA Template, Bootstrap 4,">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NAILXINH - Spa and Beauty</title>
    {{--START: top_assets
    =======================--}}
    @include('client.layouts.top_assets')
    {{--END: end top_assets
    ==============================================--}}
</head>
<body>
{{--START:header
=======================--}}
@include('client.layouts.header')
{{--END: header
==============================================--}}

{{--START:content
=======================--}}
@yield('content')
{{--END: content
==============================================--}}

{{--START: footer
=======================--}}
@include('client.layouts.footer')
{{--END:  footer
==============================================--}}

{{--START: bottom_assets
=======================--}}
@include('client.layouts.bottom_assets')
{{--END:  bottom_assets
==============================================--}}

{{--START: script
=======================--}}
@yield('script')
{{--END:  script
==============================================--}}

</body>
</html>
