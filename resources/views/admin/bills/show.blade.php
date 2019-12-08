@extends('admin.layouts.index')
@section('content')
    <section class="content-header">
        <h1>
            Hoá đơn
        </h1>
    </section>
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <img src="client_assets/img/favicon.png" width="30"> NailXinh
                    <small class="pull-right">{{ date(' H:i d-m-Y') }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Chi nhánh:
                <address>
                    <strong>{{ $bill->branch->name }}</strong><br>
                    {{ $bill->branch->address }}<br>
                    {{ $bill->branch->phone_number }}<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Khách hàng:
                <address>
                    <strong>{{ $bill->full_name }}</strong><br>
                    {{ $bill->phone_number }}<br>
                </address>
            </div>
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên dịch vụ</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng phụ(VNĐ)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bill->getServices($bill->service_id) as $key => $service)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ number_format($service->price, 0, ',', '.') }}</td>
                                <td>1</td>
                                <td>{{ number_format($service->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <h4>Ghi chú:</h4>
                @if($bill->note != "")
                    <i>{{'- '.$bill->note }}</i>
                @else
                    <i>- Không</i>
                @endif
            </div>
            <div class="col-xs-6 ">
                <p class="lead">Ngày thanh toán {{ date( 'd-m-Y') }}</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Tổng tiền:</th>
                            <td>{{ number_format($bill->total_price, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Chiết khấu</th>
                            <td>{{ $bill->discount }} %</td>
                        </tr>
                        <tr>
                            <th>Tổng tiền thanh toán(VNĐ):</th>
                            <td>{{ number_format($bill->total_payment, 0, ',', '.') }} </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row no-print">
            <div class="col-xs-12">
                <button onclick="window.print();"
                        class="btn btn-success pull-right ">
                    <i class="fa fa-print"></i> Print
                </button>
                <a href="{{ route('bills.index') }}" class="btn btn-default pull-right" style="margin-right: 10px">
                    <i class="fa fa-arrow-circle-o-left"></i> Trở về
                </a>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection
