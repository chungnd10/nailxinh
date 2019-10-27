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
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="file" class="form-control" name="avatar">
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('full_name')}}"
                                       name="full_name" placeholder="VD: Nguyễn Đức Chung">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Số điện thoại</label><span class="text-danger">*</span>
                                <input type="text" class="form-control"
                                       value="{{ old('phone_number')}}"
                                       name="phone_number" placeholder="VD: 0987654321">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Ngày sinh</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('birthday')}}"
                                       name="birthday" id="datepicker" data-date-format='yyyy-mm-dd'
                                        placeholder="YYYY-MM-DD">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Địa chỉ</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('address')}}"
                                       name="address" placeholder="VD: 216 Cầu Giấy, Hà Nội">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mật khẩu</label><span class="text-danger">*</span>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label><span class="text-danger">*</span>
                                <input type="password" class="form-control" name="cf-password">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Email</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" value="{{ old('email')}}"
                                       name="email" placeholder="VD: example@gmail.com">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Chi nhánh</label><span class="text-danger">*</span>
                                <select name="branch_id" id="" class="form-control">
                                    <option value="">Chọn chi nhánh</option>
                                    @foreach($branchs as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Quyền</label><span class="text-danger">*</span>
                                <select name="role_id" id="" class="form-control">
                                    <option value="">Chọn quyền</option>
                                    @foreach($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Giới tính</label><span class="text-danger">*</span><br>
                                @foreach($genders as $item)
                                    <input type="radio" name="gender_id" value="{{ $item->id }}">&nbsp;&nbsp;
                                    {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Trạng thái hoạt động</label><span class="text-danger">*</span><br>
                                @foreach($operation_status as $item)
                                    <input type="radio" name="operation_status_id" value="{{ $item->id }}">&nbsp;&nbsp;
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
                <div class="box-footer ">
                    <a href="{{ route('users.index') }}" class="btn btn-warning ">
                        <i class="fa fa-close"></i>
                        Hủy
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
        });
    </script>
@endsection
