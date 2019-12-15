jQuery(document).ready(function($) {
    $('#btn-booking').click(function() {
        let time_frame = $('.time-frame.btn_primary');
        if (time_frame.length === 0) {
            $('.text-error2').show();
            return false;
        } else {
            $('.text-error2').hide();
            return true;
        }
    });
});