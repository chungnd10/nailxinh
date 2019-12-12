@extends('client.layouts.index')
@section('content')
    <!-- Start: Breadcrumb Area
    ============================= -->

    <section id="breadcrumb-area" class="breadcrumb-booking">
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
                    <form id="booking-form" class="form-horizontal">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <span class="text-pink">Thông tin của bạn</span>
                            </div>
                            <div class="form-group col-md-6">
                                <span class="text-danger validation">*</span>
                                <input type="text"
                                       class="form-control form-border form-require"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}"
                                       pa
                                       placeholder="Số điện thoại"
                                       id="phone_number">
                                <label id="phone_number-error" class="error mt-2" for="phone_number"></label>
                                <span class="general-message"></span>
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
                                <!-- <script>
                                    function addClassData() {
                                        $(this).addClass('branch-data');
                                    }
                                </script> -->
                                <div class="row" id="locationBtn" >
                                    <div class="col-md-12 text-error text-danger">Vui lòng chọn địa chỉ</div>
                                    @foreach($branchs as $branch)
                                        <div class="col-md-6 mb-3">
                                            <button type="button"
                                                    name="branch_id"
                                                    data-branch-id="{{ $branch->id }}"
                                                    
                                                    class="btn btn-address-booking">
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
                                    <!-- @foreach($users as $user)
                                        <option data-image="{{ $user->avatar }}"
                                                value="{{ $user->id }}">{{ $user->full_name }}</option>
                                    @endforeach -->
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
        let test = [
            "09:00","12:30","17:00"
        ]
        let checkSlotTime = [
            "09:00", 
            "09:30", 
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
            "19:00"
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
        // show html time slot
        function renderTimeSlot() {
            var dayOfDay = $("#selectTime [class*='btn-primary']").attr('value');
             // get selected date
            let bookingDate = $('#select-day .btn-primary').attr('data-date');
            let currentTime = moment().format('HH:mm');
            console.log(currentTime);
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
                tempMoment = checkSlotTime[k];
                console.log(tempMoment); 
                let btn = $('<button type="button"></button>');
                btn.text(tempMoment);
                btn.attr('time-frame', tempMoment);
                btn.addClass('btn btn-default time-frame mb-2');
                test.forEach(function(item){
                    if(tempMoment == item || tempMoment < currentTime){
                        console.log('success');
                        btn.addClass('disable-click');
                        btn.html("<div class='time'>" + tempMoment + '</div><div class="slot">Hết chỗ</div>');
                        btn.addClass('disable-click btn-time-danger');
                    } else{
                        btn.html("<div class='time theme-text'>" + tempMoment + '</div><div class="slot"> </div>');

                    }
                });
                $("#time_frame").append(btn);
            };
        };

        for(i; i < days; i++ ) {
            renderDateObj = moment().add(i, 'days');
            dateRenderArray.push({
                data_date: moment(Object.assign({}, renderDateObj)).format("DD/MM/YYYY"),
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
        // click add and remove class in location
        $('.btn-address-booking').on('click', function(){
            $('.btn-address-booking').removeClass('active');
            $(this).addClass('active');
        })
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

        // click select option staff


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
            let currentDate = moment().format('DD/MM/YYYY');
            console.log(currentDate);
            let i, renderArray = [];
            for(i in  dateRenderArray) {
                let classDate = currentDate == dateRenderArray[i].data_date ? "btn_primary" : "";
                console.log(classDate);
                renderArray.push('<div class="col-xs-4">');
                renderArray.push(`<div class="btn-select btn-inactive btn-primary ${classDate}" data-date=${dateRenderArray[i].data_date}>`);
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
            let location_id = parseInt($("#locationBtn button[class*='btn-address-booking']").attr("data-branch-id"));
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
            let branch_id = $('.btn-address-booking.active').data('branch-id');
            getOperatorFromLocation(branch_id,service_id);
        });
        // on blur input phone number check limit booking day
        $('#phone_number').blur(function(){
            const phone_number = $('#phone_number').val();
            // const date = 
            // Send data with ajax
            let url = "{{ route('ajax.check-limit-order') }}";
            let data = {
                phone_number: phone_number,
                _token : $('meta[name="csrf-token"]').attr('content')
            };

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: data,
                success : function(resultData){
                    checkPhoneLimitBooking(resultData);

                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
            console.log(phone_number);
        });
        // check phone number limit booking day
        function checkPhoneLimitBooking(numbers){
            if(numbers > 2){
                console.log('da qua luot dat lich trong ngay');
            } else{
                console.log("success");
            }
        };

        // render operator when click choose service a
        // get operator from chose location
        
        function getOperatorFromLocation(branch_id,service_id){
            let data_post = {
                branch_id: branch_id,
                service_id: service_id,
                _token : $('meta[name="csrf-token"]').attr('content')
            };
            // Send data with ajax
            let url = "{{ route('ajax.get-employees') }}";
            $.ajax({
        
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: data_post,
                success : function(resultData){
                    renderOperatorFromService(resultData);

                },
                error: function(xhr, status, error){
                    console.log(error);
                }

            })
        }

        // render show operator when choose service

        function renderOperatorFromService(resultData){
            let optionHtml = [];
            let operatorOpt = "<option value=''>Vui lòng chọn nhân viên</option>";
            if(resultData.length > 0){
                for (i =0;  i<resultData.length; i++) {
                    optionHtml.push(`<option data-image="${resultData[i].avatar}" value="${resultData[i].id}">${resultData[i].full_name}</option> `);
                    console.log(optionHtml);
                }
                // render html option operator
                $("#user_id").html(optionHtml.join(''));

            } else{
                optionHtml.push(operatorOpt);
                $("#user_id").html(optionHtml.join(''));
            }
        };


        // get Time button from select Operator
        function getTimeFromOperator(){
            let data_post = {
                branch_id: branch_id,
                service_id: service_id,
                _token : $('meta[name="csrf-token"]').attr('content')
            };
            // Send data with ajax

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/ajax/getEmployees",
                data: data_post,
                success : function(resultData){
                    console.log(resultData);
                    renderOperatorFromService(resultData);

                },
                error: function(xhr, status, error){
                    console.log(error);
                }

            })
        }
        // build Operator dropdown
        let operatorArray = [];

        // Validation form
        function ValidationInput(){
            if( $(this).attr('name') === 'phone_number' ){
                if (!validateMobileInput()) {
                    $(this).parent().addClass('has-error').removeClass('valid-data');
                    $('.general-message').show();
                } else {
                    $(this).parent().removeClass('has-error').addClass('valid-data');
                    $('.general-message').hide();
                }
            }
        };

        // Validate  phone number
        function validateMobileInput() {
            //get value from input #phone_number
            let mobileNumber = $('#phone_number').val().toString().replace(/\s|\-|_/g,"");
            // create variable min and max length phone number
            let phone_length_min = 10;
            let phone_length_max = 11;
            // create variable check status
            var is_valid = true;

            if(mobileNumber.length < phone_length_min || mobileNumber.length > phone_length_max ){
                is_valid = false ;
            } else{
                is_valid = true;
            }
            return is_valid;
        };

        // Validation with Jquery validation
        $('#booking-form').validate({
            ignore: 'input[type="hidden"]',
            rules: {
                phone_number: {
                    required: true,
                    phoneNumberVietNam: true,
                    // remote: {
                    //     url: "{{ route('ajax.check-limit-order') }}",
                    //     type: "POST",
                    //     data :{
                    //         phone_number: $('#phone_number').val(),
                    //         date: $()
                    //     }
                    // }
                },
                full_name:{
                    required:true                
                },
                service_id:{
                    required:true
                },
                user_id:{
                    required:true
                },
                date:{
                    required:true
                }
            },
            messages: {
                phone_number:{
                    required: "*Mời bạn nhập vào số điện thoại",
                    remote: "*Ban da dat 2 luot trong ngay"

                },
                full_name:{
                    required:"*Mời bạn nhập vào họ và tên"
                },
                service_id:{
                    required:"*Mời bạn chọn dịch vụ"
                },
                user_id:{
                    required:"*Mời bạn chọn nhân viên"
                },
                date:{
                    required:"*Mời bạn chọn ngày"
                }
            }
        });

        // submit form send ajax 

        $('#btn-booking').click(function(e){
            e.preventDefault();
            let data = {
                branch_id: $('.btn-address-booking.active').attr('data-branch-id'),
                phone_number: $('#phone_number').val(),
                full_name: $('#full_name').val(),
                service_id: $('#service_id').find(":selected").val(),
                user_id: $('#user_id').find(":selected").val(),
                date: moment($('#select-day .btn_primary').attr('data-date')).format('YYYY-MM-DD'),
                hours: $('.time-frame.btn_primary').attr('time-frame'),
                note: $('#note').val(),
            };
            let url = "{{ route('booking') }}";
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: data,
                success : function(data){
                    if (data.success){
                        Swal.fire({
                            type: 'success',
                            title: 'Bạn đã đặt lịch thành công !, chúng tôi sẽ liên hệ với bạn sớm nhất có thể.'
                        });
                        $('.btn-address-booking.active').attr('data-branch-id'),
                            $('#phone_number').val(''),
                            $('#full_name').val(''),
                            $('#service_id').find(":selected").val(),
                            $('#user_id').find(":selected").val(),
                            $('#select-day .btn_primary').attr('data-date')
                        $('.time-frame.btn_primary').attr('time-frame'),
                            $('#note').val('')
                    }

                    if (data.fail){
                        Swal.fire({
                            type: 'error',
                            title: 'Đặt lịch thất bại !.'
                        });
                    }
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
        }) ;      


    });
</script>
  
@endsection
