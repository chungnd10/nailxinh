@extends('admin.layouts.auth.index_auth')
@section('content')
    <title>Đặt lại mật khẩu</title>
    <div class="register-box">
        <div class="register-box-body">
            <div class="register-logo">
                <a href="/">
                    <img src="client_assets/img/logo.png" alt="">
                </a>
            </div>
            <p class="login-box-msg">Đặt lại mật khẩu</p>
            <form method="POST" action="{{ route('password.update') }}" id="resetPass">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-group has-feedback">
                    <label for="">Email:</label>
                    <input id="email"
                           type="hidden"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email', $email) }}"
                           autocomplete="email"
                    >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <div class="text-danger">{{ $message }}</div>
                        </span>
                    @enderror
                    <p>{{ $email ?? old('email') }}</p>
                </div>
                <div class="form-group has-feedback">
                    <label for="">Mật khẩu mới:</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           autocomplete="new-password"
                           placeholder="Nhập mật khẩu mới"
                           autofocus
                    >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="">Xác nhận khẩu mới:</label>
                    <input id="password-confirm"
                           type="password"
                           class="form-control"
                           name="password_confirmation"
                           autocomplete="new-password"
                           placeholder="Xác nhận mật khẩu mới"
                    >
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                        <button type="submit" class="btn btn-primary btn-flat">Đặt lại mật khẩu</button>
                        <a href="{{ route('login') }}" class="btn btn-warning btn-flat">Hủy</a>
                    </div>
                </div>
                <div class="row">
                    <div style="text-align: center; padding: 20px 0">
                        <a href="/">Trang chủ</a>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //validate
            $("#resetPass").validate({
                rules: {
                    password: {
                      required: true,
                      minlength: 8
                    },
                    password_confirmation: {
                      equalTo: password
                    },
                },
                messages: {
                    password: {
                      required: "*Mục này không được để trống",
                      minlength: "*Yêu cầu mật khẩu tối thiểu 8 ký tự",
                    },
                    password_confirmation: {
                      equalTo: "*Nhập lại mật khẩu không đúng"
                    },
                }
            });
        });
    </script>
@endsection
