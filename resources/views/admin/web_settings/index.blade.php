@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thông tin
            <small>website</small>
        </h1>
    </section>
    {{--  content  --}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('web-settings.update', 1) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="web_settings">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img class="profile-user-img img-responsive img-web_settings"
                                     src="upload/images/web_settings/{{ $item->logo }}"
                                     id="proImg"
                                     alt="User profile picture">
                            </div>
                            <div class="form-group">
                                <label>Logo</label><span class="text-danger">*</span>
                                <input type="file" class="form-control" name="avatar" id="avatar">
                                @if($errors->first('avatar'))
                                    <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                @endif
                            </div>

                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Số điện thoại</label><span class="text-danger">*</span>
                                <input type="text" class="form-control"
                                       value="{{ old('phone_number', $item->phone_number)}}"
                                       name="phone_number"
                                       placeholder="VD: 0987654321"
                                       id="phone_number">
                                @if($errors->first('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('email', $item->email) }}"
                                       name="email"
                                       placeholder="VD: example@gmail.com"
                                       id="email">
                                @if($errors->first('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('address', $item->address) }}"
                                       name="address"
                                       placeholder="VD: example@gmail.com"
                                       id="address">
                                @if($errors->first('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giờ mở cửa</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('open_time', $item->open_time)}}"
                                       name="open_time"
                                       placeholder="VD: 7:00 AM"
                                       id="open_time">
                                @if($errors->first('open_time'))
                                    <span class="text-danger">{{ $errors->first('open_time') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Giờ đóng cửa</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('close_time', $item->close_time)}}"
                                       name="close_time"
                                       placeholder="VD: 20:00"
                                       id="close_time">
                                @if($errors->first('close_time'))
                                    <span class="text-danger">{{ $errors->first('close_time') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn trang facebook</label><span class="text-danger">*</span>
                                <textarea name="facebook"
                                          cols="30"
                                          rows="7"
                                          class="form-control">{{ old('facebook', $item->facebook) }}</textarea>
                                @if($errors->first('facebook'))
                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu ngắn</label><span class="text-danger">*</span>
                                <textarea name="introduction"
                                          cols="30"
                                          rows="7"
                                          class="form-control">{{ old('introduction', $item->introduction) }}</textarea>
                                @if($errors->first('introduction'))
                                    <span class="text-danger">{{ $errors->first('introduction') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('admin.index') }}" class="btn btn-default">
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
            var inputImage = document.querySelector(`[name="avatar"]`);
            inputImage.onchange = function () {
                var file = this.files[0];
                if (file == undefined) {
                    document.querySelector('#proImg').src = 'upload/images/users/avatar-default.png';
                } else {
                    getBase64(file, '#proImg');
                }
            }

            //validate
            $("#web_settings").validate({
                rules: {
                    avatar: {
                        extension: "jpg|jpeg|png|gif"
                    },
                    phone_number: {
                        required: true,
                        phoneNumberVietNam: true,
                        maxlength: 11
                    },
                    email: {
                        required: true,
                        emailGood: true,
                        maxlength: 200
                    },
                    open_time: {
                        required: true,
                        maxlength: 50
                    },
                    close_time: {
                        required: true,
                        maxlength: 50
                    },
                    address: {
                        required: true,
                        maxlength: 200
                    },
                    facebook: {
                        required: true,
                        maxlength: 300
                    },
                    introduction: {
                        required: true,
                        maxlength: 200
                    },
                },

                messages: {
                    avatar: {
                        extension: "Chỉ chấp nhận ảnh JPG, JPEG, PNG, GIF"
                    },
                    phone_number: {
                        required: "Mục này không được để trống",
                        maxlength: "Không được vượt quá 11 ký tự"
                    },
                    email: {
                        required: "Mục này không được để trống",
                        maxlength: "Không được vượt quá 200 ký tự"
                    },
                    open_time: {
                        required: "Mục này không được để trống",
                        maxlength: "Không được vượt quá 50 ký tự"
                    },
                    close_time: {
                        required: "Mục này không được để trống",
                        maxlength: "Không được vượt quá 50 ký tự"
                    },
                    address: {
                        required: true,
                        maxlength: "Không được vượt quá 200 ký tự"
                    },
                    facebook: {
                        required: true,
                        maxlength: "Không được vượt quá 300 ký tự"
                    },
                    introduction: {
                        required: true,
                        maxlength: "Không được vượt quá 200 ký tự"
                    },
                }
            });
        });
    </script>
@endsection
