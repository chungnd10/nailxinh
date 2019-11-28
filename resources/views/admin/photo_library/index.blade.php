@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thư viện ảnh
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('photo-library.create') }}" class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i> Thêm
            </a>
        </ol>
        <div class="modal fade" id="modal-create" style="display: none;">
            <div class="modal-dialog large">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body…</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('subscribe.delete-many') }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-hover" id="photo-library-table">
                                <thead>
                                <tr>
                                    <th width="30">
                                        <label class="">
                                            <div class="icheckbox_flat-green "
                                                 aria-checked="true"
                                                 aria-disabled="false"
                                            >
                                                <input type="checkbox" class="flat-red" id="checkedAll">
                                                <ins class="iCheck-helper"></ins>
                                            </div>
                                        </label>
                                    </th>
                                    <th width="40">STT</th>
                                    <th>Ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Trạng thái</th>
{{--                                    <th width="80">Hành động</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $key => $item)
                                    <tr>
                                        <td>
                                            <label class="">
                                                <div class="icheckbox_flat-green "
                                                     aria-checked="true"
                                                     aria-disabled="false"
                                                >
                                                    <input type="checkbox" class="flat-red delete-many"
                                                           name="deleteMany[]" value="{{$item->id}}">
                                                    <ins class="iCheck-helper"></ins>
                                                </div>
                                            </label>
                                        </td>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img width="100" src="upload/images/photo_library/{{ $item->image }}" alt="">
                                        </td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>
                                            <a href="{{ route('photo-library.destroy', Hashids::encode($item->id)) }}"
                                               class="btn btn-xs btn-danger"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fa fa-trash"></i> Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="form-footer">
                                <button class="btn btn-sm btn-danger btn-delete-many pull-left"
                                        type="submit" style="display: none; margin-right: 10px"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                >
                                    <i class="fa fa-trash"></i>&nbsp;Xoá mục đã chọn
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

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

            checkboxes.on('ifChanged', function (event) {
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

        });
    </script>
@endsection
