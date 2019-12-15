@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>tích điểm</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="accumulate_points_table">
                            <thead>
                            <tr>
                                <th class="nosort" width="40">STT</th>
                                <th>Số điện thoại</th>
                                <th>Họ và tên</th>
                                <th>Tổng tiển</th>
                                @can('remove-accumulate-points')
                                    <th class="nosort" width="80">Hành động</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($points as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ '0'.$item->phone_number }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>{{ number_format($item->total_money,0,",",".") }}</td>
                                    @can('remove-accumulate-points')
                                        <td>
                                            <a href="{{ route('accumulate-points.destroy', Hashids::encode($item->id)) }}"
                                               class="btn btn-xs btn-danger"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fa fa-trash"></i> Xóa
                                            </a>
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
            $('#accumulate_points_table').DataTable({
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
        });
    </script>
@endsection
