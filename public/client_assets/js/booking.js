
(function($) {
    "use strict";
    jQuery(document).ready(function($) {


        $('#booking-form').validate({
            rules: {
                phone_number: {
                required: true,
                matches:"[0-9\-\(\)\s]+",
                minlength:10, 
                maxlength:11
                }
            },
            messages: {
                phone_number:{
                    required: "Mời bạn nhập vào số điện thoại"
                }
            }
        });

        $('#btn-booking').click(function(){
            let adress = $('.btn-adress-booking.active').val();
            let phone = $('#phone_number').val();
            let gender = $('#gender').find(":selected").text();
            let service_id = $('#service_id').find(":selected").text();
            let user_id = $('#user_id').find(":selected").text();
            let date =  $('#date').val();
            let time_frame = $('.time-frame.active').val();
            let note = $('#ghichu').val();
            
            console.log(adress,phone,gender,service_id,user_id,date,time_frame,note);
        });
    });
});