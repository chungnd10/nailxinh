@extends('admin.layouts.auth.index_auth')
@section('content')
    <title>Đặt lại mật khẩu</title>
    <div class="col-md-6 col-md-offset-3 panel-style">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>
                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                        Quên mật khẩu
                    </strong></h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('password.email') }}" id="sendMail">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!session('status'))
                        <div class="alert alert-info">
                            <b>*</b> Nhập địa chỉ email của bạn để nhận liên kết đặt lại mật khẩu.
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email"
                               type="text"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"
                               autocomplete="email"
                               autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <div class="text-danger" style="margin-top: 15px">
                                {{ $message }}
                            </div>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;&nbsp;
                            Gửi liên kết
                        </button>
                        <div style="text-align: center; padding: 20px 0">
                            <a href="{{ route('login') }}">Đăng nhập</a> | <a href="/">Trang chủ</a>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //validate
            $("#sendMail").validate({
                rules: {
                    email: {
                        required: true,
                        emailGood: true
                    },
                },
                messages: {
                    email: {
                        required: "*Mục này không được để trống",
                    }
                }
            });
        });
    </script>
@endsection
