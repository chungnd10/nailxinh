@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>lịch đặt</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box form-advanced-search">
                    <div class="box-body">
                        <form method="get" action="{{ route('orders.advanced-search') }}">
                            @csrf
                            <div class="row">
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <input type="text"
                                           class="form-control pull-right"
                                           id="user_order"
                                           name="user_order"
                                           value="{{ old('user_order') }}"
                                           placeholder="Số điện thoại">
                                </div>
                                @if(Auth::user()->role_id == config('contants.role_admin'))
                                    <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-6">
                                        <select name="branch_id" class="form-control" id="branch_id">
                                            <option value="">Tất cả chi nhánh</option>

                                                @foreach($branches as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if(old('branch_id') == $item->id)
                                                            selected
                                                            @endif
                                                    >{{ $item->name . ', ' . $item->address }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if(Auth::user()->role_id != config('contants.role_technician'))
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Tất cả nhân viên</option>
                                        @foreach($technicians as $item)
                                            <option value="{{ $item->id }}"
                                                    @if(old('user_id') == $item->id)
                                                    selected
                                                    @endif
                                            >{{ $item->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                @if(Auth::user()->role_id != config('contants.role_technician'))
                                    <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3 ">
                                        <select name="order_status_id" id="order_status_id" class="form-control">
                                            <option value="">Tất cả trạng thái</option>
                                            @foreach($order_status as $item)
                                                <option value="{{ $item->id }}"
                                                        @if(old('order_status_id') == $item->id)
                                                        selected
                                                        @endif
                                                >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <div class="input-group date input-date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                               class="form-control pull-right"
                                               id="start_date"
                                               name="start_date"
                                               value="{{ old('start_date') }}"
                                               placeholder="Ngày bắt đầu">
                                    </div>
                                </div>
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3 ">
                                    <div class="input-group date input-date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                               class="form-control pull-right"
                                               id="end_date"
                                               name="end_date"
                                               value="{{ old('end_date') }}"
                                               placeholder="Ngày kết thúc">
                                    </div>
                                </div>
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3 "
                                     style="box-sizing: border-box">
                                    <div class="input-group date input-date">
                                        <button class="btn btn-primary">
                                            Tìm kiếm
                                        </button>
                                        <button type="button" style="margin-left: 10px"
                                                class="btn btn-default btn-reset-form">
                                            <i class="fa fa-refresh"></i>
                                        </button>
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
                                <th>STT</th>
                                <th>Người đặt</th>
                                <th>Số điện thoại</th>
                                <th>Kỹ thuật viên</th>
                                <th>Thời gian đặt</th>
                                <th>Trạng thái</th>
                                <th>Chi nhánh</th>
                                <th class="nosort">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->full_name }}</td>
                                    <td>{{ $order->phone_number }}</td>
                                    <td>{{ $order->user->full_name }}</td>
                                    <td>{{ date('H:i d-m-Y', strtotime($order->time)) }}</td>
                                    <td>
                                        <i class="fa fa-tag {{ tagColorStatus($order->orderStatus->name) }}"></i>
                                        {{ $order->orderStatus->name }}
                                    </td>
                                    <td>{!!  $order->branch->name. ', '.$order->branch->address !!} </td>
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
                                        @can('remove-orders')
                                            @if($order->order_status_id != config('contants.order_status_finish'))
                                                <a href="{{ route('orders.destroy', Hashids::encode($order->id)) }}"
                                                   class="btn btn-xs btn-danger"
                                                   onclick="return confirmDelete()"
                                                >
                                                    <i class="fa fa-trash"></i>
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
                                                    <th>Cập nhật lần cuối bởi:</th>
                                                    <td>
                                                        @if($order->updated_by != '')
                                                            {{ $order->getNameUpdatedBy($order->updated_by) }}
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
                    <div class="box-footer">
                        @if($orders->count() > 0)
                            <div class="pull-left">
                                <p>Tổng số: <b>{{ $orders->total() }}</b> mục</p>
                            </div>
                        @endif
                        {!! $orders->appends($_GET)->links() !!}
                    </div>
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

            let branch = $('#branch_id');
            let select_user_id = $("#user_id");
            let url_get_users_with_branch = "{{ route('get-users-with-branch') }}";
            let branch_id = branch.val();
            let old_user_id = "{{ old('user_id') }}";
            let select_user = select_user_id.val;

            //start: lay ky thuat vien theo chi nhanh
            function getUserWithBranch(url, branch_id, old_user_id) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url,
                    data: {'branch_id': branch_id},
                    success: function (data) {
                        select_user_id.html('');
                        select_user_id.append("<option value=''>Tất cả nhân viên</option>");
                        $.each(data, function (key, value) {
                            let selected = parseInt(value.id) === parseInt(old_user_id) ? 'selected' : '';
                            $("#user_id").append(
                                "<option value='" + value.id + "'" + selected + ">" + value.full_name + "</option>"
                            );
                        });
                    }
                });
            }
            //end:lay ky thuat vien theo chi nhanh

            //start: lay khi co thay doi
            branch.change(function () {
                let branch_id = branch.val();
                getUserWithBranch(url_get_users_with_branch, branch_id, old_user_id);
            });
            //end: lay khi co thay doi

            //start: lay khi load xong trang
            if (branch_id !== '') {
                select_user_id.val('');
                getUserWithBranch(url_get_users_with_branch, branch_id, old_user_id);
            }
            //end: lay khi load xong trang

            // display form search
            $('.btn-reset-form').click(function () {
                $('#user_order').val('');
                $('#branch_id').val('');
                $('#user_id').val('');
                $('#order_status_id').val('');
                $('#start_date').val('');
                $('#end_date').val('');
            });

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
                    url: "{{ asset('admin_assets/bower_components/datatables.net-bs/lang/vietnamese-lang.json') }}"
                },
                'paging': false,
                'lengthChange': false,
                'searching': false,
                "bInfo" : false,
                'ordering': true,
                'autoWidth': false,
                "scrollX": true,
                "responsive": true,
                "columnDefs": [{"orderable": false, "targets": 'nosort'}]

            });
        });
    </script>
@endsection
