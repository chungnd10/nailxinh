@extends('admin.layouts.auth.index_auth')
@section('content')
    <title>Đăng nhập</title>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="login-box-body">
            <div class="register-logo">
                <a href="/">
                    <img src="client_assets/img/logo.png" alt="">
                </a>
            </div>
            <p class="login-box-msg">Đăng nhập để tiếp tục</p>
            <form action="{{ route('login') }}" method="post" id="login">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text"
                           class="form-control"
                           name="email"
                           placeholder="Email"
                           value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if($errors->first('email'))
                        <span class="text-danger">
                        {{$errors->first('email')}}
                    </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if($errors->first('password'))
                        <span class="text-danger">
                        {{$errors->first('password')}}
                    </span>
                    @endif
                    @if(session('danger'))
                        <span class="text-danger">
                    {{ session('danger') }}
                    </span>
                    @endif
                </div>
                <div class="row"><!-- /.col -->
                    <div class="col-xs-4 col-xs-offset-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                    </div>
                </div>
                <div class="row">
                    <div style="text-align: center; padding: 20px 0">
                        <a href="/">Trang chủ</a> | <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                    </div>
                </div>
            </form>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //validate
            $("#login").validate({
                rules: {
                    email: {
                        required: true,
                        emailGood: true
                    },
                    password: {
                      required: true,
                      minlength: 8
                    }
                },
                messages: {
                    email: {
                       required: "*Mục này không được để trống",
                    },
                    password: {
                      required: "*Mục này không được để trống",
                      minlength: "*Yêu cầu mật khẩu tối thiểu 8 ký tự",
                    },
                }
            });
        });
    </script>
@endsection
