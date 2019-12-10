@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>phản hồi</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('feedbacks.create') }}"
               class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i> Thêm
            </a>
        </ol>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="feedbacks_table">
                            <thead>
                                <tr>
                                    <th width="40" >STT</th>
                                    <th width="100" class="nosort">Ảnh</th>
                                    <th width="100">Họ tên</th>
                                    <th width="150" class="nosort">Nội dung</th>
                                    <th width="120">Ngày tạo</th>
                                    <th width="120">Người tạo</th>
                                    @can('edit-feedback')
                                        <th width="70" class="nosort">Trạng thái</th>
                                        <th width="70" class="nosort">Hành động</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feedbacks as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img width="80" style="border-radius: 50%"
                                                 src="upload/images/feedbacks/{{ $item->image }}">
                                        </td>
                                        <td>{{ $item->full_name }}</td>
                                        <td><span class="more">{{ $item->content }}</span></td>
                                        <td>{{ date('H:i d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->user->full_name }}</td>
                                        @can('edit-feedback')
                                            <td>
                                                <span class="hidden">{{ $item->display_status_id }}</span>
                                                <label class="switch">
                                                    <input type="checkbox"
                                                           name="display_status_id"
                                                           class="display_status_id"
                                                           data-id="{{ $item->id }}"
                                                            {{ $item->display_status_id == config('contants.display_status_display') ? 'checked' : ''}}
                                                    >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        @endcan
                                        @can('edit-feedback')
                                            <td>
                                                @can('edit-feedback')
                                                    <a href="{{ route('feedbacks.show', Hashids::encode($item->id)) }}"
                                                       class="btn btn-xs btn-warning">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                @endcan
                                                @can('remove-feedback')
                                                    <a href="{{ route('feedbacks.destroy', Hashids::encode($item->id)) }}"
                                                       class="btn btn-xs btn-danger"
                                                       onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endcan
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
            $('#feedbacks_table').DataTable({
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
                'autoWidth': true,
                'ordering': true,
                "responsive": true,
                "columnDefs": [{ "orderable": false, "targets": 'nosort' }]
            });

            // hide content
            moreText(100);
            //end hide content

            // change status
            $('.display_status_id').change(function () {
                let display_status_id = $(this).prop('checked') === true ? "{{ config('contants.display_status_display') }}" : "{{ config('contants.display_status_hide') }}";
                let id = $(this).data('id');

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 5000,
                    showCloseButton: true
                });

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('feedbacks.change-status') }}",
                    data: {'display_status_id': display_status_id, 'id': id},
                    success: function () {
                        Toast.fire({
                            type: 'success',
                            title: 'Thay đổi thành công'
                        })
                    },
                    error: function () {
                        Toast.fire({
                            type: 'error',
                            title: 'Thay đổi thất bại'
                        })
                    },

                });
            })
            //end change status
        })
        ;
    </script>
@endsection
