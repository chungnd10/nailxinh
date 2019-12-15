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
                            <div class="form-group col-md-6 custom-height">
                                <span class="text-danger validation">*</span>
                                <input type="text"
                                       class="form-control form-border form-require"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}"
                                       pa
                                       placeholder="Số điện thoại"
                                       id="phone_number">
                                <label id="phone_number-error" class="error mt-2" for="phone_number"></label>
                                <label id="phone_number-error2" class="mt-2" style="color:#dc3545"></label>
                                <label id="phone_number-error3" class="mt-2" style="color:#dc3545"></label>
                                <span class="general-message"></span>
                            </div>
                            <div class="form-group col-md-6 custom-height">
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
                                            <div class=" col-md-12 text-error2 text-danger">*Vui lòng chọn thời gian</div>
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
                                        <div class="col-lg-6 offset-lg-3 col-md-12 mb-5">
                                            <button class="btn btn-block btn-pink" type="submit" id="btn-booking">
                                                <i class="far fa-calendar-alt"></i>
                                                ĐẶT LỊCH NGAY
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
        /* format time and date */
        let time_format_pttrn = "HH:mm";
        let date_format_pttrn = 'YYYY-MM-DD';
        /* array slotTime */
        let check_slot_time = [
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
        /* init day in week */
        let weekday = new Array(7);
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            weekday[0] = "Chủ Nhật";
        /*  date array */
        let date_render_array = [];
        /* create total day in week */
        let days = 7;
        /* create booking before mins */
        let booking_before_min = 30;
        let i = 0, render_date_obj;
        let start_time;
        /* get current_date and current_time */
        let current_date = moment().format(date_format_pttrn);
        let current_time = moment().format(time_format_pttrn);
        /* create variable save_data */
        let save_data;
        let btn_address_booking = $('.btn-address-booking');
            btn_address_booking[0].classList.add('active');
        /* ============= render HTML time slot ============= */
        function renderTimeSlot(data, next_date) {
            let current_date_time = moment().format('YYYY-MM-DD HH:MM');
            let temp_moment;
            for(let k = 0; k < check_slot_time.length; k++){
                temp_moment = check_slot_time[k];
                /* create button get slot time */
                let btn = $('<button type="button"></button>');
                btn.text(temp_moment);
                btn.attr('time-frame', temp_moment);
                btn.addClass('btn btn-default time-frame mb-2');
                if(data.length !== 0){
                    if(next_date){
                        data.forEach(function(item){
                            let time_checked = moment(item).format(time_format_pttrn);
                            if(temp_moment === time_checked ){
                                btn.html(`<div class="time">${temp_moment}</div><div class="slot">Hết chỗ</div>`);
                                btn.addClass('disable-click btn-time-danger');
                            } else{
                                btn.html(`<div class="time theme-text">${temp_moment}</div>`);
                            }
                        });
                    } else{
                        data.forEach(function(item){
                            let time_checked = moment(item).format(time_format_pttrn);
                            if(temp_moment === time_checked || temp_moment < current_time){
                                btn.html(`<div class="time">${temp_moment}</div><div class="slot">Hết chỗ</div>`);
                                btn.addClass('disable-click btn-time-danger');
                            } else{
                                btn.html(`<div class="time theme-text">${temp_moment}</div>`);
                            }
                        });
                    } 
                } else if(next_date){
                    showBookingDateTime(current_time,next_date);
                    let array_date_time = [];
                    let date_time = `${next_date} ${check_slot_time[k]}`;
                    array_date_time.push(date_time);
                    array_date_time.forEach(function(item){
                        if(item < current_date_time){
                            btn.html(`<div class="time">${temp_moment}</div><div class="slot">Hết chỗ</div>`);
                            btn.addClass('disable-click btn-time-danger');
                        } else{
                            btn.html(`<div class="time theme-text">${temp_moment}</div>`);
                        }  
                    }); 
                }
                else{
                    showBookingDateTime(current_time,current_date);
                    if(temp_moment < current_time){
                        btn.html(`<div class="time">${temp_moment}</div><div class="slot">Hết chỗ</div>`);
                        btn.addClass('disable-click btn-time-danger');       
                    } else{
                        btn.html(`<div class="time theme-text">${temp_moment}</div>`);
                    }
                };
                $("#time_frame").append(btn);
            };
        };
        /* array date_render */
        for(i; i < days; i++ ) {
            render_date_obj = moment().add(i, 'days');
            date_render_array.push({
                data_date: moment(Object.assign({}, render_date_obj)).format(date_format_pttrn),
                date_title: moment(Object.assign({}, render_date_obj)).format("DD/MM"),
                day_of_week: weekday[moment(Object.assign({}, render_date_obj)).day()],
            });
        };

        /* Click day button render html */
        $(document).on("click", '.btn-select', function(e){
            let phone_number = $('#phone_number').val();
            let url = "{{ route('ajax.check-time-user') }}";
            let user_id = $('#user_id').find(":selected").val();
            $('.btn-select').removeClass('btn_primary').addClass('btn-inactive');
            $(this).addClass('btn_primary');
            let next_date = $(this).attr('data-date');
            console.log('ad');
            checkPhoneLimitBooking(phone_number,next_date);
            $("#time_frame").empty();
            if(moment(next_date).isAfter(current_date)){
                if(user_id){
                    let data = {
                        user_id: user_id,
                        date: next_date,
                        _token : $('meta[name="csrf-token"]').attr('content')
                    };
                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        data: data,
                        success : function(result_data){
                            $("#time_frame").empty();
                            if(result_data.length !== 0){
                                renderTimeSlot(result_data,next_date);
                            } else{
                                renderTimeSlot([],next_date);
                            }
                            return save_data = result_data;
                        },
                        error: function(xhr, status, error){
                            console.log(error);
                        }
                    });
                } else{
                    $("#time_frame").empty();
                    renderTimeSlot([],next_date);
                } 
            } 
            else{
                if(user_id){
                    getAjaxSlotFromServer(user_id,current_date);
                }
                $("#time_frame").empty();
                renderTimeSlot([]);
            }
        });

        /* Click adress booking addClass and removeClass */
        $('.btn-address-booking').on('click', function(){
            $('.btn-address-booking').removeClass('active');
            $(this).addClass('active');
            let service_id = $('#service_id').find(":selected").val();
            let branch_id = $('.btn-address-booking.active').data('branch-id');
            getOperatorFromLocation(branch_id,service_id);

        })
        /* button Time click */
        $("#time_frame").on('click', 'button', function(e){
            current_time = $(this).attr('time-frame');
            let next_day = moment($('#select-day .btn_primary').attr('data-date')).format(date_format_pttrn);
            $("#time_frame > button").removeClass('btn_primary').addClass('btn-default');
            $(this).removeClass('btn-default').addClass('btn_primary');
            $('#time_frame .time').removeClass('text-white');
            $(this).find('.time').addClass('text-white');
            showBookingDateTime(current_time,next_day);
            $('.text-error2').hide();
            $('#time-select').css({'color': ''});
        });

        /* ================================== Create function ================================== */
        function showBookingDateTime(current_time, date_selected){
            let date_obj = moment(date_selected);
            let current_day = weekday[date_obj.day()];
            $('.booking_time').html(current_day + ", " + date_obj.format("DD/MM/YYYY") + " " + current_time);
        };
    
        function setDefaultDayOfDay(){
            let current_time = new Date();
            $('#selectTime button').removeClass("btn-primary").addClass("btn-default");
        };

        function renderBookingDate(){
            let i, render_array = [];
            
            for(i in  date_render_array) {
                let class_active = current_date === date_render_array[i].data_date ? "btn_primary" : "";
                render_array.push('<div class="col-xs-4">');
                render_array.push(`<div class="btn-select btn-inactive btn-primary ${class_active}" data-date=${date_render_array[i].data_date}>`);
                render_array.push('<div class="select-day-title">');
                render_array.push('</div>');
                render_array.push('<div class="select-day-body">');
                render_array.push(`<div class="day-in-week">${date_render_array[i].day_of_week}</div>`);
                render_array.push(`<div class="day">${date_render_array[i].date_title}</div>`);
                render_array.push('</div>');
                render_array.push('</div>');
                render_array.push('</div>');
            };
            $('#select-day').html(render_array.join(""));
            $('#select-day .btn-select').first().addClass('btn-primary');
        };
        /*  ================================== run function ==================================*/
        renderBookingDate();
        renderTimeSlot([]);

        /* slick slider render */
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
        
        /* get data from server when click #service_id */
        $('#service_id') .on('change', function(){
            let service_id = $('#service_id').find(":selected").val();
            let branch_id = $('.btn-address-booking.active').data('branch-id');
            getOperatorFromLocation(branch_id,service_id);
        });

        /* get data from server when select user_id */
       
        $('#user_id').on('change', function(){
            let user_id = $('#user_id').find(":selected").val();
            let date = moment().format(date_format_pttrn);
            $('.btn-select').removeClass('btn_primary');
            $('.btn-select')[0].classList.add('btn_primary');
            getAjaxSlotFromServer(user_id,date);
        });

        function getAjaxSlotFromServer(user_id,date){
            let url = "{{ route('ajax.check-time-user') }}";
            let input_data = {
                user_id: user_id,
                date: date,
                _token : $('meta[name="csrf-token"]').attr('content')
            };
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: input_data,
                success : function(result_data){
                    $("#time_frame").empty();
                    renderTimeSlot(result_data);
                    return save_data = result_data;
                },
                error: function(xhr, status, error){
                    console.log('error',error);
                }
            });
        };

        /* ====================================================  */

        /* check phone number limit booking in day */
         $('#phone_number').bind('input keypress keydown keyup blur change',function(event){
            let value = event.target.value;
            if(value.length >=10){
               checkPhoneLimitBooking(value);
               checkLimitList(value);
            }
        });
        function checkPhoneLimitBooking(numbers,date){
            let url = "{{ route('ajax.check-limit-order') }}";
            let data;
            if(date){
                data = {
                    phone_number: numbers,
                    date: date,
                    _token : $('meta[name="csrf-token"]').attr('content')
                };
            } else{
                data = {
                    phone_number: numbers,
                    date: current_date,
                    _token : $('meta[name="csrf-token"]').attr('content')
                };
            }
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: data,
                success : function(result_data){
                    if(result_data > 2){
                        $('#phone_number-error').show();
                        $('#phone_number-error').text("*Số điện thoại đã quá lần đặt trong ngày");
                        $('#phone_number').focus();
                        return false;
                    } else{
                        checkLimitList(numbers);
                        return true;
                    }
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
            
        };

        function checkLimitList(phone_number){
            let url = "{{ route('ajax.check-limited-list') }}";
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
                success : function(result_data){
                    if(result_data > 0){
                        $('#phone_number-error').css('display','block');
                        $('#phone_number-error').text("*Số điện thoại nằm trong danh sách hạn chế");
                        $('#phone_number').focus();
                        return false;
                    } else{
                        return true;
                    }
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
        }

        /* Operator */
        function getOperatorFromLocation(branch_id,service_id){
            let data_post = {
                branch_id: branch_id,
                service_id: service_id,
                _token : $('meta[name="csrf-token"]').attr('content')
            };
            let url = "{{ route('ajax.get-employees') }}";
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: data_post,
                success : function(result_data){
                    if(result_data.length > 0 ){
                        renderOperatorFromService(result_data);
                    } else{
                        renderOperatorFromService([]);
                    }
                    
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
        };

        /* render show operator when choose service */
        function renderOperatorFromService(result_data){
            let service_id = $('#service_id').find(":selected").val();
            let btn_address = $('.btn-address-booking.active');
            let option_html = [];
            let operator_opt = service_id ? "<option value=''>Không có nhân viên nào!</option>" : "<option value=''>Vui lòng chọn dịch vụ</option>";
            if(result_data.length > 0){
                option_html.push("<option value=''>Vui lòng chọn nhân viên</option>");
                for (i =0;  i<result_data.length; i++) {
                    option_html.push(`<option data-image="${result_data[i].avatar}" value="${result_data[i].id}">${result_data[i].full_name}</option> `);
                }
            } else{
                option_html.push(operator_opt);
            };
            $("#user_id").html(option_html.join(''));
        };


        /* get Time button from select Operator */
        function getTimeFromOperator(){
            let data_post = {
                branch_id: branch_id,
                service_id: service_id,
                _token : $('meta[name="csrf-token"]').attr('content')
            };
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/ajax/getEmployees",
                data: data_post,
                success : function(result_data){
                    renderOperatorFromService(result_data);
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
        };
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
            };
        };

        // Validate  phone number
        function validateMobileInput() {
            //get value from input #phone_number
            let mobile_number = $('#phone_number').val().toString().replace(/\s|\-|_/g,"");
            // create variable min and max length phone number
            let phone_length_min = 10;
            let phone_length_max = 11;
            // create variable check status
            var is_valid = true;

            if(mobile_number.length < phone_length_min || mobile_number.length > phone_length_max ){
                is_valid = false ;
            } else{
                is_valid = true;
            }
            return is_valid;
        };
        
        // jQuery.validator.addMethod('limitday', function (value, element) {
        //     let response;
        //     let url = "{{ route('ajax.check-limit-order') }}";
        //     let data = {
        //         phone_number : value,
        //         date: current_date,
        //         _token : $('meta[name="csrf-token"]').attr('content')
        //     }
        //     $.ajax({
        //         type: "POST",
        //         url: url,
        //         data: data,
        //         async:false,
        //         success:function(data){
        //             response = data;
        //         }
        //     });
        //     if(response > 2){
        //         return false;
        //     } else{
        //         return true;
        //     }
        // }, "*Số điện thoại đã quá lần đặt trong ngày");

        // jQuery.validator.addMethod('limitList', function (value, element) {
        //     let response;
        //     let url = "{{ route('ajax.check-limited-list') }}";
        //     let data = {
        //         phone_number: value,
        //         _token : $('meta[name="csrf-token"]').attr('content')
        //     };
        //     $.ajax({
        //         type: "POST",
        //         url: url,
        //         data: data,
        //         async:false,
        //         success:function(data){
        //             response = data;
        //         }
        //     });
        //     if(response > 0){
        //         return false;
        //     } else{
        //         return true;
        //     }
        // }, "*Số điện thoại nằm trong danh sách hạn chế");

        // Validation with Jquery validation
        $('#booking-form').validate({
            ignore: 'input[type="hidden"]',
            rules: {
                phone_number: {
                    required: true,
                    phoneNumberVietNam: true,
                    // limitday: true,
                    // limitList:true
                },
                full_name:{
                    required:true,
                    onlyVietnamese: true,
                    maxlength: 100             
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
                    remote: "*Bạn đã đặt quá số lần quy định"
                },
                full_name:{
                    required:"*Mời bạn nhập vào họ và tên",
                    maxlength:"*Không được vượt quá 100 ký tự"
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
        $('select').on('change', function() {
            $(this).valid();
        });
        // submit form send ajax 
        $('#btn-booking').click(function(e){
            let form = $('#booking-form');
            e.preventDefault();
            
            if( form.valid() ){
                let data = {
                    branch_id: $('.btn-address-booking.active').attr('data-branch-id'),
                    phone_number: $('#phone_number').val(),
                    full_name: $('#full_name').val(),
                    service_id: $('#service_id').find(":selected").val(),
                    user_id: $('#user_id').find(":selected").val(),
                    date: moment($('#select-day .btn_primary').attr('data-date')).format(date_format_pttrn),
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
                            setTimeout(function(){
                                window.location.href = "/";
                            },4500)
                            Swal.fire({
                                type: 'success',
                                title: 'Bạn đã đặt lịch thành công !, chúng tôi sẽ liên hệ với bạn sớm nhất có thể.'
                            }).then(function() {
                                window.location.href = "/";
                            });
                        }
                        if (data.fail){
                            Swal.fire({
                                type: 'error',
                                title: 'Đặt lịch thất bại !.'
                            });
                        }
                        if (data.error){
                            Swal.fire({
                                type: 'error',
                                title: 'Thời gian bạn chọn đã được người khác đặt.'
                            });
                        }
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                });
            }
        }) ;     
    });
</script>
  
@endsection
