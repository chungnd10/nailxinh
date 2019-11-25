@extends('admin.layouts.index')
@section('content')
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i>Không tìm thấy trang.</h3>

                <p>
                    Chúng tôi không thể tìm thấy trang bạn đang tìm kiếm. Trong khi đó,
                    bạn có thể quay lại <a href="{{ route('admin.index') }}">bảng điều khiển</a> .
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
@endsection
