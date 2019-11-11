<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @include('admin.layouts.auth.top_assets')
</head>
<body class="hold-transition login-page">
    @yield('content')
    @include('admin.layouts.auth.bottom_assets')
    @yield('script')
</body>
</html>
