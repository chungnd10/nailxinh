@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Sửa
            <small>dịch vụ</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data"
                  id="addService">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ảnh dịch vụ</label><span class="text-danger">*</span>
                                <img style="width: 100px;" class="profile-user-img img-responsive img-circle"
                                     src="upload/images/service/{{ $service->image }}"
                                     id="proImg"
                                     alt=""
                                >
                            </div>
                            <div class="form-group">
                                <input type="file"
                                       class="form-control"
                                       name="image"
                                       id="image"
                                >
                                @if($errors->first('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tên dịch vụ</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('name', $service->name) }}"
                                       name="name"
                                >
                                @if($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Giá(VND)</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('price', $service->price) }}"
                                       name="price"
                                       id="price">
                                @if($errors->first('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loại dịch vụ</label><span class="text-danger">*</span>
                                <select name="type_of_services_id"
                                        id="type_of_services_id"
                                        class="form-control"
                                >
                                    @foreach($type_of_services as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == old('type_of_services_id', $service->type_of_services_id))
                                                selected
                                                @endif
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('type_of_services_id'))
                                    <span class="text-danger">{{ $errors->first('type_of_services_id') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Thời gian hoàn thành</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('completion_time', $service->completion_time) }}"
                                       name="completion_time"
                                       id="completion_time"
                                >
                                @if($errors->first('completion_time'))
                                    <span class="text-danger">{{ $errors->first('completion_time') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="description"
                                          class="form-control"
                                          cols="30"
                                          rows="8">{{ old('description', $service->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('services.index') }}" class="btn btn-default">
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

            //display image
            var inputImage = document.querySelector(`[name="image"]`);
            inputImage.onchange = function () {
                var file = this.files[0];
                if (file == undefined) {
                    document.querySelector('#proImg').src = 'upload/images/service/{{ $service->image }}';
                } else {
                    getBase64(file, '#proImg');
                }
            };

            //validate
            $("#addService").validate({
                rules: {
                    type_of_services_id: {
                        required: true,
                    },
                    image: {
                        extension: "jpg|jpeg|png"
                    },
                    name: {
                        required: true,
                        maxlength: 100
                    },
                    price: {
                        required: true,
                        number: true,
                        min: 1,
                        max: 1000000000
                    },
                    completion_time: {
                        required: true,
                        maxlength: 100
                    },
                    description: {
                        maxlength: 300
                    }
                },

                messages: {
                    type_of_services_id: {
                        required: "Mục này không được để trống",
                    },
                    image: {
                        extension: "Chỉ chấp nhận ảnh JPG, JPEG, PNG"
                    },
                    name: {
                        required: "Mục này không được để trống",
                        maxlength: "Không được vượt quá 100 ký tự",
                    },
                    price: {
                        required: "Mục này không được để trống",
                        number: "Giá dịch vụ phải là số",
                        min: "Yêu cầu giá trị từ 1-1.000.000.000",
                        max: "Yêu cầu giá trị từ 1-1.000.000.000",
                    },
                    completion_time: {
                        required: "Mục này không được để trống",
                        maxlength: "Không được vượt quá 100 ký tự",
                    },
                    description: {
                        maxlength: "Không được vượt quá 300 ký tự",
                    }
                }
            });
        });
    </script>
@endsection
