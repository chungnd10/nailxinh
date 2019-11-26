@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>hoá đơn</small>
        </h1>
        <ol class="breadcrumb">
            @can('update-orders')
                <a href="{{ route('orders.create') }}"
                   class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> Thêm
                </a>
            @endcan
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
                                <th>Kỹ thuật viên</th>
                                <th>Ngày tạo</th>
                                <th width="100">Trạng thái</th>
                                <th width="80">
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
                                        <td>{{ $bill->getNameUser($bill->user_id) }}</td>
                                        <td>{{ date('H:i d-m-Y', strtotime($bill->created_at)) }}</td>
                                        <td>
                                            <i class="fa fa-tag {{ tagColorStatus($bill->billStatus->name) }}" ></i>
                                            {{ $bill->billStatus->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('bills.show', Hashids::encode($bill->order_id, '123456789')) }}"
                                               class="btn btn-xs btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if($bill->bill_status_id == config('contants.bill_status_unpaid'))
                                                <a href="{{ route('bills.update', Hashids::encode($bill->id, '123456789')) }}"
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
                        "targets": [6]
                    }
                ],

            });
        });
    </script>
@endsection
