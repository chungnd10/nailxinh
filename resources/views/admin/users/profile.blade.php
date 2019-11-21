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
                            <label class="label" data-toggle="tooltip" title="Change your avatar">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <img class="rounded profile-user-img img-responsive img-circle" id="avatar"
                                         src="upload/images/users/{{ $user->avatar }}" alt="avatar">
                                    <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                                </form>
                            </label>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                </div>
                            </div>
                            <div class="alert" role="alert"></div>
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Cắt và tải lên ảnh</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="img-container">
                                                <img id="image"
                                                     src="upload/images/users/{{ $user->avatar }}"
                                                     height="240"
                                                     width="100%">
                                            </div>
                                            <div class="preview"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Hủy
                                            </button>
                                            <button type="button" class="btn btn-primary" id="crop">Cắt & tải lên
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <li class="active" id="li_tab_1"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Thông
                                tin</a>
                        </li>
                        <li class="" id="li_tab_2"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Đổi mật
                                khẩu</a>
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
                                        <a href="{{ route('admin.index') }}"
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
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <form class="form-horizontal"
                                          action="{{route('changePassword',$user->id )}}"
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
                                            <a href="{{ route('admin.index') }}"
                                               class="btn btn-default"
                                               onclick="return confirmmBack()"
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
            $("#updateImageProfile").validate({
                rules: {
                    avatar: {
                        required: true,
                        extension: "*jpg|jpeg|png",
                        fileSize : 2097152,
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
                    phone_number: {
                    },
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
            if (window.location.hash == '#tab_2') {
                $('#li_tab_1').removeClass('active');
                $('#tab_1').removeClass('active');
                $('#li_tab_2').addClass('active');
                $('#tab_2').addClass('active');
            }
            ;
            // end remove active class
        });
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var avatar = document.getElementById('avatar');
            var image = document.getElementById('image');
            var input = document.getElementById('input');
            var $progress = $('.progress');
            var $progressBar = $('.progress-bar');
            var $alert = $('.alert');
            var $modal = $('#modal');
            var cropper;

            $('[data-toggle="tooltip"]').tooltip();

            input.addEventListener('change', function (e) {
                var files = e.target.files;
                var done = function (url) {
                    input.value = '';
                    image.src = url;
                    $alert.hide();
                    $modal.modal('show');
                };
                var reader;
                var file;
                var url;

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
                    // checkCrossOrigin: true,
                    autoCrop: true,
                    autoCropArea: 1,
                    responsive: true,
                    background: false,
                    zoomOnTouch: true,
                    viewMode: 2,
                    dragMode: 'move',
                    aspectRatio: 1 / 1,
                    minContainerWidth: 320,
                    maxContainerHeight: 180,
                    built: function () {
                        $toCrop.cropper("setCropBoxData", {width: "200", height: "200"});
                    }
                });
            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            document.getElementById('crop').addEventListener('click', function () {
                var initialAvatarURL;
                var canvas;

                $modal.modal('hide');

                if (cropper) {
                    canvas = cropper.getCroppedCanvas({
                        width: 300,
                        height: 300,
                        minWidth: 300,
                        minHeight: 300,
                        maxWidth: 600,
                        maxHeight: 600,
                    });
                    initialAvatarURL = avatar.src;
                    avatar.src = canvas.toDataURL();
                    $progress.show();
                    $alert.removeClass('alert-success alert-warning');
                    canvas.toBlob(function (blob) {
                        var formData = new FormData();
                        console.log(formData);
                        formData.append('avatar', blob);

                        $.ajax("{{ route('users.change-image-profile', $user->id)}}", {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            method: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,

                            xhr: function () {
                                var xhr = new XMLHttpRequest();

                                xhr.upload.onprogress = function (e) {
                                    var percent = '0';
                                    var percentage = '0%';

                                    if (e.lengthComputable) {
                                        percent = Math.round((e.loaded / e.total) * 100);
                                        percentage = percent + '%';
                                        $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                                    }
                                };

                                return xhr;
                            },
                            success: function () {
                                $alert.show().addClass('alert-success').text('Upload success');
                            },

                            error: function () {
                                avatar.src = initialAvatarURL;
                                $alert.show().addClass('alert-warning').text('Upload error');
                            },
                            complete: function () {
                                $progress.hide();
                            },
                        });

                    });
                }

            });

            // end
            function each(arr, callback) {
                var length = arr.length;
                var i;
                for (i = 0; i < length; i++) {
                    callback.call(arr, arr[i], i, arr);
                }
                return arr;
            }

        });
    </script>
@endsection
