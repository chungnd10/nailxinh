@extends('client.layouts.index')
@section('content')
    <!-- Start: Breadcrumb Area
    ============================= -->

    <section id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>NailXinh</h2>
                    <ul class="breadcrumb-nav list-inline">
                        <li><a href="/">NailXinh</a></li>
                        <li>Đặt lịch</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Breadcrumb Area
    ============================= -->

    <!-- Start: Booking
    ============================= -->
    <section id="booking" style="padding-top:80px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('booking-test') }}" id="booking-form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <span class="text-pink">Thông tin của bạn</span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text"
                                       class="form-control form-border form-require"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}"
                                       placeholder="Số điện thoại">
                                @if($errors->first('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label>Họ và tên</label>
{{--                                <select class="form-control form-border" name="sir">--}}
{{--                                    <option value="">Mrs/Miss</option>--}}
{{--                                    <option value="Mrs"--}}
{{--                                        @if(old('sir') == 'Mrs')--}}
{{--                                            selected--}}
{{--                                        @endif--}}
{{--                                    >--}}
{{--                                        Mrs</option>--}}
{{--                                    <option value="Miss"--}}
{{--                                        @if(old('sir') == 'Miss')--}}
{{--                                            selected--}}
{{--                                        @endif--}}
{{--                                    >--}}
{{--                                        Miss</option>--}}
{{--                                </select>--}}
{{--                                @if($errors->first('sir'))--}}
{{--                                    <span class="text-danger">{{ $errors->first('sir') }}</span>--}}
{{--                                @endif--}}
                            </div>
                            <div class="form-group col-md-9">
                                <input type="text"
                                       name="full_name"
                                       class="form-control form-border form-require"
                                       value="{{ old('full_name') }}"
                                       placeholder="Họ và tên">
                                @if($errors->first('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="mb-3">
                                    Địa điểm
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="mb-12">
                                    <select name="branch_id" id="" class="form-control form-border">
                                        <option value="">Chọn chi nhánh</option>
                                        @foreach($branchs as $branch)
                                            <option value="{{ $branch->id }}"
                                                @if(old('branch_id') == $branch->id)
                                                     selected
                                                @endif
                                            >{{ $branch->name.', '.$branch->address }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('branch_id'))
                                    <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="mb-3">
                                    Dịch vụ
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="mb-12">
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
                                                    >{{ $service->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    @if($errors->first('service_id'))
                                        <span class="text-danger">{{ $errors->first('service_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="mb-3">Chọn thời gian <span class="text-danger">*</span></div>
                                <input class=" form-control form-border"
                                       name="time"
                                       id="time"
                                       placeholder="mm/dd/yyyy"
                                       value="{{ old('time') }}"
                                >
                                @if($errors->first('time'))
                                    <span class="text-danger">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="mb-3">
                                    Chọn giờ
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="mb-12">
                                    <select class="form-control "name="service_id[]"
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
                                                    >{{ $service->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    @if($errors->first('service_id'))
                                        <span class="text-danger">{{ $errors->first('service_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="ghichu">Ghi chú</label>
                                <textarea class="form-control form-border"
                                          id="note"
                                          rows="5"
                                          name="note"
                                >{{ old('note') }}</textarea>
                                @if($errors->first('note'))
                                    <span class="text-danger">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 offset-md-3 mt-5 mb-5">
                                <button class="btn btn-block btn-pink" type="submit" id="btn-booking">
                                    <i class="far fa-calendar-alt"></i>
                                    ĐẶT LỊCH NGAY
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Booking
    ============================= -->


@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#time').datetimepicker({
                format: 'yyyy-mm-dd hh:00',
                minView: 1,
            });

            $('.select2').select2();
            {{--$("#btn-booking").click(function () {--}}
            {{--    var phone_number = $("#phone_number").val();--}}
            {{--    var sir = $("#sir").val();--}}
            {{--    var full_name = $("#full_name").val();--}}
            {{--    var branch_id = $("#branch_id").val();--}}
            {{--    var service_id = $("#service_id").val();--}}
            {{--    var user_id = $("#user_id").val();--}}
            {{--    var date = $("#date").val();--}}
            {{--    var time = $("#time").val();--}}
            {{--    var note = $("#note").val();--}}

            {{--    var url = "{{ route('booking') }}";--}}

            {{--    $.post({--}}
            {{--        headers: {--}}
            {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--        },--}}
            {{--        url: url,--}}
            {{--        data: phone_number,--}}
            {{--        sir,--}}
            {{--        full_name,--}}
            {{--        branch_id,--}}
            {{--        service_id,--}}
            {{--        user_id,--}}
            {{--        date,--}}
            {{--        time,--}}
            {{--        note--}}
            {{--    })--}}
            {{--});--}}
        });
    </script>
@endsection
