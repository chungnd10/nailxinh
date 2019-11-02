$(document).ready(function () {
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true,
        dateFormat: 'yyyy-mm-dd'
    });

});

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
