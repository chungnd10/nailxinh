@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>lịch đặt</small>
        </h1>
        <ol class="breadcrumb">
            @can('add-orders')
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
                    <div class="box-body">
                        <form method="get" action="">
                            <div class="row">
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <select name="branch_id" class="form-control">
                                        <option value="">Tất cả chi nhánh</option>
                                    </select>
                                </div>
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <select name="user_id" class="form-control">
                                        <option value="">Tất cả nhân viên</option>
                                    </select>
                                </div>
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <div class="input-group date input-date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                               class="form-control pull-right"
                                               id="start_date"
                                               name="start_date"
                                               placeholder="Ngày bắt đầu">
                                    </div>
                                </div>
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <div class="input-group date input-date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                               class="form-control pull-right"
                                               id="end_date"
                                               name="end_date"
                                               placeholder="Ngày kết thúc">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="datatable">
                            <thead>
                            <tr>
                                <th width="40">STT</th>
                                <th width="100">Người đặt</th>
                                <th>Dịch vụ</th>
                                <th width="100">Thời gian</th>
                                <th width="100">Trạng thái</th>
                                <th class="nosort" width="80">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->full_name }}</td>
                                    <td>{{ $order->getNameServices($order->service_id) }}</td>
                                    <td>{{ date('H:i d-m-Y', strtotime($order->time)) }}</td>
                                    <td>
                                        <i class="fa fa-tag {{ tagColorStatus($order->orderStatus->name) }}"></i>
                                        {{ $order->orderStatus->name }}
                                    </td>
                                    <td>
                                        <a href="#"
                                           class="btn btn-xs btn-primary"
                                           data-toggle="modal"
                                           data-target="#modal-{{ Hashids::encode($order->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @can('update-orders')
                                            @if($order->order_status_id == config('contants.order_status_finish'))
                                                @if($order->checkPaid($order->id) == false)
                                                    <a href="{{ route('orders.show', Hashids::encode($order->id)) }}"
                                                       class="btn btn-xs btn-warning">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                @endif
                                            @else
                                                <a href="{{ route('orders.show', Hashids::encode($order->id)) }}"
                                                   class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endif
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @foreach($orders as $key => $order)
                            <div class="modal fade" id="modal-{{ Hashids::encode($order->id) }}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button"
                                                    class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title">Chi tiết lịch đặt</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Người đặt:</th>
                                                    <td>{{ $order->full_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Số điện thoại</th>
                                                    <td>
                                                        {{ $order->phone_number }}&nbsp;&nbsp;&nbsp;
                                                        @can('add-restricted-lists')
                                                            <a href="{{ route('restricted-lists.add', $order->phone_number) }}"
                                                               class="btn btn-xs btn-danger"
                                                               onclick="return confirm('Bạn có chắc chắn muốn thêm số điện thoại này vào danh sách hạn chế ?')">
                                                                <i class="fa fa-exclamation-triangle"></i>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Thời gian:</th>
                                                    <td>{{ date('H:i d-m-Y', strtotime($order->time)) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dịch vụ:</th>
                                                    <td>{{ $order->getNameServices($order->service_id) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kỹ thuật viên:</th>
                                                    <td>
                                                        @if($order->user_id == null)
                                                            Chưa xác định
                                                        @else
                                                            {{ $order->user->full_name }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Trạng thái:</th>
                                                    <td>
                                                        <i class="fa fa-tag {{ tagColorStatus($order->orderStatus->name) }}"></i>
                                                        {{ $order->orderStatus->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Người tạo:</th>
                                                    <td>
                                                        @if($order->created_by != "")
                                                            {{$order->created_by }}
                                                        @else
                                                            Khách hàng
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Cập nhật lần cuối bởi:</th>
                                                    <td>
                                                        @if($order->updated_by != '')
                                                            {{ $order->updated_by }}
                                                            <i>-
                                                                ( {{ date('H:i d-m-Y', strtotime($order->updated_at)) }}
                                                                ) </i>
                                                        @else
                                                            Không có
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Chi nhánh:</th>
                                                    <td>{{ $order->branch->name.', '.$order->branch->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ghi chú:</th>
                                                    <td>
                                                        @if($order->note != '')
                                                            <p>{{ $order->note }}</p>
                                                        @else
                                                            <p>Không có</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            @can('print-bills')
                                                <a href="{{ route('orders.export-bill', Hashids::encode($order->id)) }}"
                                                   class="btn btn-success pull-left">
                                                    <i class="fa fa-external-link"></i>
                                                    Xuất hóa đơn
                                                </a>
                                            @endcan
                                            <button type="button" class="btn btn-default pull-right"
                                                    data-dismiss="modal">
                                                Đóng
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        @endforeach
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

            //date start
            $('#start_date').datetimepicker({
                format: 'yyyy-mm-dd hh:00',
                minView: 1,
                autoclose: true
            });

            //date end
            $('#end_date').datetimepicker({
                format: 'yyyy-mm-dd hh:00',
                minView: 1,
                autoclose: true
            });

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
                'autoWidth': false,
                "scrollX": true,
                "responsive": true,
                "columnDefs": [{"orderable": false, "targets": 'nosort'}]

            });
        });
    </script>
@endsection
