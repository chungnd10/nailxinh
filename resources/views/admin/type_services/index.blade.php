@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>loại dịch vụ</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="type_services_table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên loại dịch vụ</th>
                                <th>Ảnh</th>
                                <th>Đường dẫn</th>
                                <th>Số dịch vụ</th>
                                <th width="50">
                                    <a href="{{ route('type-services.create') }}" class="btn btn-xs btn-success">
                                        <i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($type_services as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img width="50" src="upload/images/type_services/{{ $item->image }}" alt="image">
                                    </td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->countServicesWithType($item->id) }}</td>
                                    <td>
                                        <a href="{{ route('type-services.show', $item->id) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if($item->role_id != 1)
                                            <a href="{{ route('type-services.destroy', $item->id) }}"
                                               class="btn btn-xs btn-danger"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
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
            //datatable
            $('#type_services_table').DataTable({
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
                        "targets": [2, 3, 4, 5]
                    }
                ]
            });
        });
    </script>
@endsection
