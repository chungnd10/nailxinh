@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>loại thành viên</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('membership_type.create') }}"
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
                        <table class="table table-bordered table-hover" id="membership_type_table">
                            <thead>
                            <tr>
                                <th width="40">STT</th>
                                <th>Tên</th>
                                <th width="100">Mức tiền(VND)</th>
                                <th width="120">Mức chiết khấu(%)</th>
                                <th>Mô tả</th>
                                @if(Auth::user()->can('edit-membership-type') || Auth::user()->can('remove-membership-type'))
                                    <th class="nosort" width="70">
                                        Hành động
                                    </th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($membership_type as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ number_format($item->money_level,0,",",".") }}</td>
                                    <td>{{ $item->discount_level }}</td>
                                    <td>
                                        @if($item->description != "")
                                            <span class="more">
                                                {{ $item->description }}
                                            </span>
                                        @else
                                            <p>Không có mô tả</p>
                                        @endif
                                    </td>
                                    @if(Auth::user()->can('edit-membership-type') || Auth::user()->can('remove-membership-type'))
                                        <td>
                                            @can('edit-membership-type')
                                                <a href="{{ route('membership_type.show', Hashids::encode($item->id)) }}"
                                                   class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endcan
                                            @can('remove-membership-type')
                                                <a href="{{ route('membership_type.destroy', Hashids::encode($item->id)) }}"
                                                   class="btn btn-xs btn-danger"
                                                   onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    @endif
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

            //more text
            moreText(100);
        });
    </script>
@endsection
