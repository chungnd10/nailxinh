@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>loại thành viên</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="membership_type_table">
                            <thead>
                            <tr>
                                <th width="40">ID</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th width="100">Mức tiền(VND)</th>
                                <th width="120">Mức chiết khấu(%)</th>
                                <th width="80">
                                    <a href="{{ route('membership_type.create') }}" class="btn btn-xs btn-success">
                                        <i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($membership_type as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ number_format($item->money_level,2,",",".") }}</td>
                                    <td>{{ $item->discount_level }}</td>
                                    <td>
                                        <a href="{{ route('membership_type.show', $item->id) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('membership_type.destroy', $item->id) }}"
                                           class="btn btn-xs btn-danger"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="fa fa-trash"></i>
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
            $('#membership_type_table').DataTable({
                "language": {
                    "emptyTable": "Không có bản ghi nào",
                    "infoEmpty": "Không có bản ghi nào",
                    "zeroRecords": "Không có bản ghi nào"
                },
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': true,
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": [2,5]
                    }
                ],

            });
        });
    </script>
@endsection
