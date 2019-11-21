
jQuery(document).ready(function($) {


    $('#booking-form').validate({
        ignore: 'input[type="hidden"]',
        rules: {
            phone_number: {
                required: true,
                minlength:10, 
                maxlength:11
            },
            full_name:{
                required:true                
            },
            service_id:{
                required:true
            },
            date:{
                required:true
            }
        },
        messages: {
            phone_number:{
                required: "Mời bạn nhập vào số điện thoại",
                minlength:"Bạn cần nhập ít nhất 10 số",
                maxlength:"Bạn được nhập tối đa là 11 số"
            },
            full_name:{
                required:"Mời bạn nhập vào họ và tên"
            },
            service_id:{
                required:"Mời bạn chọn dịch vụ"
            },
            date:{
                required:"Mời bạn chọn ngày"
            }
        }
    });
    $('select').on('change', function() {
        $(this).valid();
    });

    $('#btn-booking').click(function(){

        let adress = $('.btn-adress-booking.active').val();
        let phone = $('#phone_number').val();
        let gender = $('#gender').find(":selected").text();
        let service_id = $('#service_id').find(":selected").val();
        let user_id = $('#user_id').find(":selected").val();
        let date =  $('#date').val();
        let time_frame = $('.time-frame.active').val();
        let note = $('#ghichu').val();
        if( !adress ){
            $('.text-error').css('display','block');
        }else{
            $('.text-error').css('display','none');
            return true;
        }
        if( !time_frame ){
            $('.text-error2').css('display','block');
        }else{
            $('.text-error2').css('display','none');
            return true;
        }
        console.log(adress,phone,gender,service_id,user_id,date,time_frame,note);
    });
});
