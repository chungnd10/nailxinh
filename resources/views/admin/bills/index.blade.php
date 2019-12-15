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
                <div class="box form-advanced-search">
                    <div class="box-body">
                        <form method="get" action="{{ route('bills.advanced-search') }}">
                            @csrf
                            <div class="row">
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <input type="text"
                                           class="form-control pull-right"
                                           id="phone_number"
                                           name="phone_number"
                                           value="{{ old('phone_number') }}"
                                           placeholder="Số điện thoại">
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
                                <th width="40">STT</th>
                                <th width="100">Khách hàng</th>
                                <th>Số điện thoại</th>
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
                                    <td>{{ $bill->phone_number }}</td>
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
                    <div class="box-footer">
                        @if($bills->count() > 0)
                            <div class="pull-left">
                                <p>Tổng số: <b>{{ $bills->total() }}</b> mục</p>
                            </div>
                        @endif
                        {!! $bills->appends($_GET)->links() !!}
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


            $('.btn-reset-form').click(function () {
                $('#phone_number').val('');
                $('#start_date').val('');
                $('#end_date').val('');
            });

            //data table
            $('#datatable').DataTable({
                "language": {
                    url: "{{ asset('admin_assets/bower_components/datatables.net-bs/lang/vietnamese-lang.json') }}"
                },
                'paging': false,
                'lengthChange': false,
                 "bInfo" : false,
                'searching': false,
                'ordering': true,
                'autoWidth': false,
                "scrollX": true,
                "responsive": true,
                "columnDefs": [{"orderable": false, "targets": 'nosort'}]

            });
        });
    </script>
@endsection
