<section id="counter" class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-6 single-box mb-4 mb-lg-0">
                <img src="client_assets/img/counter/counter-icon01.png" alt="">
                <h3><span class="counter">{{ $branch ? $branch : 0}}</span></h3>
                <p>Cơ sở</p>
            </div>
            <div class="col-lg-3 col-md-6 col-6 single-box mb-4 mb-lg-0">
                <img src="client_assets/img/counter/counter-icon02.png" alt="">
                <h3><span class="counter">{{ $user ? $user : 0}}</span></h3>
                <p>Nhân viên</p>
            </div>
            <div class="col-lg-3 col-md-6 col-6 single-box mb-4 mb-sm-0">
                <img src="client_assets/img/counter/counter-icon03.png" alt="">
                <h3><span class="counter">{{ $service ? $service : 0}}</span></h3>
                <p>Dịch vụ</p>
            </div>
            <div class="col-lg-3 col-md-6 col-6 single-box">
                <img src="client_assets/img/counter/counter-icon02.png" alt="">
                <h3><span class="counter">{{ $orders ? $orders : 0}}</span></h3>
                <p>Khách hàng đặt lịch trực tuyến</p>
            </div>
        </div>
    </div>
</section>
