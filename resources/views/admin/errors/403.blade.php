@extends('admin.layouts.index')
@section('content')
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-danger"></i>Cấm truy cập.</h3>

                <p>
                    Quay lại <a href="{{ route('admin.index') }}">bảng điều khiển</a> .
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
@endsection
