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
                    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
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
                                    </div>
                                    <div class="form-group">
                                        <label>Họ tên</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('full_name', $user->full_name)}}"
                                               name="full_name">
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Ngày sinh</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('birthday', $user->birthday)}}"
                                               name="birthday">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Địa chỉ</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('address', $user->address)}}"
                                               name="address">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Số điện thoại</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('phone_number', $user->phone_number)}}"
                                               name="phone_number">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Email</label><span class="text-danger">*</span>
                                        <input type="text"
                                               class="form-control"
                                               value="{{ old('email', $user->email)}}"
                                               name="email">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Chi nhánh</label><span class="text-danger">*</span>
                                        <select name="branch_id" id="" class="form-control">
                                            @foreach($branchs as $item)
                                                <option value="{{ $item->id }}"
                                                        @if($user->branch_id == $item->id)
                                                        selected
                                                        @endif
                                                >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
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
                                            {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Trạng thái hoạt dộng</label><span class="text-danger">*</span><br>
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
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{ route('users.index') }}" class="btn btn-warning">
                                <i class="fa fa-close"></i>
                                Hủy
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
                        <div class="col-md-4 col-md-offset-4">
                            <form action="{{route('set.password',$user->id )}}" method="post">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu mới</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <a href="{{ route('users.index') }}" class="btn btn-warning">
                                        <i class="fa fa-close"></i>
                                        Hủy
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
            }
        });
    </script>
@endsection
