@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thêm
            <small>phản hồi</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('feedbacks.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="addFeedbacks">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img style="width: 130px;" class="profile-user-img img-responsive img-circle"
                                     src="upload/images/feedbacks/feedback-default.png"
                                     alt="User profile picture"
                                     id="proImg"
                                >
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label><span class="text-danger">*</span>
                                <input type="file" class="form-control" name="image" id="image">
                                @if($errors->first('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ và tên</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}"
                                       value="{{ old('full_name') }}"
                                       name="full_name"
                                       id="full_name">
                                @if($errors->first('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Nội dung</label><span class="text-danger">*</span>
                                <textarea name="content" id="" class="form-control"
                                          rows="9">{{old('content')}}</textarea>

                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('feedbacks.index') }}"
                       class="btn btn-default"
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
            var inputImage = document.querySelector(`[name="image"]`);
            inputImage.onchange = function () {
                var file = this.files[0];
                if (file == undefined) {
                    document.querySelector('#proImg').src = 'upload/images/feedbacks/feedback-default.png';
                } else {
                    getBase64(file, '#proImg');
                }
            }

            //validate
            $("#addFeedbacks").validate({
                rules: {
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png",
                        fileSize : 2097152,
                    },
                    full_name: {
                        required: true,
                        onlyVietnamese: true,
                        maxlength: 100
                    },
                    content: {
                        required: true,
                        maxlength: 300
                    }
                },

                messages: {
                    image: {
                        extension: "*Chỉ chấp nhận ảnh JPG, JPEG, PNG",
                        fileSize: "*Kích thước ảnh không được quá 2MB "
                    },
                    full_name: {
                        maxlength: "*Không được vượt quá 100 ký tự",
                    },
                    content: {
                        maxlength: "*Không được vượt quá 300 ký tự",
                    }
                }
            });
        });
    </script>
@endsection
