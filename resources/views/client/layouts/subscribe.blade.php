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
                           id="email"
                           placeholder="Nhập email..."
                           value="{{ old('email') }}"
                    >
                    <button type="submit" id="submit">ĐĂNG KÝ</button>
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

            // validate swal
            $('#submit').click(function (e) {
                e.preventDefault();
                let form = $('#subscribe-form');
                if (form.valid()) {
                    jQuery.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    let email = $('#email').val();
                    jQuery.ajax({
                        url: "{{ route('subscribe') }}",
                        method: 'post',
                        data: {
                            email: email
                        },
                        success: function (data) {
                            if (data.errors) {
                                Swal.fire({
                                    type: 'error',
                                    title: data.errors
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Chúc mừng bạn đã đăng ký thành công !'
                                });
                                $('#email').val('');
                            }
                        }
                    });
                }
            });
        });


    </script>
@endsection

