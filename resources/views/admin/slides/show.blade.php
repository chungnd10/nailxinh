@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Sửa
            <small>slide</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data" id="addSlide">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img class="profile-user-img img-responsive img-slide"
                                     src="upload/images/slides/{{ $slide->images }}"
                                     id="proImg"
                                     alt="Slide picture">
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label><span class="text-danger">*</span>
                                <input type="file"
                                       class="form-control"
                                       name="images"
                                       id="images">
                                @if($errors->first('images'))
                                    <span class="text-danger">{{ $errors->first('images') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Trạng thái hiển thị</label><span class="text-danger">*</span><br>
                                @foreach($display_status as $item)
                                    <input type="radio"
                                           name="display_status_id"
                                           value="{{ $item->id }}"
                                           @if($item->id == old('display_status_id', $slide->display_status_id ))
                                                checked
                                           @endif
                                    >&nbsp;&nbsp;
                                    {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                                @if($errors->first('display_status_id'))
                                    <span class="text-danger">{{ $errors->first('display_status_id') }}</span>
                                @endif
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tiêu đề</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       value="{{ old('title', $slide->title)}}"
                                       name="title"
                                       placeholder="Nhập tiêu đề">
                                @if($errors->first('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label><span class="text-danger">*</span>
                                <textarea name="description"
                                          cols="30"
                                          rows="6"
                                          class="form-control"
                                          placeholder="Nhập mô tả"
                                >{{ old('description', $slide->description) }}</textarea>
                                @if($errors->first('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>URL</label><span class="text-danger">*</span>
                                <input type="text"
                                       class="form-control"
                                       name="url"
                                       placeholder="Nhập url"
                                       value="{{ old('url', $slide->url) }}"
                                >
                                @if($errors->first('url'))
                                    <span class="text-danger">{{ $errors->first('url') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('slides.index') }}" class="btn btn-default">
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
        $(document).ready(function () {
            var inputImage = document.querySelector(`[name="images"]`);
            inputImage.onchange = function () {
                var file = this.files[0];
                if (file == undefined) {
                    document.querySelector('#proImg').src = 'upload/images/slides/{{ $slide->images }}';
                } else {
                    getBase64(file, '#proImg');
                }
            }

            //validate
            $("#addSlide").validate({
                rules: {
                    images: {
                        extension: "jpg|jpeg|png|gif"
                    },
                    url: {
                        url: true
                    },
                    display_status_id: {
                        required: true,
                    },
                    title: {
                        minlength: 10,
                        maxlength: 25
                    },
                    description: {
                        minlength: 10,
                        maxlength: 130
                    }
                },

                messages: {
                    images: {
                        required: "Mục này không được để trống",
                        extension: "Chỉ chấp nhận ảnh JPG, JPEG, PNG, GIF"
                    },
                    url: {
                        url: "Url không đúng định dạng"
                    },
                    display_status_id: {
                        required: "Mục này không được để trống",
                    },
                    title: {
                        minlength: "Yêu cầu từ 10-25 ký tự",
                        maxlength: "Yêu cầu từ 10-25 ký tự",
                    },
                    description: {
                        minlength: "Yêu cầu từ 10-130 ký tự",
                        maxlength: "Yêu cầu từ 10-130 ký tự",
                    }
                }
            });


        });
    </script>
@endsection