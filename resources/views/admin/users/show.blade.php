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
                <li class="active" id="li_tab_1"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Thông tin cơ
                        bản</a></li>
                <li class="" id="li_tab_2"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Đặt lại mật khẩu</a>
                </li>
                @if($user->role_id == config('contants.role_technician'))
                    <li class="" id="li_tab_3"><a href="#tab_3" data-toggle="tab" aria-expanded="false">Kỹ năng</a></li>
                @endif
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
                                    @if($user->role_id == config('contants.role_technician'))
                                        <div class="form-group">
                                            <label>Trạng thái hiển thị</label><span class="text-danger">*</span><br>
                                            @foreach($display_status as $item)
                                                <input type="radio"
                                                       name="display_status_id"
                                                       value="{{ $item->id }}"
                                                       @if($item->id == old('display_status_id', $user->display_status_id))
                                                       checked
                                                        @endif
                                                >&nbsp;&nbsp;
                                                {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @endforeach
                                            <br>
                                            <label id="display_status_id-error" class="error"
                                                   for="display_status_id"></label>
                                            @if($errors->first('display_status_id'))
                                                <span class="text-danger">{{ $errors->first('display_status_id') }}</span>
                                            @endif
                                        </div>
                                        <!-- /.form-group -->
                                    @endif
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email:</label><span class="text-danger"></span>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Chi nhánh</label><span class="text-danger">*</span>
                                        @if(Auth::user()->isAdmin())
                                            <select name="branch_id" id="branch_id" class="form-control">
                                                <option value="">Chọn chi nhánh</option>
                                                @foreach($branchs as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == old('branch_id'))
                                                            selected
                                                            @endif
                                                    >{{ $item->name.", ".$item->address }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <p>{{ $branchs }}</p>
                                        @endif
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
                                    </div><!-- /.form-group -->
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
                                        <br>
                                        <label id="gender_id-error" class="error" for="gender_id"></label>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Trạng thái hoạt động</label><span class="text-danger">*</span><br>
                                        @foreach($operation_status as $item)
                                            <input type="radio"
                                                   name="operation_status_id"
                                                   value="{{ $item->id }}"
                                                   @if($item->id == old('operation_status_id', $user->operation_status_id))
                                                   checked
                                                    @endif
                                            >&nbsp;&nbsp;
                                            {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                        <br>
                                        <label id="operation_status_id-error" class="error"
                                               for="operation_status_id"></label>
                                        @if($errors->first('operation_status_id'))
                                            <span class="text-danger">{{ $errors->first('operation_status_id') }}</span>
                                        @endif
                                    </div>

                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{ route('users.index') }}"
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
                                    <a href="{{ route('users.index') }}"
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
                @if($user->role_id == config('contants.role_technician'))
                    <div class="tab-pane" id="tab_3">
                        <form action="{{route('set.services',$user->id )}}"
                              method="post"
                              class="form-horizontal"
                        >
                            @csrf
                            <div class="box-body">
                                @foreach($type_services as $type_service)
                                    <div class="col-md-3">
                                        <div class="list-group">
                                            <div class="list-group-item active">
                                                <input type="checkbox"
                                                       name="type_services_id[]"
                                                       value="{{ $type_service->id }}"
                                                       @foreach($type_services_of_user as $item)
                                                       @if($item->type_of_service_id == $type_service->id)
                                                       checked
                                                        @endif
                                                        @endforeach
                                                >
                                                <label>{{ $type_service->name }}</label>
                                            </div>
                                            @foreach($type_service->showServices($type_service->id) as $service)
                                                <div class="checkbox list-group-item">
                                                    <label>
                                                        <input type="checkbox"
                                                               @foreach($services_of_user as $services_of_users)
                                                               @if($services_of_users->service_id == $service->id)
                                                               checked
                                                               @endif
                                                               @endforeach
                                                               name="services_id[]"
                                                               value="{{ $service->id }}"
                                                        >
                                                        {{ $service->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @if($type_service->showServices($type_service->id)->isEmpty())
                                                <div class="list-group-item">
                                                    <span class="text-danger">Không có dịch vụ nào</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="{{ route('users.index') }}"
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
                @endif
            </div>
            <!-- /.tab-content -->
        </div>
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
            $("#updateUser").validate({
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
                    branch_id: "required",
                    role_id: "required",
                    gender_id: "required",
                    operation_status_id: "required",
                },

                messages: {
                    full_name: {
                        maxlength: "*Không được vượt quá 100 ký tự",
                    },
                    phone_number: {},
                    address: {
                        maxlength: "*Không được vượt quá 200 ký tự",
                    }
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
                        minlength: "Yêu cầu từ 6-40 ký tự",
                        maxlength: "Yêu cầu từ 6-40 ký tự",
                    },
                    cf_password: {
                        equalTo: "Nhập lại mật khẩu không đúng"
                    }
                }
            });
            //end validate

            //active table
            if (window.location.hash === '#tab_2') {
                $('#li_tab_1').removeClass('active');//remove active class
                $('#tab_1').removeClass('active');
                $('#li_tab_2').addClass('active');
                $('#tab_2').addClass('active');
                $('#li_tab_3').removeClass('active');
                $('#tab_3').removeClass('active');
            }

            @if($user->role_id == config('contants.role_technician'))
                //active table
                if (window.location.hash === '#tab_3') {
                    $('#li_tab_1').removeClass('active');//remove active class
                    $('#tab_1').removeClass('active');
                    $('#li_tab_2').removeClass('active');
                    $('#tab_2').removeClass('active');
                    $('#li_tab_3').addClass('active');
                    $('#tab_3').addClass('active');
                }
            @endif

        });
    </script>
@endsection
