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
                            <div class="form-group col-md-6">
                                <span class="text-danger validation">*</span>
                                <input type="text"
                                       id="phone_number"
                                       class="form-control form-border form-require"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}"
                                       placeholder="Số điện thoại"
                                       id="phone_number">
                            </div>
                            <div class="form-group col-md-6">
                                <span class="text-danger validation">*</span>
                                <input type="text"
                                       id="full_name"
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
                                <script>
                                    function addClassData() {
                                        $(this).addClass('branch-data');
                                    }
                                </script>
                                <div class="row">
                                    <div class=" col-md-12 text-error text-danger">Vui lòng chọn địa chỉ</div>
                                    @foreach($branchs as $branch)
                                        <div class="col-md-6 mb-3">
                                            <button type="button"
                                                    name="branch_id"
                                                    data-branch-id="{{ $branch->id }}"
                                                    onclick="addClassData()"
                                                    class="btn btn-adress-booking">
                                                {{ $branch->name }}
                                                <br>
                                                <div class="font-11">{{ $branch->address }}</div>
                                            </button>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="mb-2">Dịch vụ <span class="text-danger">*</span></div>
                                <select class="services form-control form-border" name="service_id" id="service_id">
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
                            <div class="col-md-6 mb-4">
                                <div class="mb-2">Nhân viên <span class="text-danger">*</span></div>
                                <select class="staff form-control form-border" name="user_id" id="user_id">
                                    <option value="">Chọn nhân viên</option>
                                    @foreach($users as $user)
                                        <option data-image="{{ $user->avatar }}"
                                                value="{{ $user->id }}">{{ $user->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="mb-2">Chọn ngày <span class="text-danger">*</span></div>
                                <div class="" id="select-day"></div>
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
                                                onclick="addTime('08:00')"
                                                class="time btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">
                                                20:00
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div id="time_frame"></div>
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
        let time_format_pttrn = "HH:mm";
        time_format_pttrn = time_format_pttrn ? time_format_pttrn : "HH:mm";
        // time render
        let checkSlotTime = [
            "9:00",
            "9:30",
            "10:00",
            "10:30",
            "11:00",
            "11:30",
            "12:00",
            "12:30",
            "13:00",
            "13:30",
            "14:00",
            "14:30",
            "15:00",
            "15:30",
            "16:00",
            "16:30",
            "17:00",
            "17:30",
            "18:00",
            "18:30",
            "19:00",
            "19:30",
            "20:00"
        ];
        // init setting
        let setting;
        // init day in week
        let weekday = new Array(7);
            weekday[1] = "Monday";
            weekday[2] = "Tuesday";
            weekday[3] = "Wednesday";
            weekday[4] = "Thursday";
            weekday[5] = "Friday";
            weekday[6] = "Saturday";
            weekday[0] = "Sunday";

        let dateRenderArray = [];
        let days = 7;
        let booking_before_min = 30;
        let i = 0, renderDateObj;
        
        function renderTimeSlot() {
            var dayOfDay = $("#selectTime [class*='btn-primary']").attr('value');
             // get selected date
            let bookingDate = $('#select-day .btn-primary').attr('data-date');
            let currentTime = moment(bookingDate.time).format('HH:mm');
            let currentDate;
            // remove html before render
            $("#timeFrame").empty();
            var tempMoment;
            var thisTime = moment();
            thisTime.add(booking_before_min, 'minutes');
            // if (setting && setting.booking_before_min) {
            //     thisTime.add(setting.booking_before_min, 'minutes');
            // }
            //console.log('setting.booking_before_min', setting.booking_before_min, thisTime);

            // var startSlotTime = moment(startTime).utcOffset(merchant_timezone).hours(defaultStartTime.hour).minutes(defaultStartTime.min);
            // var endSlotTime = moment(startTime).utcOffset(merchant_timezone).hours(defaultEndTime.hour).minutes(defaultEndTime.min);

            // var noon_12 = moment(startTime).utcOffset(merchant_timezone).hours(12).minutes(0);
            // var evening_18h = moment(startTime).utcOffset(merchant_timezone).hours(18).minutes(0);

            // switch(dayOfDay){
            // case "morning":
            //     startSlotTime = startSlotTime.isSameOrBefore(noon_12) ? startSlotTime : noon_12; 
            //     endSlotTime = endSlotTime.isSameOrBefore(noon_12) ? endSlotTime : noon_12;
            //     break;
            // case "afternoon":
            //     startSlotTime = startSlotTime.isSameOrAfter(noon_12) ? (startSlotTime.isSameOrBefore(evening_18h) ? startSlotTime : evening_18h) : noon_12; 
            //     endSlotTime = endSlotTime.isSameOrAfter(noon_12) ? (endSlotTime.isSameOrBefore(evening_18h) ? endSlotTime : evening_18h) : noon_12;
            //     break;
            // case "evening":
            //     startSlotTime = startSlotTime.isSameOrAfter(evening_18h) ? startSlotTime : evening_18h; 
            //     endSlotTime = endSlotTime.isSameOrAfter(evening_18h) ? endSlotTime : evening_18h;
            //     break;
            // }
            // render html check slot time
            for(let k = 0; k < checkSlotTime.length; k++){
                tempMoment = checkSlotTime[k];
                let btn = $('<button type="button"></button>');
                btn.text(tempMoment);
                btn.attr('time-frame', tempMoment);
                btn.addClass('btn btn-default time-frame mb-2');
                if( currentTime > checkSlotTime[k] ){
                    btn.addClass('disable-click');
                    btn.html("<div class='time'>" + tempMoment + '</div><div class="slot"> </div>');
                    btn.addClass('disable-click btn-time-danger');
                } else{
                    btn.html("<div class='time theme-text'>" + tempMoment + '</div><div class="slot"> </div>');
                    btn.addClass('theme-button');
                };
                $("#time_frame").append(btn);
            };
        };

        for(i; i < days; i++ ) {
            renderDateObj = moment().add(i, 'days');
            dateRenderArray.push({
                data_date: moment(Object.assign({}, renderDateObj)).format("YYYY-MM-DD"),
                date_title: moment(Object.assign({}, renderDateObj)).format("DD/MM"),
                day_of_week: weekday[moment(Object.assign({}, renderDateObj)).day()],
            });
        }
        // change date when click change date
        $(document).on("click", '.btn-select', function(e){
            $('.btn-select').removeClass('btn-primary').addClass('btn-inactive');
            $(this).addClass('btn-primary');

            startTime = moment($(this).attr('data-date')).toISOString();
            // mặc định buổi cho ngày, nếu ngày hôm nay thì kiểm tra buổi phù hợp nếu không chuyển hết về buối sáng
            var defaultMorning = !moment($(this).data('date')).isSame(moment().format('YYYY-MM-DD'));
            // setDefaultDayOfDay(defaultMorning);
            // getBookingSlotsFromServer(startTime);
        });
        // render date picker
        function renderBookingDate(){
            var i, renderArray = [];
            for(i in  dateRenderArray) {

                renderArray.push('<div class="col-xs-4">');
                renderArray.push('<div class="btn-select btn-inactive" data-date="' + dateRenderArray[i].data_date + '">');
                renderArray.push('<div class="select-day-title">');

                renderArray.push('</div>');
                renderArray.push('<div class="select-day-body">');
                renderArray.push('<div class="day-in-week">' + dateRenderArray[i].day_of_week + '</div>');
                renderArray.push('<div class="day">' + dateRenderArray[i].date_title + '</div>');
                renderArray.push('</div>');
                renderArray.push('</div>');
                renderArray.push('</div>');
            }

            $('#select-day').html(renderArray.join(""));
            $('#select-day .btn-select').first().addClass('btn-primary');
        }
        renderBookingDate();
        renderTimeSlot();
        // slick render date select
        $('#select-day').slick({
            dots: true,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            prevArrow: '<button type="button" class="custom-slick-arrow-prev icon-circle-left2"><i class="fas fa-chevron-circle-left"></i></button>',
            nextArrow: '<button type="button" class="custom-slick-arrow-next icon-circle-right2"><i class="fas fa-chevron-circle-right"></i></button>'
        });

    });
</script>
@endsection
