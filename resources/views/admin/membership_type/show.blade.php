@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Sửa
            <small>loại thành viên</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('membership_type.update', $membership_type->id) }}"
                  method="POST"
                  id="membership_type"
            >
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label>Tên</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('title', $membership_type->title )}}"
                                       name="title"
                                       placeholder="Nhập tên">
                                @if($errors->first('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="description"
                                          cols="30"
                                          rows="5"
                                          class="form-control"
                                          placeholder="Nhập mô tả"
                                >{{ old('description', $membership_type->description) }}</textarea>
                                @if($errors->first('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mức tiền(VND)</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       name="money_level"
                                       placeholder="Nhập mức tiền"
                                       value="{{ old('money_level', $membership_type->money_level) }}"
                                >
                                @if($errors->first('money_level'))
                                    <span class="text-danger">{{ $errors->first('money_level') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mức chiết khấu(%)</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       name="discount_level"
                                       placeholder="Nhập mức chiết khấu"
                                       value="{{ old('discount_level', $membership_type->discount_level) }}"
                                >
                                @if($errors->first('discount_level'))
                                    <span class="text-danger">{{ $errors->first('discount_level') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('membership_type.index') }}" class="btn btn-default">
                        <i class="fa fa-arrow-circle-o-left"></i>
                        Trở về
                    </a>
                    <button type="submit" class="btn btn-success ">
                        <i class="fa fa-save"></i>
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //validate
            $("#membership_type").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 1,
                        maxlength: 100
                    },
                    description: {
                        minlength: 10,
                        maxlength: 200
                    },
                    money_level: {
                        required: true,
                        min:0,
                        max:1000000000
                    },
                    discount_level: {
                        required: true,
                        number: true,
                        min:0,
                        max:100
                    }
                },

                messages: {
                    title: {
                        required: "Mục này không được để trống",
                        minlength: "Yêu cầu từ 1-100 ký tự",
                        maxlength: "Yêu cầu từ 1-100 ký tự",
                    },
                    description: {
                        minlength: "Yêu cầu từ 10-200 ký tự",
                        maxlength: "Yêu cầu từ 10-200 ký tự",
                    },
                    money_level: {
                        required: "Mục này không được để trống",
                        number: true,
                        min: "Yêu cầu giá trị từ 0 - 1.000.000.000",
                        max: "Yêu cầu giá trị từ 0 - 1.000.000.000",
                    },
                    discount_level: {
                        required: "Mục này không được để trống",
                        number: true,
                        min: "Yêu cầu giá trị từ 0 - 100",
                        max: "Yêu cầu giá trị từ 0 - 100",
                    }
                }
            });
        });
    </script>
@endsection