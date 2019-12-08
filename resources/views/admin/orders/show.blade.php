@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Sửa
            <small>lịch đặt</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('orders.update', Hashids::encode($order->id,'123456789')) }}" method="POST"
                  id="orders">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ và tên</label><span class="text-danger">*</span>
                                <input type="text" class="form-control"
                                       value="{{ old('full_name', $order->full_name) }}"
                                       name="full_name">
                                @if($errors->first('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label><span class="text-danger">*</span>
                                <input type="text" class="form-control"
                                       name="phone_number"
                                       value="{{ old('phone_number', $order->phone_number) }}"
                                       id="phone_number">
                                @if($errors->first('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Thời gian</label><span class="text-danger">*</span>
                                <div class="input-group date input-date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control"
                                           name="time"
                                           id="time"
                                           value="{{ date('Y-m-d H:i', strtotime(old('time', $order->time))) }}">
                                </div>

                                @if($errors->first('time'))
                                    <span class="text-danger">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select name="order_status_id" class="form-control">
                                    @foreach($orders_status as $status)
                                        <option value="{{ $status->id }}"
                                                @if($order->order_status_id == $status->id)
                                                selected
                                                @endif
                                        >
                                            {{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Chi nhánh</label>
                                <select name="branch_id" class="form-control" id="branch_id">
                                    @foreach($branches as $item)
                                        <option value="{{ $item->id }}"
                                                @if($order->branch_id == $item->id)
                                                selected
                                                @endif
                                        >
                                            {{ $item->name.', '.$item->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nhân viên</label>
                                <select name="user_id" class="form-control" id="user_id">
                                    <option value="">Chọn nhân viên</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id == $order->user_id ? 'selected' : '' }}
                                        >
                                            {{ $user->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dịch vụ</label><span class="text-danger">*</span>
                                <select class="form-control select2 select2-hidden-accessible"
                                            multiple="" data-placeholder="Select a State"
                                            style="width: 100%;" data-select2-id="7"
                                            tabindex="-1"
                                            aria-hidden="true"
                                            name="service_id[]"
                                        id="select2"
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
                                <textarea name="note" cols="30" rows="6"
                                          class="form-control">{{ old('note', $order->note) }}</textarea>
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
                    <a href="{{ route('orders.index') }}" class="btn btn-default">
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
            $('#select2').val([<?= $order->service_id ?>]).change();

            var minDate = "{{ $order->time }}";

            $('#time').datetimepicker({
                format: 'yyyy-mm-dd hh:ii',
                autoclose: true,
                minDate: minDate,
            });

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
                        maxlength: 200
                    }

                },

                messages: {
                    name: {
                        maxlength: "*Không được vượt quá 100 ký tự"
                    },
                    phone_number: {
                        maxlength: "*Không được vượt quá 11 ký tự"
                    },
                    address: {
                        maxlength: "*Không được vượt quá 200 ký tự"
                    },
                }
            });

            $('#branch_id').change(function () {
                let url_get_users_with_branch = "{{ route('get-users-with-branch') }}";
                let branch_id = $(this).val();
                let technician = "{{ $order->user_id }}";

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url_get_users_with_branch,
                    data: {'branch_id': branch_id},
                    success: function (data) {
                        $("#user_id").html('');
                        $("#user_id").append(
                            "<option value=''>Chọn nhân viên</option>"
                        );
                        $.each(data, function (key, value) {
                            let selected = parseInt(value.id) === parseInt(technician) ? 'selected' : '';
                            $("#user_id").append(
                                "<option value='"+ value.id +"'"+ selected +">"+value.full_name +"</option>"
                            );
                        });
                    },

                    error: function () {
                    },
                });
            });

        });
    </script>
@endsection
