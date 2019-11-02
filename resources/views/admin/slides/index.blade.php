@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>slides</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="slides_table">
                            <thead>
                            <tr>
                                <th width="40" >ID</th>
                                <th width="100">Ảnh</th>
                                <th>Tiêu đề</th>
                                <th width=100>Trạng thái</th>
                                <th width="120">URL</th>
                                <th width="50">
                                    <a href="{{ route('slides.create') }}" class="btn btn-xs btn-success">
                                        <i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slides as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <img width="80"
                                             src="upload/images/slides/{{ $item->images }}">
                                    </td>
                                    <td>{{ $item->title }}</td>
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
                                    <td>{{ $item->url }}</td>
                                    <td>
                                        <a href="{{ route('slides.show', $item->id) }}" class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('slides.destroy', $item->id) }}"
                                           class="btn btn-xs btn-danger"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $slides->links() !!}
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
            $('#slides_table').DataTable({
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
                        "targets": [ 1,4,5]
                    }
                ]
            });

            // change status
            $('.display_status_id').change(function () {
                var display_status_id = $(this).prop('checked') === true ? "{{ config('contants.display_status_display') }}" : "{{ config('contants.display_status_hide') }}";
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('slides.change-status') }}",
                    data: {'display_status_id': display_status_id, 'id': id},
                    success: function (data) {
                        console.log(data.success)
                    }
                });
            })
            //end change status
        });
    </script>
@endsection
