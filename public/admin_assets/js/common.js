$(document).ready(function () {

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true,
        dateFormat: 'yyyy-mm-dd'
    });

});

//more text
function moreText(showChar) {
    var ellipsestext = "...";
    var moretext = "Xem thêm >";
    var lesstext = "Ẩn bớt >";

    $('.more').each(function () {
        var content = $(this).html();
        if (content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span>' +
                '<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;' +
                '<a href="javascript:void(0);" class="morelink">' + moretext + '</a></span>';
            $(this).html(html);
        }
    });
    $(".morelink").click(function () {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
}

//get base64
function getBase64(file, selector) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
        $(selector).attr('src', reader.result);
    };
    reader.onerror = function (error) {
        console.log('Error: ', error);
    };
}


//confirm back
function confirmmBack() {
    return confirm('Mọi thay đổi sẽ không được lưu!');
}

//confirm delete
function confirmDelete() {
    return confirm('Bạn có chắc chắn muốn xóa? ');
}

