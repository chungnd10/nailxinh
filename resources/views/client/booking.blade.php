@extends('client.layouts.index')
@section('content')
    <!-- Start: Breadcrumb Area
    ============================= -->

    <section id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>NailXinh</h2>
                    <ul class="breadcrumb-nav list-inline">
                        <li><a href="index-2.html">NailXinh</a></li>
                        <li>Đặt lịch</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- End: Breadcrumb Area
    ============================= -->

    <!-- Start: Booking
    ============================= -->
    <section id="booking" style="padding-top:80px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="" id="booking-form">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between mb-3">
                                <span class="text-pink">Thông tin của bạn</span>
                                <span class="text-danger">(*) Bắt buộc nhập dữ liệu</span>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control form-border" value=""
                                       placeholder="Số điện thoại">
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control form-border">
                                    <option value="">Mrs/Miss</option>
                                    <option value="">Mrs</option>
                                    <option value="">Miss</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control form-border" value="" placeholder="Họ và tên">
                            </div>
                            <div class="adress col-md-12">
                                <div class="mb-3">
                                    Địa điểm
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-adress-booking">
                                            20 Quang Trung
                                            <br>
                                            <div class="font-11">Hoàn Kiếm, Hà Nội</div>
                                        </button> 
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-adress-booking">
                                            74B Nguyễn Phi Khanh, Phường Tân Định
                                            <br>
                                            <div class="font-11">Quận 1,TP Hồ Chí Minh</div>
                                        </button>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-adress-booking">
                                            26 N7B Trung Hòa - Nhân Chính
                                            <br>
                                            <div class="font-11">Thanh Xuân, Hà Nội</div>
                                        </button> 
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-adress-booking">
                                            26 N7B Trung Hòa - Nhân Chính
                                            <br>
                                            <div class="font-11">Thanh Xuân, Hà Nội</div>
                                        </button> 
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-adress-booking">
                                            26 N7B Trung Hòa - Nhân Chính
                                            <br>
                                            <div class="font-11">Thanh Xuân, Hà Nội</div>
                                        </button> 
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-adress-booking">
                                            26 N7B Trung Hòa - Nhân Chính
                                            <br>
                                            <div class="font-11">Thanh Xuân, Hà Nội</div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="mb-2">Dịch vụ <span class="text-danger">*</span></div>
                                <select class="services form-control form-border">
                                    <optgroup label="NAIL">
                                        <option>Nail đính đá</option>
                                        <option>Nail poslish</option>
                                        <option>Nail poslish</option>
                                        <option>Nail poslish</option>
                                    </optgroup>
                                    <optgroup label="MI">
                                        <option>Nối mi giả</option>
                                        <option>Chăm soc mi</option>
                                        <option>Nail ombre</option>
                                        <option>Nail ombre</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="mb-2">Nhân viên <span class="text-danger">*</span></div>
                                <select class="staff form-control form-border">
                                    <option>testimonial01</option>
                                    <option>testimonial02</option>
                                    <option>testimonial03</option>
                                    <option>testimonial03</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="mb-2">Chọn ngày <span class="text-danger">*</span></div>
                                <input class="datepicker form-control form-border" placeholder="mm/dd/yyyy"
                                       data-date-format="mm/dd/yyyy">
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">Chọn giờ <span class="text-danger">*</span></div>
                                <div id="timeFrame" class="row">
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="09:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">09:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="10:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">10:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="11:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">11:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="12:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">12:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="13:00"
                                                class="btn btn-default btn-block time-frame mb-2 disable-click btn-time-danger">
                                            <div class="time">13:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="14:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">14:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="15:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">15:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="16:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">16:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="17:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">17:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="18:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">18:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="19:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">19:00</div>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button type="button" time-frame="20:00"
                                                class="btn btn-default btn-block time-frame mb-2 btn-time-danger">
                                            <div class="time">20:00</div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="ghichu">Ghi chú</label>
                                <textarea class="form-control form-border" id="ghichu" rows="5"></textarea>
                            </div>
                            <div class="col-md-6 offset-md-3 mt-5 mb-5">
                                <button class="btn btn-block btn-pink">
                                    <i class="far fa-calendar-alt"></i>
                                    ĐẶT LỊCH NGAY
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Booking
    ============================= -->


@endsection

@section('script')
    {{-- example--}}
@endsection
