@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Sửa chi nhánh: {{ $branch->name.", ".$branch->address }}
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('branch.update', $branch->id) }}" method="POST" enctype="multipart/form-data"
                  id="addBranch">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên chi nhánh</label><span class="text-danger">*</span>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       value="{{ old('name',$branch->name) }}" name="name" id="name">
                                @if($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                       value="{{old('phone_number',$branch->phone_number)}}">
                                @if($errors->first('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thành phố</label><span class="text-danger">*</span>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">Chọn thành phố</option>
                                    @foreach($cities as $item)
                                        <option value="{{ $item->id }}"
                                                @if($branch->city_id == $item->id) selected @endif >{{$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('city_id'))
                                    <span class="text-danger">{{ $errors->first('city_id') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Địa chỉ</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" name="address" id="address"
                                       value="{{old('address',$branch->address)}}">
                                @if($errors->first('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
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
                    <a href="{{ route('branch.index') }}"
                       class="btn btn-default"
                    >
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
            $("#addBranch").validate({
                rules: {
            		name: {
            			required: true,
						maxlength: 100
            		},
            		city_id: {
            			required: true,
            		},
            		phone_number: {
            			required: true,
            			phoneNumberVietNam: true,
						maxlength: 11
            		},
            		address: {
            			required: true,
            			minlength: 5,
						maxlength: 200
            		}

            	},

            	messages: {
            		name: {
						maxlength : "*Không được vượt quá 100 ký tự"
            		},
            		phone_number: {
						maxlength : "*Không được vượt quá 11 ký tự"
            		},
            		address: {
            			minlength: "*Yêu cầu tối thiểu 5 ký tự",
						maxlength : "*Không được vượt quá 200 ký tự"
            		},
            	}
            });
        });
    </script>
@endsection
