@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>người dùng</small>
        </h1>
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
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th width="60">Ảnh</th>
                                <th>Số điện thoại</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th width="50">
                                    <a href="{{ route('users.create') }}" class="btn btn-xs btn-success">
                                        <i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>
                                        <img width="50" style="border-radius: 50%"
                                             src="upload/images/users/{{ $item->avatar }}" alt="avatar">
                                    </td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->role->name }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox"
                                                   name="operation_status_id"
                                                   class="operation_status_id"
                                                   data-id="{{ $item->id }}"
                                                    {{ $item->operation_status_id == config('contants.operation_status_active') ? 'checked' : ''}}
                                            >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="{{ route('users.show', $item->id) }}" class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if($item->role_id != 1)
                                            <a href="{{ route('users.destroy', $item->id) }}"
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

        //data table
            $('#users_table').DataTable({
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
                        "targets": [ 2,6]
                    }
                ]
            });

        // change status
        $('.operation_status_id').change(function () {
            var operation_status_id = $(this).prop('checked') === true ?
                "{{ config('contants.operation_status_active') }}" :
                "{{ config('contants.operation_status_inactive') }}";
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('users.change-status') }}",
                data: {'operation_status_id': operation_status_id, 'id': id},
                success: function (data) {
                    console.log(data.success)
                }
            });
        })
        //end change status
    </script>
@endsection
