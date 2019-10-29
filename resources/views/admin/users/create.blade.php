@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thêm
            <small>người dùng</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="addUser">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img class="profile-user-img img-responsive img-circle"
                                     src="upload/images/users/avatar-default.png"
                                     id="proImg"
                                     alt="User profile picture">
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label><span class="text-danger">*</span>
                                <input type="file" class="form-control" name="avatar" id="avatar">
                                @if($errors->first('avatar'))
                                    <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('full_name')}}"
                                       name="full_name" placeholder="VD: Nguyễn Đức Chung" id="full_name">
                                @if($errors->first('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Số điện thoại</label><span class="text-danger">*</span>
                                <input type="text" class="form-control"
                                       value="{{ old('phone_number')}}"
                                       name="phone_number" placeholder="VD: 0987654321" id="phone_number">
                                @if($errors->first('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Ngày sinh</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('birthday')}}"
                                       name="birthday" id="datepicker" data-date-format='yyyy-mm-dd'
                                       placeholder="YYYY-MM-DD" id="birthday">
                                @if($errors->first('birthday'))
                                    <span class="text-danger">{{ $errors->first('birthday') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Địa chỉ</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('address')}}"
                                       name="address" placeholder="VD: 216 Cầu Giấy, Hà Nội" id="address">
                                @if($errors->first('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mật khẩu</label><span class="text-danger">*</span>
                                <input type="password" class="form-control" name="password" id="password">
                                @if($errors->first('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label><span class="text-danger">*</span>
                                <input type="password" class="form-control" name="cf-password" id="cfPassword">
                                @if($errors->first('cf-password'))
                                    <span class="text-danger">{{ $errors->first('cf-password') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Email</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('email')}}"
                                       name="email" placeholder="VD: example@gmail.com" id="email">
                                @if($errors->first('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Chi nhánh</label><span class="text-danger">*</span>
                                <select name="branch_id" id="branch_id" class="form-control">
                                    <option value="">Chọn chi nhánh</option>
                                    @foreach($branchs as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == old('branch_id'))
                                                selected
                                                @endif
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('branch_id'))
                                    <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Quyền</label><span class="text-danger">*</span>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Chọn quyền</option>
                                    @foreach($roles as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == old('role_id'))
                                                selected
                                                @endif
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('role_id'))
                                    <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Giới tính</label><span class="text-danger">*</span><br>
                                @foreach($genders as $item)
                                    <input type="radio"
                                           name="gender_id"
                                           value="{{ $item->id }}"
                                           @if($item->id == old('gender_id'))
                                           checked
                                            @endif
                                    >&nbsp;&nbsp;
                                    {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                                @if($errors->first('gender_id'))
                                    <span class="text-danger">{{ $errors->first('gender_id') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Trạng thái hoạt động</label><span class="text-danger">*</span><br>
                                @foreach($operation_status as $item)
                                    <input type="radio"
                                           name="operation_status_id"
                                           value="{{ $item->id }}"
                                           @if($item->id == old('operation_status_id'))
                                           checked
                                            @endif
                                    >&nbsp;&nbsp;
                                    {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                                @if($errors->first('operation_status_id'))
                                    <span class="text-danger">{{ $errors->first('operation_status_id') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('users.index') }}" class="btn btn-default">
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
            $("#addUser").validate({
                rules: {
                    avatar: {
                        required: true,
                        extension: "jpg|jpeg|png"
                    },
                    full_name: {
                        required: true,
                        minlength: 5,
                        maxlength: 40
                    },
                    phone_number: {
                        required: true,
                        phoneNumberVietNam: true
                    },
                    birthday: "required",
                    address: {
                        required: true,
                        minlength: 5,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 40,
                    },
                    cfPassword: {
                        required: true,
                        equalTo:password
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    branch_id: "required",
                    role_id: "required",
                    gender_id: "required",
                    operation_status_id: "required",
                },

                messages: {
                    avatar: {
                        required: "Mục này không được để trống",
                        extension: "Chỉ chấp nhận ảnh JPG, JPEG, PNG"
                    },
                    full_name: {
                        required: "Mục này không được để trống",
                        minlength: "Yêu cầu từ 5-40 ký tự",
                        maxlength: "Yêu cầu từ 5-40 ký tự",
                        alpha: "Mục này không được để trống"
                    },
                    phone_number: {
                        required: "Mục này không được để trống",
                    },
                    birthday: "Mục này không được để trống",
                    address: {
                        required: "Mục này không được để trống",
                        minlength: "Yêu cầu tối thiểu 5 ký tự",
                    },
                    password: {
                        required: "Mục này không được để trống",
                        minlength: "Yêu cầu từ 6-40 ký tự",
                        maxlength: "Yêu cầu từ 6-40 ký tự",
                    },
                    cfPassword: {
                        required: "Mục này không được để trống",
                        equalTo: "Nhập lại mật khẩu không đúng"
                    },
                    email: {
                        required: "Mục này không được để trống",
                        email: "Email không đúng định dạng"
                    },
                    branch_id: "Mục này không được để trống",
                    role_id: "Mục này không được để trống",
                    gender_id: "Mục này không được để trống",
                    operation_status_id: "Mục này không được để trống",
                }
            });


        });
    </script>
@endsection
