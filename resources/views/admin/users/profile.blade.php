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
            <form class="form-horizontal"
                                  action="{{ route('profile', Hashids::encode($user->id)) }}"
                                  method="POST"
                                  enctype="multipart/form-data"
                                  id="updateInfoProfile"
            >
            @csrf
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <ul class="list-group list-group-unbordered list-group-border-top">
                            <div class="form-group">
                                <label class="label" data-toggle="tooltip" title="Thay đổi ảnh">
                                    <img style="width: 50%;" class="rounded profile-user-img img-responsive img-circle"
                                         id="avatar"
                                         src="upload/images/users/{{ $user->avatar }}" alt="avatar">
                                    <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                                </label>
                                <span class="alert"></span>
                                <input type="hidden" class="form-control" name="avatar_hidden" id="avatar_hidden">
                                @if($errors->first('avatar_hidden'))
                                    <span class="text-danger">{{ $errors->first('avatar_hidden') }}</span>
                                @endif
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                     aria-labelledby="modalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">Cắt ảnh</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="img-container">
                                                    <img id="image"
                                                         src="upload/images/users/{{ $user->avatar }}"
                                                         height="300"
                                                         width="100%">
                                                </div>
                                                <div class="preview"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary" id="crop">Cắt
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <h3 class="profile-username text-center">{{ $user->full_name }}</h3>
                        <p class="text-muted text-center">{{ $user->role->name }}</p>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active" id="li_tab_1"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Thông
                                tin</a>
                        </li>
                        <li class="" id="li_tab_2"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Đổi mật
                                khẩu</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Họ tên<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('full_name', $user->full_name)}}"
                                           name="full_name">
                                    @if($errors->first('full_name'))
                                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                    @endif
                                </div>
                                <label class="col-sm-2 control-label">Email <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ngày sinh<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text"
                                           class="form-control"
                                           value="{{ old('birthday', $user->birthday)}}"
                                           name="birthday"
                                           data-date-format='yyyy-mm-dd'
                                           id="birthday">
                                    @if($errors->first('birthday'))
                                        <span class="text-danger">{{ $errors->first('birthday') }}</span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">Chi nhánh<span
                                            class="text-danger">*</span></label>
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
                                            <p>{{ $user->branch->name. ', '.$user->branch->address }}</p>
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
                                <label class="col-sm-2 control-label">Quyền<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    @if(Auth::check())
                                        <p>{{ $user->role->name }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Giới tính<span
                                            class="text-danger">*</span></label>
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
                                <label class="col-sm-2 control-label">Trạng thái<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <p>{{ $user->operationStatus->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Địa chỉ<span
                                            class="text-danger">*</span></label>
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
                                    <a href="{{ url()->previous() }}"
                                       class="btn btn-default"
                                    >
                                        <i class="fa fa-arrow-circle-o-left"></i>
                                        Trở về
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-save"></i>
                                        Cập nhật
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <form class="form-horizontal"
                                          action="{{route('change-password',Hashids::encode($user->id) )}}"
                                          method="post"
                                          id="changePassword"
                                    >
                                        @csrf
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Mật khẩu cũ
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="password" name="old_password" class="form-control"
                                                           placeholder="Mật khẩu cũ">
                                                    @if($errors->first('old_password'))
                                                        <span class="text-danger">
                                                            {{ $errors->first('old_password') }}
                                                        </span>
                                                    @endif
                                                    @if(session()->has('old_password'))
                                                        <span class="text-danger">
                                                            {{ session('old_password') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    Mật khẩu mới
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="password" name="password" id="password"
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
                                                    @if($errors->first('cf_password'))
                                                        <span class="text-danger">{{ $errors->first('cf_password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <a href="{{ url()->previous() }}"
                                               class="btn btn-default"
                                            >
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

            //Date picker
            $('#birthday').datepicker({
                autoclose: true,
                dateFormat: 'yyyy-mm-dd'
            });

            //validate update user
            $("#updateImageProfile").validate({
                rules: {
                    avatar: {
                        required: true,
                        extension: "*jpg|jpeg|png",
                        fileSize: 2097152,
                    },
                },

                messages: {
                    avatar: {
                        extension: "*Chỉ chấp nhận ảnh JPG, JPEG, PNG",
                        fileSize: "*Kích thước ảnh không được quá 2MB "
                    }
                }
            });

            //validate update infomation
            $("#updateInfoProfile").validate({
                rules: {
                    full_name: {
                        required: true,
                        maxlength: 100,
                        onlyVietnamese: true
                    },
                    phone_number: {
                        required: true,
                        phoneNumberVietNam: true
                    },
                    birthday: "required",
                    address: {
                        required: true,
                        maxlength: 200
                    },
                },

                messages: {
                    full_name: {
                        maxlength: "*Không được nhập quá 100 ký tự",
                    },
                    phone_number: {},
                    birthday: "*Mục này không được để trống",
                    address: {
                        maxlength: "*Không được nhập quá 200 ký tự",
                    },
                }
            });

            //validate
            $("#changePassword").validate({
                rules: {
                    old_password: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 40,
                    },
                    cf_password: {
                        equalTo: password
                    },
                },
                messages: {
                    password: {
                        minlength: "*Yêu cầu từ 8-40 ký tự",
                        maxlength: "*Yêu cầu từ 8-40 ký tự",
                    }
                }
            });
            //end validate

            // remove active class
            if (window.location.hash === '#tab_2') {
                $('#li_tab_1').removeClass('active');
                $('#tab_1').removeClass('active');
                $('#li_tab_2').addClass('active');
                $('#tab_2').addClass('active');
            }
            ;
            // end remove active class

        });
    </script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function () {
            let avatar = document.getElementById('avatar');
            let image = document.getElementById('image');
            let input = document.getElementById('input');
            let $alert = $('.alert');
            let $modal = $('#modal');
            let cropper;

            $('[data-toggle="tooltip"]').tooltip();

            input.addEventListener('change', function (e) {
                let files = e.target.files;
                let done = function (url) {
                    input.value = '';
                    image.src = url;
                    $alert.hide();
                    $modal.modal('show');
                };
                let reader;
                let file;

                if (files && files.length > 0) {
                    file = files[0];

                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function (e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $modal.on('shown.bs.modal', function () {
                cropper = new Cropper(image, {
                    modal: true,
                    autoCrop: true,
                    autoCropArea: 1,
                    responsive: true,
                    background: true,
                    zoomOnTouch: true,
                    viewMode: 2,
                    dragMode: 'move',
                    aspectRatio: 1 / 1,
                    built: function () {
                        $toCrop.cropper("setCropBoxData", {width: "320", height: "320"});
                    }
                });
            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            document.getElementById('crop').addEventListener('click', function () {
                let canvas;
                $modal.modal('hide');

                if (cropper) {
                    canvas = cropper.getCroppedCanvas({
                        width: 320,
                        height: 320,
                    });

                    avatar.src = canvas.toDataURL('image/jpeg');
                    $alert.removeClass('alert-success alert-warning');

                    $("#avatar_hidden").val(avatar.src);
                    $("#avatar_hidden-error").hide();
                }
            });
        });
    </script>
@endsection
