@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thông tin
            <small>website</small>
        </h1>
    </section>
    {{--  content  --}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('photo-library.create') }}"
                  method="POST"
                  id="photo-library-create">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label class="label" data-toggle="tooltip" title="Thay đổi ảnh">
                                    <img class="rounded profile-user-img img-responsive img-introduction" id="avatar"
                                         src="upload/images/photo_library/img-default.png" alt="avatar">
                                    <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                                </label>
                                <span class="alert"></span>
                                <input type="hidden" class="form-control" name="avatar_hidden" id="avatar_hidden">
                                @if($errors->first('avatar_hidden'))
                                    <span class="text-danger">{{ $errors->first('avatar_hidden') }}</span>
                                @endif
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                     aria-labelledby="modalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">Cắt ảnh</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="img-container">
                                                    <img id="image"
                                                         src="upload/images/photo_library/img-default.png"
                                                         height="300"
                                                         width="100%">
                                                </div>
                                                <div class="preview"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary" id="crop">Cắt
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label><span class="text-danger">*</span>
                                <select name="type_of_service_id" class="form-control">
                                    <option value="">Chọn danh mục</option>
                                    @foreach($type_services as $type_of_service)
                                        <option value="{{ $type_of_service->id }}"
                                                @if($type_of_service->id == old('type_of_service_id'))
                                                    selected
                                                @endif
                                        >{{ $type_of_service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->first('type_of_service_id'))
                                    <span class="text-danger">{{ $errors->first('type_of_service_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Trạng thái hiển thị</label><span class="text-danger">*</span><br>
                                @foreach($display_status as $item)
                                    <input type="radio"
                                           name="display_status_id"
                                           value="{{ $item->id }}"
                                           @if($item->id == old('display_status_id'))
                                                checked
                                           @endif
                                    >&nbsp;&nbsp;
                                    {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                                <br>
                                <label id="display_status_id-error" class="error" for="display_status_id"></label>
                                @if($errors->first('display_status_id'))
                                    <span class="text-danger">{{ $errors->first('display_status_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ url()->previous() }}" class="btn btn-default">
                        <i class="fa fa-arrow-circle-o-left"></i>
                        Trở về
                    </a>
                    <button type="submit" class="btn btn-success ">
                        <i class="fa fa-save"></i>
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function () {
            let avatar = document.getElementById('avatar');
            let image = document.getElementById('image');
            let input = document.getElementById('input');
            let $alert = $('.alert');
            let $modal = $('#modal');
            let cropper;

            $('[data-toggle="tooltip"]').tooltip();

            input.addEventListener('change', function (e) {
                let files = e.target.files;
                let done = function (url) {
                    input.value = '';
                    image.src = url;
                    $alert.hide();
                    $modal.modal('show');
                };
                let reader;
                let file;

                if (files && files.length > 0) {
                    file = files[0];

                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function (e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $modal.on('shown.bs.modal', function () {
                cropper = new Cropper(image, {
                    modal: true,
                    autoCrop: true,
                    autoCropArea: 1,
                    responsive: true,
                    background: true,
                    zoomOnTouch: true,
                    viewMode: 2,
                    dragMode: 'move',
                    aspectRatio: 4 / 3,
                    built: function () {
                        $toCrop.cropper("setCropBoxData", {width: "320", height: "240"});
                    }
                });
            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            document.getElementById('crop').addEventListener('click', function () {
                let canvas;
                $modal.modal('hide');

                if (cropper) {
                    canvas = cropper.getCroppedCanvas({
                        width: 320,
                        height: 240,
                    });

                    avatar.src = canvas.toDataURL('image/jpeg');
                    $alert.removeClass('alert-success alert-warning');

                    $("#avatar_hidden").val(avatar.src);
                    $("#avatar_hidden-error").hide();
                }
            });
        });
    </script>
    <script type="text/javascript">
	$(document).ready(function () {
            //validate
            $("#photo-library-create").validate({
                ignore: [],
            	rules: {
            		type_of_service_id: {
            			required: true,
            		},
                    avatar_hidden: "required",
                    display_status_id: "required"
            	},
                message: {
                    avatar_hidden: {
            		    required: "*Vui lòng nhập ảnh !",
                    }
                }
            });
        });
    </script>
@endsection
