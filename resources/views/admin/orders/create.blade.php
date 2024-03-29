@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thêm
            <small>lịch đặt</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('orders.store') }}" method="POST" id="addOrder">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ và tên</label><span class="text-danger">*</span>
                                <input type="text" class="form-control"
                                       value="{{ old('full_name') }}"
                                       name="full_name">
                                @if($errors->first('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label><span class="text-danger">*</span>
                                <input type="text" class="form-control"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}"
                                       id="phone_number">
                                @if($errors->first('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Thời gian</label><span class="text-danger">*</span>
                                <input type="text" class="form-control"
                                       name="time"
                                       id="time"
                                       value="{{ old('time') }}"
                                >
                                @if($errors->first('time'))
                                    <span class="text-danger">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dịch vụ</label><span class="text-danger">*</span>
                                <select class="form-control select2 select2-hidden-accessible"
                                            multiple="" data-placeholder="Select a State"
                                            style="width: 100%;" data-select2-id="7"
                                            tabindex="-1"
                                            aria-hidden="true"
                                            name="service_id[]"
                                    >
                                    <option value="">Chọn dịch vụ</option>
                                    @foreach($type_services as $type_service)
                                        <optgroup label="{{ $type_service->name }}">
                                            @foreach($type_service->showServices($type_service->id) as $service)
                                                <option data-image="{{ $service->image }}"
                                                        value="{{ $service->id }}"
                                                        @if(old('service_id') == $service->id)
                                                        selected
                                                        @endif
                                                >{{ $service->name.' - '.number_format( $service->price, 0, ',', '.').'đ' }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                @if($errors->first('service_id'))
                                    <span class="text-danger">{{ $errors->first('service_id') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea name="note"  cols="30" rows="6" class="form-control">{{ old('note') }}</textarea>
                                @if($errors->first('note'))
                                    <span class="text-danger">{{ $errors->first('note') }}</span>
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
                    <a href="{{ url()->previous() }}" class="btn btn-default" >
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

            //Initialize Select2 Elements
            $('.select2').select2();

            $('#time').datetimepicker({
                format: 'yyyy-mm-dd hh:00',
                minView: 1,
                autoclose: true
            });

            //validate
            $("#addOrder").validate({
                rules: {
                    full_name: {
                        required: true,
                        maxlength: 100
                    },
                    time: {
                        required: true,
                    },
                    service_id: {
                        required: true,
                    },
                    note: {
                        maxlength: 300
                    },
                    phone_number: {
                        required: true,
                        phoneNumberVietNam: true,
                        maxlength: 11
                    }
                },

                messages: {
                    full_name: {
                        maxlength: "*Không được vượt quá 100 ký tự"
                    },
                    note: {
                        maxlength: "*Không được vượt quá 300 ký tự"
                    },
                    phone_number: {
                        phoneNumberVietNam: true,
                    }
                }
            });


        });
    </script>
@endsection
