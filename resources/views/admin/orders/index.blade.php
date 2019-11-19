@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>lịch đặt</small>
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
                                <th width="100">Người đặt</th>
                                <th>Dịch vụ</th>
                                <th width="100">Thời gian</th>
                                <th width="100">Trạng thái</th>
                                <th width="80">
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
                                        <td>{{ $order->orderStatus->name }}</td>
                                        <td>
                                            <a href="#"
                                               class="btn btn-xs btn-primary"
                                               data-toggle="modal"
                                               data-target="#modal-{{ Hashids::encode($order->id,'123456789') }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @can('update-orders')
                                                <a href="{{ route('orders.show', Hashids::encode($order->id,'123456789')) }}"
                                                   class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @foreach($orders as $key => $order)
                            <div class="modal fade" id="modal-{{ Hashids::encode($order->id,'123456789') }}" style="display: none;">
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
                                                    <td>{{ $order->phone_number }}</td>
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
                                                    <td>{{ $order->user->full_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Trạng thái:</th>
                                                    <td>{{ $order->orderStatus->name }}</td>
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
                                                            <i>- ( {{ date('H:i d-m-Y', strtotime($order->created_at)) }}) </i>
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
                        "targets": [5]
                    }
                ],

            });
        });
    </script>
@endsection
