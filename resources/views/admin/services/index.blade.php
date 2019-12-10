@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>loại dịch vụ</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('services.create') }}"
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
                        <table class="table table-bordered table-hover" id="services_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th width="100">Tên dịch vụ</th>
                                <th>Ảnh</th>
                                <th>Loại dịch vụ</th>
                                <th>Giá(VND)</th>
                                <th>Thời gian</th>
                                <th>Mô tả</th>
                                <th width="70">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img width="50" src="upload/images/service/{{ $item->image }}" alt="image">
                                    </td>
                                    <td width="100">{{ $item->typeService->name }}</td>
                                   	<td>{{ number_format($item->price,0,",",".")}}</td>
                                   	<td width="80">{{ $item->completion_time}}</td>
                                    <td>
                                        @if($item->description != "")
                                            <span class="more">
                                                {{$item->description}}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('services.show', Hashids::encode($item->id)) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('services.destroy', Hashids::encode($item->id)) }}"
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
            $('#services_table').DataTable({
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
                        "targets": [2, 6, 7]
                    }
                ]
            });

            // hide content
            moreText(80);
            //end hide content
        });
    </script>
@endsection
