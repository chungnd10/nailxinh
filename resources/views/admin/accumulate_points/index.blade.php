@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>tích điểm</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="accumulate_points_table">
                            <thead>
                            <tr>
                                <th class="nosort" width="40">STT</th>
                                <th>Số điện thoại</th>
                                <th>Họ và tên</th>
                                <th>Tổng tiển</th>
                                <th>Loại thành viên</th>
                                @can('remove-accumulate-points')
                                    <th class="nosort" width="80">Hành động</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($points as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ '0'.$item->phone_number }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>{{ number_format($item->total_money,0,",",".") }}</td>
                                    <td>{{ $item->membershipType($item->total_money) }}</td>
                                    @can('remove-accumulate-points')
                                        <td>
                                            <a href="{{ route('accumulate-points.destroy', $item->phone_number) }}"
                                               class="btn btn-xs btn-danger"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fa fa-trash"></i> Xóa
                                            </a>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

            //data table
            $('#accumulate_points_table').DataTable({
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
                'autoWidth': false,
                "scrollX": true,
                "responsive": true,
                "columnDefs": [{ "orderable": false, "targets": 'nosort' }]

            });
        });
    </script>
@endsection
