@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thêm
            <small>loại thành viên</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('membership_type.store') }}"
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
                                       value="{{ old('title')}}"
                                       name="title"
                                       placeholder="Nhập tên">
                                @if($errors->first('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mức tiền(VND)</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       name="money_level"
                                       placeholder="Nhập mức tiền"
                                       value="{{ old('money_level') }}"
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
                                       value="{{ old('discount_level') }}"
                                >
                                @if($errors->first('discount_level'))
                                    <span class="text-danger">{{ $errors->first('discount_level') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="description"
                                          cols="30"
                                          rows="5"
                                          class="form-control"
                                          placeholder="Nhập mô tả"
                                >{{ old('description') }}</textarea>
                                @if($errors->first('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('membership_type.index') }}"
                       class="btn btn-default"
                       onclick="return confirmmBack()"
                    >
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
                        maxlength: 100
                    },
                    description: {
                        maxlength: 200
                    },
                    money_level: {
                        required: true,
                        number: true,
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
                        maxlength: "*Không được vượt quá 100 ký tự",
                    },
                    description: {
                        maxlength: "*Không được vượt quá 200 ký tự",
                    },
                    money_level: {
                        min: "*Yêu cầu giá trị từ 0 - 1.000.000.000",
                        max: "*Yêu cầu giá trị từ 0 - 1.000.000.000",
                    },
                    discount_level: {
                        min: "*Yêu cầu giá trị từ 0 - 100",
                        max: "*Yêu cầu giá trị từ 0 - 100",
                    }
                }
            });
        });
    </script>
@endsection
