@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>chi nhánh</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('branch.create') }}"
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
                        <table class="table table-bordered table-hover dataTable" id="branchs_table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên chi nhánh</th>
                                    <th>Số điện thoại</th>
                                    <th class="nosort">Địa chỉ</th>
                                    <th>Nhân sự</th>
                                    <th>Thành phố</th>
                                    <th class="nosort"> Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($branchs as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->address}}</td>
                                    <td>{{ $item->countUserWithBranch($item->id) }}</td>
                                    <td>{{ $item->city->name}}</td>
                                    <td>
                                        <a href="{{ route('branch.show', Hashids::encode($item->id) ) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('branch.destroy', Hashids::encode($item->id)) }}"
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
            $('#branchs_table').DataTable({
                "language": {
                    url: "{{ asset('admin_assets/bower_components/datatables.net-bs/lang/vietnamese-lang.json') }}"
                },
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'autoWidth': false,
                'ordering': true,
                "responsive": true,
                "scrollX": true,
                "columnDefs": [{ "orderable": false, "targets": 'nosort' }]
            });
        });
    </script>
@endsection
