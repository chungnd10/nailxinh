@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>loại dịch vụ</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('type-services.create') }}"
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
                        <table class="table table-bordered table-hover" id="type_services_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên loại dịch vụ</th>
                                <th class="nosort">Ảnh</th>
                                <th class="nosort">Slug</th>
                                <th >Số dịch vụ</th>
                                <th class="nosort" width="70">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($type_services as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img width="50" style="border-radius: 50%" src="upload/images/type_services/{{ $item->image }}" alt="image">
                                    </td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->countServicesWithType($item->id) }}</td>
                                    <td>
                                        <a href="{{ route('type-services.show', Hashids::encode($item->id)) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('type-services.destroy', Hashids::encode($item->id)) }}"
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
            $('#type_services_table').DataTable({
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
