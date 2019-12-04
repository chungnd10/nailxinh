
$(document).ready(function () {

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });
    //end

    //check all
    let checkAll = $('#checkedAll');
    let checkboxes = $('.delete-many');
    checkAll.on('ifChecked ifUnchecked', function (event) {
        if (event.type === 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });
    //end

    checkboxes.on('ifChanged', function () {
        if (checkboxes.filter(':checked').length === checkboxes.length) {
            checkAll.prop('checked', 'checked');
            console.log(checkboxes.filter(':checked').length);
        } else {
            checkAll.prop('checked', false);
            console.log(checkboxes.filter(':checked').length);
        }
        checkAll.iCheck('update');

        if (checkboxes.filter(':checked').length >= 1) {
            $('.btn-delete-many').css('display', 'block');
        } else {
            $('.btn-delete-many').css('display', 'none');
        }
    });
    //end

    //data table
    $('#photo-library-table').DataTable({
        "language": {
            "emptyTable": "Không có bản ghi nào",
            "zeroRecords": "Không tìm thấy bản ghi nào",
            "decimal": "",
            "info": "Hiển thị _START_ đến _END_ trong _TOTAL_ mục",
            "infoEmpty": "Hiển thị 0 đến 0 trong số 0 mục",
            "infoFiltered": "(Được lọc từ tổng số  _MAX_ mục)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Hiển thị _MENU_ mục",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Sau",
                "previous": "Trước"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
        },
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'autoWidth': true,
        "responsive": true,
        "columnDefs": [
            {
                "orderable": false,
                "targets": [0, 5]
            }
        ]
    });
    //end



});
