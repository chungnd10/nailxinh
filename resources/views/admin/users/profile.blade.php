@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Hồ sơ
            <small>người dùng</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="upload/images/users/{{ $user->avatar }}"
                             alt="User profile picture"
                             id="proImg"
                        >
                        <h3 class="profile-username text-center">{{ $user->full_name }}</h3>

                        <p class="text-muted text-center">{{ $user->role->name }}</p>

                        <ul class="list-group list-group-unbordered list-group-border-top">
                            <form action="{{ route('update-image-profile', $user->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data"
                                  id="updateImageProfile">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-camera-retro"></i> Cập nhật ảnh
                                </button>
                            </form>
                        </ul>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Thông tin</a>
                        </li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Đổi mật khẩu</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <form class="form-horizontal"
                                  action="{{ route('profile', $user->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data"
                                  id="updateInfoProfile"
                            >
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Họ tên<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('full_name', $user->full_name)}}"
                                               name="full_name">
                                        @if($errors->first('full_name'))
                                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                    </div>
                                    <label class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Ngày sinh<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('birthday', $user->birthday)}}"
                                               name="birthday"
                                               id="datepicker2">
                                        @if($errors->first('birthday'))
                                            <span class="text-danger">{{ $errors->first('birthday') }}</span>
                                        @endif
                                    </div>

                                    <label class="col-sm-2 control-label">Chi nhánh<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        @if(Auth::check())
                                            @if(Auth::user()->isAdmin())
                                                <select name="branch_id" class="form-control">
                                                    @foreach($branchs as $item)
                                                        <option value="{{ $item->id }}"
                                                                @if($user->branch_id == $item->id)
                                                                selected
                                                                @endif
                                                        >{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <p>{{ $user->branch->name }}</p>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">SĐT<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('phone_number', $user->phone_number)}}"
                                               name="phone_number">
                                        @if($errors->first('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                    <label class="col-sm-2 control-label">Quyền<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        @if(Auth::check())
                                            @if(Auth::user()->isAdmin())
                                                <p>{{ $user->role->name }}</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Giới tính<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        @foreach($genders as $item)
                                            <input type="radio"
                                                   name="gender_id"
                                                   value="{{ $item->id }}"
                                                   @if($user->gender_id == $item->id)
                                                   checked
                                                    @endif
                                            >&nbsp;&nbsp;
                                            {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    </div>
                                    <label class="col-sm-2 control-label">Trạng thái<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        @if(Auth::check())
                                            @if(Auth::user()->isAdmin())
                                                @foreach($operation_status as $item)
                                                    <input type="radio"
                                                           name="operation_status_id"
                                                           value="{{ $item->id }}"
                                                           @if($user->operation_status_id == $item->id)
                                                           checked
                                                            @endif
                                                    >&nbsp;&nbsp;
                                                    {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                @endforeach
                                            @else
                                                <p>{{ $user->operationStatus->name }}</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Địa chỉ<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('address', $user->address)}}"
                                               name="address">
                                        @if($errors->first('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a href="{{ route('admin.index') }}" class="btn btn-default">
                                            <i class="fa fa-arrow-circle-o-left"></i>
                                            Trở về
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-save"></i>
                                            Cập nhật
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <form class="form-horizontal"
                                          action="{{route('set.password',$user->id )}}"
                                          method="post">
                                        @csrf
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Mật khẩu cũ
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="password" name="old-password" class="form-control"
                                                           placeholder="Mật khẩu cũ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Mật khẩu mới
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="password" name="password" class="form-control"
                                                           placeholder="Mật khẩu mới">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Nhập lại mật khẩu mới
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="password" name="cf-password" class="form-control"
                                                           placeholder="Nhập lại mật khẩu mới">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <a href="{{ route('admin.index') }}" class="btn btn-default">
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
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

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
            $('#datepicker2').datepicker({
                autoclose: true,
                dateFormat: 'yyyy-mm-dd'
            });

            //validate update user
            $("#updateImageProfile").validate({
                rules: {
                    avatar: {
                        required: true,
                        extension: "jpg|jpeg|png"
                    },
                },

                messages: {
                    avatar: {
                        required: "Hãy chọn ảnh",
                        extension: "Chỉ chấp nhận ảnh JPG, JPEG, PNG"
                    }
                }
            });

            //validate update infomation
            //validate update user
            $("#updateInfoProfile").validate({
                rules: {
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
                },

                messages: {
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
                }
            });
        });
    </script>
@endsection