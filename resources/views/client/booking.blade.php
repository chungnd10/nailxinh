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
                                <label id="phone_number-error" class="error mt-2" for="phone_number"></label>
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
                                <label id="full_name-error" class="error mt-2" for="full_name"></label>
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
                                <div class="row" id="locationBtn" >
                                    <div class="col-md-12 text-error text-danger">Vui lòng chọn địa chỉ</div>
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
                                <label id="service_id-error" class="error" for="service_id"></label>
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
                                <label id="user_id-error" class="error" for="user_id"></label>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="mb-3">
                                    Chọn ngày: <span class="theme-text booking_time pull-right text-bold" style="font-size: 14px;"></span>
                                </div>
                                <!-- <div class="mb-2">Chọn ngày <span class="text-danger">*</span></div> -->
                                <div class="" id="select-day"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">Chọn giờ <span class="text-danger">*</span></div>
                                <div class=" col-md-12 text-error2 text-danger">Vui lòng chọn thời gian</div>
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
                            <div class="col-md-6 offset-md-3 mb-5">
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
        // format time
        let time_format_pttrn = "HH:mm";
        time_format_pttrn = time_format_pttrn ? time_format_pttrn : "HH:mm";
        // time render
        let checkSlotTime = [
            {
                "name": "9:00",
                'status': true
            },
            {
                "name": "9:30",
                'status': true
            },
            {
                "name": "10:00",
                'status': true
            },
            {
                "name": "10:30",
                'status': true
            },
            {
                "name": "11:00",
                'status': true
            },
            {
                "name": "11:30",
                'status': true
            },
            {
                "name": "12:00",
                'status': true
            },
            {
                "name": "12:30",
                'status': true
            },
            {
                "name": "13:00",
                'status': false
            },
            {
                "name": "13:30",
                'status': false
            },
            {
                "name": "14:00",
                'status': false
            },
            {
                "name": "14:30",
                'status': false
            },
            {
                "name": "15:00",
                'status': false
            },
            {
                "name": "15:30",
                'status': true
            },
            {
                "name": "16:00",
                'status': true
            },
            {
                "name": "16:30",
                'status': true
            },
            {
                "name": "17:00",
                'status': true
            },
            {
                "name": "17:30",
                'status': true
            },
            {
                "name": "18:00",
                'status': true
            },
            {
                "name": "18:30",
                'status': true
            },
            {
                "name": "19:00",
                'status': true
            }
        ];
        // init setting
        let setting;
        // init day in week
        let weekday = new Array(7);
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bẩy";
            weekday[0] = "Chủ Nhật";
        // render date array
        let dateRenderArray = [];
        // create total day in week
        let days = 7;
        // create booking before mins
        let booking_before_min = 30;
        let i = 0, renderDateObj;
        let startTime;
        let date_format_pttrn = "dd/MM/yyyy";
        date_format_pttrn = date_format_pttrn ? date_format_pttrn.toUpperCase() : "DD/MM/YYYY";

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
                tempMoment = checkSlotTime[k].name;
                status = checkSlotTime[k].status;
                let times = moment(checkSlotTime[k].time);
                let btn = $('<button type="button"></button>');
                btn.text(tempMoment);
                btn.attr('time-frame', tempMoment);
                btn.addClass('btn btn-default time-frame mb-2');
                if( status == 'false'){
                    btn.addClass('disable-click');
                    btn.html("<div class='time'>" + tempMoment + '</div><div class="slot">Hết chỗ</div>');
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
            $('.btn-select').removeClass('btn_primary').addClass('btn-inactive');
            $(this).addClass('btn_primary');

            startTime = moment($(this).attr('data-date')).toISOString();
            // mặc định buổi cho ngày, nếu ngày hôm nay thì kiểm tra buổi phù hợp nếu không chuyển hết về buối sáng
            var defaultMorning = !moment($(this).data('date')).isSame(moment().format('YYYY-MM-DD'));
            // setDefaultDayOfDay(defaultMorning);
            // getBookingSlotsFromServer(startTime);
            // renderBookingDate();
        });

        // when user click on 
        $("#time_frame").on('click', 'button', function(e){

            currentTime = $(this).attr('time-frame');

            $("#time_frame > button").removeClass('btn_primary').addClass('btn-default');
            //$("#time_frame > button .time").addClass('theme-text');
            $(this).removeClass('btn-default').addClass('btn_primary');
            $('#time_frame .time').removeClass('text-white');
            $(this).find('.time').addClass('text-white');
            showBookingDateTime(currentTime, startTime);

            // remove error
            $('.general-message').hide();
            $('#time-select').css({'color': ''});
        });

         // get current time
        function showBookingDateTime(currentTime, date_selected){
            let dateObj = moment(date_selected);
            let currentDay = weekday[dateObj.day()];

            $('.booking_time').html(currentDay + ", " + dateObj.format(date_format_pttrn) + " " + currentTime);
        };
        // set default day
        function setDefaultDayOfDay(){
            let currentTime = new Date();
            $('#selectTime button').removeClass("btn-primary").addClass("btn-default");
        }


        // render date picker
        function renderBookingDate(){
            let i, renderArray = [];
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
        };
        // run function
        renderBookingDate();
        renderTimeSlot();
        // slick render date select
        $('#select-day').slick({
            dots: true,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            prevArrow: '<button type="button" class="custom-slick-arrow-prev icon-circle-left2"><i class="fas fa-chevron-circle-left"></i></button>',
            nextArrow: '<button type="button" class="custom-slick-arrow-next icon-circle-right2"><i class="fas fa-chevron-circle-right"></i></button>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2   
                    }
                }
            ]
        });
        
        // get slot from server
        function getBookingSlotsFromServer(startTime){  
            let location_id = parseInt($("#locationBtn button[class*='btn-adress-booking']").attr("data-branch-id"));
            if(!location_id) location_id = defaultLocation;
            
            let timeData = {
                merchant_id : merchant_id,
                location_id : location_id,
                date : startTime,
            };
            var operator_id = $('#operator option:selected').val(); // operatorId
            if(operator_id) timeData.operator_id = operator_id;

            // Send data
            $.post({
                url: "",
                data: timeData,
                success: function(data) {
                if (data) {
                    checkSlotArray = data.timeFrame.timeFrame;  
                    workingHours = data.timeFrame.workingHours;

                    if(workingHours) {
                        if (workingHours.start_time) {
                        defaultStartTime = convert_HHMMSSString_to_object(workingHours.start_time); 
                        if (defaultStartTime == null) defaultStartTime = {hour: 8, min: 0};
                        }
                        if (workingHours.end_time) {
                        defaultEndTime = convert_HHMMSSString_to_object(workingHours.end_time); 

                        if (defaultEndTime == null) defaultEndTime = {hour: 22, min: 0};
                        }

                        var startTime_moment = moment().hours(defaultStartTime.hour).minutes(defaultStartTime.min).seconds(0);
                        var endTime_moment = moment().hours(defaultEndTime.hour).minutes(defaultEndTime.min).seconds(0);

                        $('#working_start_time').text(startTime_moment.format(time_format_pttrn));
                        $('#working_end_time').text(endTime_moment.format(time_format_pttrn));
                    }
                    renderTimeSlot();
                }
                },
            });
        };

        // get data from server when click change service

        $('#service_id') .on('change', function(){
            let service_id = $('#service_id').find(":selected").val();
            let adress = $('.btn-adress-booking.active').data('branch-id');
            getStaffFromLocation(adress,service_id);
        });

        // get operator from chose location 
        
        function getOperatorFromLocation(adress,service_id){
            let data_post = {
                adress: adress,
                service_id: service_id
            };
            // Send data with ajax

            $.ajax({
                type: 'POST',
                url: "/",
                data: data_post,
                success : function(resultData){
                    console.log(resultData);
                }

            })
        }

        // render show operator when choose service

        function renderOperatorFromService(){

        }

        // build Operator dropdown
        let operatorArray = [];

        //  Featch data to operator dropdown 
        function getOperatorByLocation(){
        if(setting && setting.showOperatorInfo == 1){
            // store all operators to build select2
            let operatorList = {};

            let defaultType = "Operators";

            let operatorOpt = "<option value=''> Select " + defaultType + "</option>";
            let locationChange = parseInt($("#locationBtn button[class*='btn-primary']").attr("location-id"));
            if(!locationChange) locationChange = defaultLocation;


            for(let i = 0; i < operator.length;i++){
            if ((operator[i].location_id == locationChange) || (operator[i].location_id_1 == locationChange) || (operator[i].location_id_2 == locationChange) || (operator[i].location_id_3 == locationChange) || (operator[i].location_id_4 == locationChange) || (operator[i].location_id_5 == locationChange))
            {
                if(!operator[i].avatar_url){
                    operator[i].avatar_url = "/images/placeholder_avatar_sqr.jpg";
                }

                if(!operator[i].name){
                    operator[i].name = "Chưa có tên";
                }

                if(!operator[i].title){
                    operator[i].title = "Chức danh khác";
                }

                if(operator[i].name){
                    operator[i].title = operator[i].title.toUpperCase();
                }

                if(typeof operatorList[operator[i].title]  == 'undefined') operatorList[operator[i].title] = [];
                operatorList[operator[i].title].push(operator[i]);

            }

            }

            var optionHmtl = [operatorOpt];
            for(var j in operatorList) {
            optionHmtl.push("<optgroup label='" + j + "'>");
            for(var k in operatorList[j]) {
                optionHmtl.push("<option value='" + operatorList[j][k].id + "' data-avatar='" + operatorList[j][k].avatar_url + "' >" + operatorList[j][k].name + "</option>");
            }
            optionHmtl.push("</optgroup>");
            }

            $("#operator").html(optionHmtl.join(''));

            // destroy select2 if existed
            try { 
            if($("#operator").data('select2')) $("#operator").data('select2').destroy(); 
            } catch(e){
            // console.log(e);
            }

            setTimeout(function(){
            $("#operator").select2({
                templateResult: formatSelect2Data,
                templateSelection: formatSelect2Data,
                containerCssClass: 'select2-fix-padding',
                dropdownParent: $('#operatorSetting')
            });
            }, 200); // add timeout to make sure html is ready before build select2

        } else{
            $("#operatorSetting").hide();
        }
        }
    });
</script>
  
@endsection
