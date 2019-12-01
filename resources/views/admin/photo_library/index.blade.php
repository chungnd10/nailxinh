@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thư viện ảnh
        </h1>

        <ul class="unstyled list-inline pull-right menu-photo-library">
            <li>
                <form action="#">
                    <select name="type_services" id="type_services" class="form-control" style="width:200px">
                        <option value="">Tất cả</option>
                        @if($type_services->first())
                            @foreach($type_services as $item)
                                <option value="{{ Hashids::encode($item->id) }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </form>
            </li>
            <li>
                <a href="{{ route('photo-library.create') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> Thêm
                </a>
            </li>
        </ul>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body" style="padding-top: 15px;">
                        <div class="wrapper-img" id="wrapper-img">
                            @if($images->first())
                                @foreach($images as $item)
                                    <div class="col-md-3 col-sm-6 col-img">
                                        <img class="img-responsive"
                                             src="upload/images/photo_library/{{ $item->image }}">
                                        <label class="switch label-switch">
                                            <input type="checkbox"
                                                   name="display_status_id"
                                                   class="display_status_id"
                                                   id="{{ $item->id }}"
                                                   data-id="{{ $item->id }}"
                                                    {{ $item->display_status_id == config('contants.display_status_display') ? 'checked' : ''}}
                                            >
                                            <span class="slider round"></span>
                                        </label>
                                        <div class="info-hidden">
                                            <ul class="list-unstyled pull-right">
                                                <li>
                                                    <a href="{{ route('photo-library.show', $item->id) }}"
                                                       class="btn btn-xs btn-warning btn-edit-photo"
                                                       data-id="{{ $item->id }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"
                                                       class="btn btn-xs btn-danger btn-delete-photo"
                                                       data-id="{{ $item->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-md-12 ">
                            @if($images->first())
                                <a href="javascript:;" class="load-diff">Xem thêm</a>
                            @else
                                <h4 class="text-danger">Không có hình ảnh nào !</h4>
                            @endif
                        </div>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            let routeEdit = "{{ config('contants.route_update_photo') }}";
            let hidden = "{{ config('contants.display_status_hide') }}";
            let display = "{{ config('contants.display_status_display') }}";
            let routeDelete = "{{ config('contants.route_destroy_photo') }}";
            let display_status_display = "{{ config('contants.display_status_display') }}";
            let url_load_diff = "{{ route('photo-library.load-diff') }}";
            let url_change_services = "{{ route('photo-library.change-type-services') }}";
            let url_change_status = "{{ route('photo-library.change-status') }}";
            let url_delete_photo = "{{ route('photo-library.delete') }}";
                    // change type service
            $('#type_services').change(function () {
                let id = $(this).val();

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url_change_services,
                    data: {'id': id},
                    success: function (data) {
                        $("#wrapper-img").html('');
                        $.each(data, function (key, value) {
                            let id = value.id;
                            let checked = parseInt(value.display_status_id) === parseInt(display_status_display) ? 'checked' : '';
                            $("#wrapper-img").append(
                                "<div class='col-md-3 col-sm-6 col-img'>"+
                                    "<img class='img-responsive' src='upload/images/photo_library/"+value.image+"' alt='"+value.image+"'>"+
                                    "<label class='switch label-switch'>"+
                                        "<input type='checkbox' name='display_status_id' class='display_status_id' data-id='"+id+"' "+checked+">"+
                                        "<span class='slider round'></span>"+
                                    "</label>"+
                                    "<div class='info-hidden'>"+
                                        "<ul class='list-unstyled pull-right'>"+
                                            "<li>"+
                                                "<a href='"+ routeEdit+value.id +"' class='btn btn-xs btn-warning btn-edit-photo' data-id="+value.id+">"+
                                                    "<i class='fa fa-pencil'></i>"+
                                                "</a>"+
                                            "</li>"+
                                            "<li>"+
                                                "<a href='"+ routeDelete+value.id +"' class='btn btn-xs btn-danger' onclick='return confirm('Bạn có chắc chắn muốn xóa?')>"+
                                                    "<i class='fa fa-trash'></i>"+
                                                "</a>"+
                                            "</li>"+
                                        "</ul>"+
                                    "</div>"+
                                "</div>"
                            );
                        });
                    },

                    error: function () {
                    },
                });
            });
            //end change status

            function SwalDelete(id)
            {
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa không?',
                    text: "Ảnh đã xóa sẽ không thể khôi phục !",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xóa !',
                    cancelButtonText: 'Hủy !',
                    showLoaderOnConfirm: true,

                    preConfirm: function () {
                        return new Promise(function (resolve) {
                            $.ajax({
                                url: url_delete_photo,
                                data: { 'id':id }
                            })
                            .done(function () {
                                swal.fire('Xoá thành công !', 'Hình ảnh đã được xóa thành công', 'success');
                            })
                            .fail(function () {
                                swal.fire('Lỗi!', 'Đã xảy ra lỗi gì đó, không thể xóa !' , 'error');
                            })
                        })
                    },
                    allowOutsideClick: false
                });
            }
            // delete photo
            $('.btn-delete-photo').on('click', function (e) {
                let id = $(this).data('id');
                SwalDelete(id);
                e.preventDefault();
            });
            // end delete photo


            // change type services
            $("#wrapper-img").on('change', '.display_status_id', function () {
                let id = $(this).data('id');
                let display_status_id = $(this).prop('checked') === true ? display : hidden;

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 5000,
                    showCloseButton: true
                });

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url_change_status,
                    data: {'display_status_id': display_status_id, 'id': id},
                    success: function () {
                        Toast.fire({
                            type: 'success',
                            title: 'Thay đổi thành công'
                        })
                    },

                    error: function () {
                        Toast.fire({
                            type: 'error',
                            title: 'Thay đổi thất bại'
                        })
                    },
                });
            });
            // end change status

            // load diff
            $('.load-diff').on('click', function () {
                let id = $('.btn-edit-photo').last().data('id');
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 5000,
                    showCloseButton: true
                });

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url_load_diff,
                    data: {'id': id},
                    success: function (data) {
                        $.each(data, function (key, value) {
                            let id = value.id;
                            let checked = parseInt(value.display_status_id) === parseInt(display_status_display) ? 'checked' : '';
                            $("#wrapper-img").append(
                                "<div class='col-md-3 col-sm-6 col-img'>"+
                                    "<img class='img-responsive' src='upload/images/photo_library/"+value.image+"' " +
                                            "alt='"+value.image+"'>"+
                                    "<label class='switch label-switch'>"+
                                        "<input type='checkbox' name='display_status_id' " +
                                                "class='display_status_id' data-id='"+id+"' "+checked+">"+
                                        "<span class='slider round'></span>"+
                                    "</label>"+
                                    "<div class='info-hidden'>"+
                                        "<ul class='list-unstyled pull-right'>"+
                                            "<li>"+
                                                "<a href='"+routeEdit+value.id +"' " +
                                                    "class='btn btn-xs btn-warning btn-edit-photo' " +
                                                    "data-id="+value.id+">"+
                                                    "<i class='fa fa-pencil'></i>"+
                                                "</a>"+
                                            "</li>"+
                                            "<li>"+
                                                "<a href='"+routeEdit+value.id +"' " +
                                                    "class='btn btn-xs btn-danger btn-delete-photo'> " +
                                                    // "onclick='return confirm('Bạn có chắc chắn muốn xóa?')>"+
                                                    "<i class='fa fa-trash'></i>"+
                                                "</a>"+
                                            "</li>"+
                                        "</ul>"+
                                    "</div>"+
                                "</div>"
                            );
                        });
                    },

                    error: function () {
                        Toast.fire({
                            type: 'error',
                            title: 'Tải thêm thất bại'
                        })
                    },
                });
            })
            // end load diff
        });
    </script>
@endsection
