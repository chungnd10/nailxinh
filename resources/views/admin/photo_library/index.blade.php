@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thư viện ảnh
        </h1>

        <ul class="unstyled list-inline pull-right menu-photo-library">

            <li>
                <form action="{{ route('photo-search') }}" method="GET">
                    @csrf
                    <select name="type_services" id="type_services" class="form-control" style="width:200px">
                        <option value="">Tất cả</option>
                        @if($type_services->first())
                            @foreach($type_services as $item)
                                <option value="{{ $item->id }}"
                                    @if(old('type_services') == $item->id)
                                        selected
                                    @endif
                                >{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>

            </li>
            <li>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-search"></i>
                        Tìm
                    </button>
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
                                                    <a href="{{ route('photo-library.destroy', $item->id) }}"
                                                       class="btn btn-xs btn-danger btn-delete-photo"
                                                       onclick=" return confirmDelete()"
                                                       data-id="{{ $item->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-danger">Không có ảnh nào !</p>
                            @endif
                        </div>
                        <div class="col-md-12 ">
                            {!! $images->links() !!}
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
            let hidden = "{{ config('contants.display_status_hide') }}";
            let display = "{{ config('contants.display_status_display') }}";
            let url_change_status = "{{ route('photo-library.change-status') }}";

            // change status
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
        });
    </script>
@endsection

