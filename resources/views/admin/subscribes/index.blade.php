@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>đăng ký nhận tin khuyến mãi</small>
        </h1>
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
                            <table class="table table-bordered table-hover" id="restricted_lists_table">
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
                                    <th>Email</th>
                                    <th>Ngày đăng ký</th>
                                    <th width="80">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribes as $key => $item)
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
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->created_at != null)
                                                {{ $item->created_at->format('H:i d/m/Y') }}
                                            @else
                                                <p>Trống</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('subscribe.destroy', Hashids::encode($item->id)) }}"
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
                                <button class="btn btn-sm btn-danger btn-delete-many"
                                        type="submit" style="display: none">Xoá mục đã chọn</button>
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
            var checkAll = $('#checkedAll');
            var checkboxes = $('.delete-many');
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
                } else {
                    checkAll.prop('checked', false);
                }
                checkAll.iCheck('update');
            });


            var numberChecked = $('.delete-many:checked').length;
            if (numberChecked > 0){
                $('.btn-delete-many:checked').css('display', 'block');
            }

            //data table
            $('#restricted_lists_table').DataTable({
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
                        "targets": [0, 4]
                    }
                ]
            });

        });
    </script>
@endsection
