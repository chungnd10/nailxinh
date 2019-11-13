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
            <form action="{{ route('users.store') }}"
                  method="POST"
                  id="addUser">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
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
                                        >{{ $item->name.", ".$item->address }}</option>
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
                                </select><br>
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
                                <br>
                                <label id="gender_id-error" class="error" for="gender_id"></label>
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
                                <br>
                                <label id="operation_status_id-error" class="error" for="operation_status_id"></label>
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

            //validate
            $("#addUser").validate({
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
                    email: {
                        required: true,
                        email: true,
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
                    phone_number: {
                    },
                    birthday: "*Mục này không được để trống",
                    address: {
                        maxlength: "*Không được vượt quá 200 ký tự",
                    },
                    email: {
                        email: "*Email không đúng định dạng",
                        maxlength: "*Không được vượt quá 200 ký tự",
                    },
                }
            });
        });
    </script>
@endsection
