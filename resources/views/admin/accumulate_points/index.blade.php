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
                                <th width="40">ID</th>
                                <th>Số điện thoại</th>
                                <th>Tổng tiển</th>
                                <th>Loại thành viên</th>
                                <th width="80">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($points as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ number_format($item->total_money,2,",",".") }}</td>
                                    <td>{{ $item->membership_type->title }}</td>
                                    <td>
                                        <a href="{{ route('accumulate-points.destroy', $item->id) }}"
                                           class="btn btn-xs btn-danger"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                    </td>
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
                    "infoEmpty": "Không có bản ghi nào",
                    "zeroRecords": "Không có bản ghi nào"
                },
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": [3, 4]
                    }
                ],

            });
        });
    </script>
@endsection
