@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thêm
            <small>quy trình</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('process-type-services.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="addProcess">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dịch vụ</label><span class="text-danger">*</span>
                                <select name="service_id"
                                        id="service_id"
                                        class="form-control"
                                >
                                    <option value="">Chọn dịch vụ</option>
                                    @foreach($services as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == old('service_id'))
                                                selected
                                                @endif
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('service_id'))
                                    <span class="text-danger">{{ $errors->first('service_id') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group result-process" id="result">
                            </div><!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bước</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('step') }}"
                                       name="step"
                                       id="step"
                                       placeholder="VD: 1"
                                >
                                @if($errors->first('step'))
                                    <span class="text-danger">{{ $errors->first('step') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tên quy trình</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('name') }}"
                                       name="name"
                                       id="name"
                                       placeholder="VD: VỆ SINH MÓNG VÀ NHẶT DA"
                                >
                                @if($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả</label><span class="text-danger">*</span>
                                <textarea name="content"
                                          class="form-control"
                                          cols="30"
                                          rows="10"
                                          placeholder="Nhập mô tả"
                                >{{ old('content') }}</textarea>
                                @if($errors->first('content'))
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('process-type-services.index') }}"
                       class="btn btn-default"
                       onclick="return confirmmBack()">
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
            $("#addProcess").validate({
                rules: {
                    service_id: {
                        required: true,
                    },
                    name: {
                        required: true,
                        minlength: 1,
                        maxlength: 100
                    },
                    step: {
                        required: true,
                        number: true,
                        min: 1,
                        max: 100
                    },
                    content: {
                        required: true,
                        maxlength: 200
                    }
                },
                messages: {
                    name: {
                        minlength: "*Yêu cầu từ 1-100 ký tự",
                        maxlength: "*Yêu cầu từ 1-100 ký tự",
                    },
                    step: {
                        min: "*Yêu cầu giá trị từ 1-100 ",
                        max: "*Yêu cầu giá trị từ 1-100 "
                    },
                    content: {
                        maxlength: "*Không được vượt quá 200 ký tự"
                    }
                }
            });

            // ajax get process with type services
            $('#service_id').change(function () {
                var service_id = $('#service_id').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('get-procces-with-services') }}",
                    method: 'POST',
                    data: {
                        service_id: service_id
                    },
                    success: function (data) {
                        $("#result").html('');
                        if (data.length == 0) {
                            $(".result-process").append(
                                "<span class='text-warning'>*Dịch vụ này chưa có quy trình nào!</span>"
                            );
                        } else {
                            $(".result-process").append(
                                "<label>Các quy trình của dịch vụ</label><br>"
                            );
                            $.each(data, function (key, value) {
                                $("#result").append(
                                    "<button type='button' class='btn btn-warning' data-toggle='modal' data-target=#modal" + value.step + ">"
                                    + "<b>" + value.step + "</b>"
                                    + "</button>&nbsp;&nbsp;"
                                    + "<div class='modal fade' id=modal" + value.step + " style=display: none;>"
                                    + "<div class='modal-dialog'>"
                                    + "<div class='modal-content'>"
                                    + "<div class='modal-header'>"
                                    + "<h4 class='modal-title'>" + "BƯỚC " + value.step + ":&nbsp;&nbsp;" + value.name + "</h4>"
                                    + "</div>"
                                    + "<div class='modal-body'>"
                                    + "<p>" + value.content + "</p>"
                                    + "</div>"
                                    + "<div class='modal-footer'>"
                                    + "<button type='button' class='btn btn-default pull-right' data-dismiss='modal'>Đóng"
                                    + "</button>"
                                    + "</div>"
                                    + "</div>"
                                    + "</div>"
                                    + "</div>"
                                );
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
