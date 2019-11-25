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
                        <i class="fas fa-chevron-right"></i>
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
                    <form id="booking-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <span class="text-pink">Thông tin của bạn</span>
                            </div>
                            <div class="form-group col-md-12">
                                <span class="text-danger validation">*</span>
                                <input type="text"
                                       class="form-control form-border form-require"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}"
                                       placeholder="Số điện thoại"
                                       id="phone_number">
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control form-border" id="gender">
                                    <option value="">Mrs/Miss</option>
                                    <option value="">Mrs</option>
                                    <option value="">Miss</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <span class="text-danger validation">*</span>
                                <input type="text"
                                       name="full_name"
                                       class="form-control form-border form-require"
                                       value="{{ old('full_name') }}"
                                       placeholder="Họ và tên"
                                       id="full_name">
                            </div>
                            <div class="adress col-md-12">
                                <div class="mb-3">
                                    Địa điểm
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="row">
                                    <div class=" col-md-12 text-error text-danger">Vui lòng chọn địa chỉ</div>
                                    @foreach($branchs as $branch)
                                        <div class="col-md-6 mb-3">
                                            <button type="button"
                                                    name="branch_id"
                                                    value="{{ $branch->id }}"
                                                    class="btn btn-adress-booking">
                                                {{ $branch->name }}
                                                <br>
                                                <div class="font-11">{{ $branch->address }}</div>
                                            </button>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="mb-2">Dịch vụ <span class="text-danger">*</span></div>
                                <select class="services form-control form-border" multiple="multiple" name="service_id" id="service_id">
                                    <option value="">Chọn dịch vụ</option>
                                    @foreach($type_services as $type_service)
                                        <optgroup label="{{ $type_service->name }}">
                                            @foreach($type_service->showServices($type_service->id) as $service)
                                                <option data-image="{{ $service->image }}"
                                                        value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="mb-2">Chọn ngày <span class="text-danger">*</span></div>
                                <input class="datepicker form-control form-border"
                                       name="date"
                                       id="date"
                                       placeholder="mm/dd/yyyy"
                                       data-date-format="mm/dd/yyyy">
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">Chọn giờ <span class="text-danger">*</span></div>
                                <div class=" col-md-12 text-error2 text-danger">Vui lòng chọn thời gian</div>
                                <div id="timeFrame" class="row">
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="09:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                09:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="10:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                10:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="11:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                11:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="12:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                12:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="13:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                13:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="14:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                14:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="15:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                15:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="16:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                16:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="17:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                17:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="18:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                18:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="19:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                19:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="20:00"
                                                name="time[]"
                                                value="08:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                <input type="hidden" name="time[]" value="12:00">
                                                20:00
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="ghichu">Ghi chú</label>
                                <textarea class="form-control form-border"
                                          id="ghichu"
                                          rows="5"
                                          name="note"
                                ></textarea>
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
