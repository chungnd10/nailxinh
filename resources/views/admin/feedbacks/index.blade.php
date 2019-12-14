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
                                    <th >STT</th>
                                    <th class="nosort">Ảnh</th>
                                    <th >Họ tên</th>
                                    <th class="nosort">Nội dung</th>
                                    <th >Ngày tạo</th>
                                    <th >Người tạo</th>
                                    @can('edit-feedback')
                                        <th class="nosort">Trạng thái</th>
                                        <th class="nosort">Hành động</th>
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
                                        <td><span class="more normal">{{ $item->content }}</span></td>
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
                    url: "{{ asset('admin_assets/bower_components/datatables.net-bs/lang/vietnamese-lang.json') }}"
                },
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'autoWidth': false,
                "scrollX": true,
                'ordering': true,
                "responsive": true,
                "columnDefs": [{ "orderable": false, "targets": 'nosort' }]
            });

            // hide content
            moreText(50);
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
