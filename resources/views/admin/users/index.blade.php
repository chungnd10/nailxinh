@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>người dùng</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('users.create') }}"
               class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i> Thêm</a>
        </ol>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="users_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th class="nosort" width="60">Ảnh</th>
                                <th>Số điện thoại</th>
                                <th>Quyền</th>
                                <th>Chi nhánh</th>
                                <th class="nosort" width="70">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>
                                        <img width="50" style="border-radius: 50%"
                                             src="upload/images/users/{{ $item->avatar }}" alt="avatar">
                                    </td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->role->name }}</td>
                                    <td>{{ $item->branch->name.", ".$item->branch->address  }}</td>
                                    <td>
                                        <a href="{{ route('users.show', Hashids::encode($item->id)) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('users.destroy', Hashids::encode($item->id)) }}"
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

        //data table
        $('#users_table').DataTable({
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

    </script>
@endsection
