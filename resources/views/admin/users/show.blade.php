@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Chỉnh sửa
            <small>người dùng</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Thông tin cơ bản</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Đặt lại mật khẩu</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <form action="{{route('users.update', $user->id)}}"
                          method="POST"
                          enctype="multipart/form-data"
                          id="updateUser"
                    >
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img class="profile-user-img img-responsive img-circle"
                                             src="upload/images/users/{{$user->avatar}}"
                                             alt="User profile picture"
                                             id="proImg"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label><span class="text-danger">*</span>
                                        <input type="file" class="form-control" name="avatar">
                                        @if($errors->first('avatar'))
                                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Họ tên</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('full_name', $user->full_name)}}"
                                               name="full_name">
                                        @if($errors->first('full_name'))
                                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                        @if($errors->first('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Ngày sinh</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('birthday', $user->birthday)}}"
                                               name="birthday"
                                               id="birthday"
                                               data-date-format='yyyy-mm-dd'
                                        >
                                        @if($errors->first('birthday'))
                                            <span class="text-danger">{{ $errors->first('birthday') }}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Địa chỉ</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('address', $user->address)}}"
                                               name="address">
                                        @if($errors->first('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email:</label><span class="text-danger"></span>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Số điện thoại</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('phone_number', $user->phone_number)}}"
                                               name="phone_number">
                                        @if($errors->first('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Chi nhánh</label><span class="text-danger">*</span>
                                        <select name="branch_id" class="form-control">
                                            @foreach($branchs as $item)
                                                <option value="{{ $item->id }}"
                                                        @if($user->branch_id == $item->id)
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
                                        <select name="role_id" id="" class="form-control">
                                            @foreach($roles as $item)
                                                <option value="{{ $item->id }}"
                                                        @if($user->role_id == $item->id)
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
                                                   @if($user->gender_id == $item->id)
                                                   checked
                                                    @endif
                                            >&nbsp;&nbsp;
                                            @if($errors->first('gender_id'))
                                                <span class="text-danger">{{ $errors->first('gender_id') }}</span>
                                            @endif
                                            {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Trạng thái hoạt dộng</label><span class="text-danger">*</span><br>
                                        <label class="switch">
                                            <input type="checkbox"
                                                   name="operation_status_id"
                                                   class="operation_status_id"
                                                   data-id="{{ $user->id }}"
                                                   {{ $user->operation_status_id == config('contants.operation_status_active') ? 'checked' : ''}}
                                            >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{ route('users.index') }}" class="btn btn-default">
                                <i class="fa fa-arrow-circle-o-left"></i>
                                Trở về
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>
                                Lưu
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('set.password',$user->id )}}"
                                  method="post"
                                  class="form-horizontal"
                                  id="setPassword"
                            >
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            Mật khẩu mới
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-5">
                                            <input type="password"
                                                   name="password"
                                                   id="password"
                                                   class="form-control"
                                                   placeholder="Mật khẩu mới">
                                            @if($errors->first('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nhập lại mật khẩu mới
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-5">
                                            <input type="password" name="cf_password" class="form-control"
                                                   placeholder="Nhập lại mật khẩu mới">
                                            @if($errors->first('cf-password'))
                                                <span class="text-danger">{{ $errors->first('cf-password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <a href="{{ route('users.index') }}" class="btn btn-default">
                                        <i class="fa fa-arrow-circle-o-left"></i>
                                        Trở về
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-save"></i>
                                        Lưu
                                    </button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.tab-content -->
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
                    document.querySelector('#proImg').src = 'upload/images/users/{{ $user->avatar }}';
                } else {
                    getBase64(file, '#proImg');
                }
            };

            //Date picker
            $('#birthday').datepicker({
                autoclose: true,
                dateFormat: 'yyyy-mm-dd'
            });

            //validate update user
            $("#updateUser").validate({
                rules: {
                    avatar: {
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
                    branch_id: "required",
                    role_id: "required",
                    gender_id: "required",
                },

                messages: {
                    avatar: {
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
                    branch_id: "Mục này không được để trống",
                    role_id: "Mục này không được để trống",
                    gender_id: "Mục này không được để trống",
                }
            });

            //validate
            $("#setPassword").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 40,
                    },
                    cf_password: {
                        equalTo: password
                    },
                },
                messages: {
                    password: {
                        required: "Mục này không được để trống",
                        minlength: "Yêu cầu từ 6-40 ký tự",
                        maxlength: "Yêu cầu từ 6-40 ký tự",
                    },
                    cf_password: {
                        equalTo: "Nhập lại mật khẩu không đúng"
                    }
                }
            });
            //end validate

            // change status
            $('.operation_status_id').change(function () {
                var operation_status_id = $(this).prop('checked') === true ? "{{ config('contants.operation_status_active') }}" : "{{ config('contants.operation_status_inactive') }}";
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('users.change-status') }}",
                    data: {'operation_status_id': operation_status_id, 'id': id},
                    success: function (data) {
                        console.log(data.success)
                    }
                });
            })
            //end change status

        });
    </script>
@endsection
