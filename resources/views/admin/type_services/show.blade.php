@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Sửa
            <small>loại dịch vụ</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('type-services.update', Hashids::encode($type_of_service->id)) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="addTypeService">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" data-toggle="tooltip" title="Thay đổi ảnh">
                                    <img style="width: 200px;" class="rounded profile-user-img img-responsive"
                                         id="avatar"
                                         src="upload/images/type_services/{{$type_of_service->image}}" alt="avatar">
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
                                                         src="upload/images/type_services/{{$type_of_service->image}}"
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
                            @if($errors->first('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên loại dịch vụ</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       value="{{ old('name', $type_of_service->name) }}"
                                       name="name"
                                       id="name">
                                @if($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Mô tả</label><span class="text-danger">*</span>
                                <textarea name="description"
                                          id="" class="form-control"
                                          rows="7">{{old('description', $type_of_service->description)}}</textarea>
                                @if($errors->first('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('type-services.index') }}" class="btn btn-default">
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
                    aspectRatio: 1/1,
                    built: function () {
                        $toCrop.cropper("setCropBoxData", {width: "320", height: "320"});
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
                        height: 320,
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
            $("#addTypeService").validate({
                ignore: [],
                rules: {
                    name: {
                        required: true,
                        maxlength: 100
                    },
                    description: {
                        required: true,
                        maxlength: 300
                    }

                },

                messages: {
                    name: {
                        maxlength: "*Không được vượt quá 100 ký tự",
                    },
                    description: {
                        maxlength: "*Không được vượt quá 300 ký tự",
                    }
                }
            });


        });
    </script>
@endsection
