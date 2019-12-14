@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>hoá đơn</small>
        </h1>
        <ol class="breadcrumb">
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
                                <th width="40">STT</th>
                                <th width="100">Khách hàng</th>
                                <th>Tổng tiền(VNĐ )</th>
                                <th>Ngày tạo</th>
                                <th width="100">Trạng thái</th>
                                <th class="nosort" width="80">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bills as $key => $bill)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $bill->full_name }}</td>
                                    <td>{{ number_format($bill->total_payment, 0, ',', '.') }}</td>
                                    <td>{{ date('H:i d-m-Y', strtotime($bill->created_at)) }}</td>
                                    <td>
                                        <i class="fa fa-tag {{ tagColorStatus($bill->billStatus->name) }}"></i>
                                        {{ $bill->billStatus->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('bills.show', Hashids::encode($bill->id)) }}"
                                           class="btn btn-xs btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if($bill->bill_status_id == config('contants.bill_status_unpaid'))
                                            <a href="{{ route('bills.update', Hashids::encode($bill->id)) }}"
                                               class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @endif
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

            //data table
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
        });
    </script>
@endsection
