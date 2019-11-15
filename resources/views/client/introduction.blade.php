@extends('client.layouts.index')
@section('content')
        <!-- Start: Breadcrumb Area
    ============================= -->

    <section id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Giới thiệu</h2>
                    <ul class="breadcrumb-nav list-inline">
                        <li><a href="#">NailXinh</a></li>
                        <li>Giới thiệu</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Breadcrumb Area
    ============================= -->

    <!-- Start: Introduction 
    ============================= -->
    <section id="nailit">
        <div class="container">
            <h2 class="section-title text-center pt-5">VỚI NAIL XINH <br>“AI CŨNG CÓ THỂ TRỞ NÊN ĐẸP HƠN”</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="nail-img">
                        <img src="https://nailroom.vn/wp-content/uploads/2019/08/Untitled-1-2.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nail-content">
                        <p>Sở hữu các dịch vụ từ làm nail, spa, waxing, phun thêu lông mày, nối mi,… và một không gian cửa hàng yên tĩnh, long lanh dành riêng cho phái đẹp khiến Nail Room trở thành điểm đến yêu thích của hơn 500.000 khách hàng trong và ngoài nước.</p>
                        <p><span style="font-weight: 400;">Với đội ngũ chuyên viên tài năng, dễ thương cùng hệ thống máy móc, dụng cụ nhập từ Hàn Quốc và các sản phẩm organic của Hàn – Anh – Pháp – Mỹ, 15 cơ sở của NAIL&nbsp; ROOM chắc chắn sẽ đem lại những xu hướng làm đẹp mới nhất đến khách hàng</span></p>
                        <p><span style="color: #b7752b;">Hãy ghé chơi với chúng mình để cảm nhận niềm vui từ việc yêu chiều bản thân nhé!</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Introduction 
    ============================= -->

    <!-- Start: Gallery 
    ============================= -->
    <section id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <div class="section-title">
                        <h2>KHÁM PHÁ ALBUM ẢNH</h2>
                        <hr>
                        <p>Bạn có thể tham khảo những hình ảnh dưới đây để rõ hơn về NAILXINH</p>
                    </div>
                    <div class="section-desc">
                        Ngoài những chất lượng về dịch vụ, NAIL XINH còn tự hào là chuỗi làm đẹp có không gian được yêu thích nhất. Với 
                        concept các tone màu sang chảnh, nền nã, NAIL XINH luôn làm hài lòng khách yêu mỗi khi đặt chân đến. Bên cạnh 
                        ó, NAIL XINH tự hào sở hữu kho sơn khổng lồ, đa dạng để khách yêu có thể thỏa thích lựa chọn. Đến với chúng 
                        mình để được nhận những điều tuyệt vời nhất nhé!!!
                    </div>
                </div>
            </div>
            <div class="row mt-5" id="lightgallery">
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
                <a class="col-md-3 mb-2 jg-entry" href="client_assets/img/gallery/gallery10.jpg">
                    <img src="client_assets/img/gallery/gallery10.jpg" />
                    <div class="demo-gallery-poster">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Start: End 
    ============================= -->
        

    {{--START: subscribe
    =======================--}}
    @include('client.layouts.subscribe')
    {{--END:  subscribe
    ==============================================--}}
@endsection
@section('script')
    {{-- example--}}
@endsection
