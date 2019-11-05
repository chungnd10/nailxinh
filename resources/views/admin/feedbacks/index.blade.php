@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>phản hồi</small>
        </h1>
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
                                <th>ID</th>
                                <th width="100">Ảnh</th>
                                <th width="150">Họ tên</th>
                                <th>Nội dung</th>
                                <th width="70">Trạng thái</th>
                                <th width="80">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedbacks as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <img width="80" style="border-radius: 50%"
                                             src="upload/images/feedbacks/{{ $item->image }}">
                                    </td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>
                                        <span class="more">
                                            {{ $item->content }}
                                        </span>
                                    </td>
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
                                    <td>
                                        <a href="{{ route('feedbacks.destroy', $item->id) }}"
                                           class="btn btn-xs btn-danger"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $feedbacks->links() !!}
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
                'ordering': true,
                'autoWidth': true,
                "responsive": true,
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": [1, 3, 5]
                    }
                ]
            });

            // hide content
            moreText(100);
            //end hide content

            // change status
            $('.display_status_id').change(function () {
                var display_status_id = $(this).prop('checked') === true ? "{{ config('contants.display_status_display') }}" : "{{ config('contants.display_status_hide') }}";
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('feedbacks.update') }}",
                    data: {'display_status_id': display_status_id, 'id': id},
                    success: function (data) {
                        console.log(data.success)
                    }
                });
            })
            //end change status
        })
        ;
    </script>
@endsection
