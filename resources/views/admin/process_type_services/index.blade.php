@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>quy trình thực hiện</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('process-type-services.create') }}"
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
                        <table class="table table-bordered table-hover" id="datatable">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th width="160">Tên quy trình</th>
                                <th width="100">Dịch vụ</th>
                                <th>Bước</th>
                                <th class="nosort">Mô tả</th>
                                <th class="nosort" width="70">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($processTypeServices as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->services->name }}</td>
                                    <td>{{ $item->step }}</td>
                                    <td>
                                        <span class="more">
                                            {{$item->content}}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('process-type-services.show', Hashids::encode($item->id)) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('process-type-services.destroy', Hashids::encode($item->id)) }}"
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
            $('#datatable').DataTable({
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
                "columnDefs": [{"orderable": false, "targets": 'nosort'}]
            });

            // hide content
            moreText(50);
            //end hide content
        });
    </script>
@endsection
