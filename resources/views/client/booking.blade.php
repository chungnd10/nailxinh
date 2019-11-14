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
                    <form id="booking-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between mb-3">
                                <span class="text-pink">Thông tin của bạn</span>
                                <span class="text-danger">(*) Bắt buộc nhập dữ liệu</span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text"
                                       class="form-control form-border"
                                       id="phone_number"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}"
                                       placeholder="Số điện thoại">
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control form-border" id="sir">
                                    <option value="Mrs/Miss">Mrs/Miss</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text"
                                       id="full_name"
                                       name="full_name"
                                       class="form-control form-border"
                                       value="{{ old('full_name') }}"
                                       placeholder="Họ và tên">
                            </div>
                            <div class="adress col-md-12">
                                <div class="mb-3">
                                    Địa điểm
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="row">
                                    @foreach($branchs as $branch)
                                        <div class="col-md-6 mb-3">
                                            <button type="button"
                                                    name="branch_id"
                                                    value="{{ $branch->id }}"
                                                    class="btn btn-adress-booking branch_id">
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
                                <select class="services form-control form-border" id="service_id" name="service_id">
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
                                <div class="mb-2">Nhân viên <span class="text-danger">*</span></div>
                                <select class="staff form-control form-border" id="user_id" name="user_id">
                                    <option value="">Chọn nhân viên</option>
                                    @foreach($users as $user)
                                        <option data-image="{{ $user->avatar }}"
                                                value="{{ $user->id }}">{{ $user->full_name }}</option>
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
                                <div id="timeFrame" class="row">
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="09:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                09:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="10:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                10:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="11:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                11:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="12:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                12:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="13:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">
                                                13:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="14:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                14:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="15:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                15:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="16:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                16:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="17:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                17:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="18:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                18:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="19:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                19:00
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button"
                                                time-frame="20:00"
                                                name="time[]"
                                                value="08:00"
                                                class="time btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                20:00
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="note">Ghi chú</label>
                                <textarea class="form-control form-border"
                                          id="note"
                                          rows="5"
                                          name="note"
                                ></textarea>
                            </div>
                            <div class="col-md-6 offset-md-3 mt-5 mb-5">
                                <button class="btn btn-block btn-pink" type="button" id="btn-booking">
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

            {{--    var service_id = $("#service_id").val();--}}
            {{--    var user_id = $("#user_id").val();--}}
            {{--    var date = $("#date").val();--}}
            {{--    var note = $("#note").val();--}}

            {{--    var url = "{{ route('booking') }}";--}}

            {{--    $.post({--}}
            {{--        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },--}}
            {{--        url: url,--}}
            {{--        data: {--}}
            {{--            phone_number: phone_number,--}}
            {{--            sir:          sir,--}}
            {{--            full_name:    full_name,--}}
            {{--            branch_id:    branch_id,--}}
            {{--            service_id:   service_id,--}}
            {{--            user_id:      user_id,--}}
            {{--            date:         date,--}}
            {{--            time:         time,--}}
            {{--            note:         note--}}
            {{--        }--}}
            {{--    })--}}
            {{--});--}}
        });
    </script>
@endsection
