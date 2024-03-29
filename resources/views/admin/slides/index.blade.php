@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>slides</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('slides.create') }}" class="btn btn-sm btn-success">
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
                        <table class="table table-bordered table-hover" id="slides_table">
                            <thead>
                            <tr>
                                <th width="40">STT</th>
                                <th class="nosort" width="100">Ảnh</th>
                                <th>Tiêu đề</th>
                                <th width=100>Trạng thái</th>
                                <th class="nosort" width="100">URL</th>
                                <th class="nosort" width="70">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slides as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
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
                                                   data-id="{{ Hashids::encode($item->id) }}"
                                                    {{ $item->display_status_id == config('contants.display_status_display') ? 'checked' : ''}}
                                            >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>{{ $item->url }}</td>
                                    <td>
                                        <a href="{{ route('slides.show', Hashids::encode($item->id)) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('slides.destroy', Hashids::encode($item->id)) }}"
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

            //datatable
            $('#slides_table').DataTable({
                "language": {
                    url: "{{ asset('admin_assets/bower_components/datatables.net-bs/lang/vietnamese-lang.json') }}"
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

            // change status
            $('.display_status_id').change(function () {

                let hidden = "{{ config('contants.display_status_hide') }}";
                let display = "{{ config('contants.display_status_display') }}";
                let display_status_id = $(this).prop('checked') === true ? display : hidden;
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
                    url: "{{ route('slides.change-status') }}",
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
        });
    </script>
@endsection
