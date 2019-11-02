@extends('admin.layouts.index')
@section('content')
    <section class="content-header">
        <h1>
            Bảng tin
            <small>Thống kê</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-bank"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Chi nhánh</span>
                        <span class="info-box-number">{{ $branch }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Nhân sự</span>
                        <span class="info-box-number">{{ $user}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-cubes"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Dịch vụ</span>
                        <span class="info-box-number">{{ $service }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-check-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Lịch đặt</span>
                        <span class="info-box-number">{{ $order }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- LINE CHART -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thống kê lịch đặt</h3>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (RIGHT) -->
            <!-- /.col (RIGHT) -->
            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Phản hồi</span>
                        <span class="info-box-number">{{ $feedback }}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
                        <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-cube"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Loại dịch vụ</span>
                        <span class="info-box-number">{{ $type_services }}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
                        <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Direct Messages</span>
                        <span class="info-box-number">163,921</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        window.onload = function () {
            Chart.defaults.global.defaultFontColor = '#000000';
            Chart.defaults.global.defaultFontFamily = 'Arial';
            var lineChart = document.getElementById('lineChart');

            var myChart = new Chart(lineChart, {
                type: 'line',
                data: {
                    labels: ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"],
                    datasets: [
                        {
                            label: 'Lịch đặt',
                            data: [ <?= $count_order ?> ],
                            backgroundColor: 'rgba(255,193,7,0.1)',
                            pointBackgroundColor: 'rgba(255,193,7,1)',
                            pointBorderColor: 'rgba(255,193,7,1)',
                            borderColor: 'rgba(255,193,7,1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Hoàn thành',
                            data: [ <?= $count_order_completed ?> ],
                            backgroundColor: 'rgba(40,167,69,0.1)',
                            pointBackgroundColor: 'rgba(40,167,69,1)',
                            pointBorderColor: 'rgba(40,167,69,1)',
                            borderColor: 'rgba(40,167,69,1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                }
            });
        };
    </script>
@endsection
