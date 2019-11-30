<section id="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 text-lg-left text-center mb-lg-0 mb-3">
                <i class="ei ei-icon_mail"></i>
                <h3>ĐĂNG KÍ ĐỂ NHẬN TIN TỨC VÀ THEO DÕI</h3>
                <p>Nhập email để cùng NAILXINH nhận thông tin khi có khuyến mãi</p>
            </div>
            <div class="col-lg-5 col-md-12 text-center">
                <form id="subscribe-form" action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="email"
                           name="email"
                           id="subscribe"
                           placeholder="Nhập email..."
                           value="{{ old('email') }}"
                            >
                    @if($errors->first('email'))
                        <label id="error-email" class="error" >{{ $errors->first('email') }}</label>
                    @endif
                    <button type="submit">ĐĂNG KÝ</button>
                </form>
            </div>
        </div>
    </div>
</section>
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //validate
            $("#subscribe-form").validate({
            	rules: {
            		email: {
            			required: true,
						emailGood: true
            		},

            	},
            });
        });
    </script>
@endsection

