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
            <form action="{{ route('slides.update', Hashids::encode($slide->id)) }}" method="POST" enctype="multipart/form-data"
                  id="addSlide">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img class="profile-user-img img-responsive " style="width: 90%"
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
                                <label>URL</label>
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
                            <div class="form-group">
                                <label>Trạng thái hiển thị</label><span class="text-danger">*</span><br>
                                @foreach($display_status as $item)
                                    <input type="radio"
                                           name="display_status_id"
                                           value="{{ $item->id }}"
                                           @if($item->id == old('display_status_id', $slide->display_status_id))
                                           checked
                                            @endif
                                    >&nbsp;&nbsp;
                                    {{ $item->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                                <label id="display_status_id-error" class="error" for="display_status_id"></label>
                                @if($errors->first('display_status_id'))
                                    <span class="text-danger">{{ $errors->first('display_status_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tiêu đề</label>
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
                                <label for="">Vị trí hiển thị tiêu đề</label><span class="text-danger">*</span><br>
                                <input type="radio"
                                       name="location_display"
                                       @if( $slide->location_display == config('contants.location_display_left'))
                                       checked
                                       @endif
                                       value="{{ config('contants.location_display_left') }}"> Bên trái <br>
                                <input type="radio"
                                       name="location_display"
                                       @if( $slide->location_display == config('contants.location_display_right'))
                                       checked
                                       @endif
                                       value="{{ config('contants.location_display_right') }}"> Bên phải <br>
                                <label id="location_display-error" class="error" for="location_display"></label>
                                @if($errors->first('location_display'))
                                    <span class="text-danger">{{ $errors->first('location_display') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
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

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('slides.index') }}" class="btn btn-default" >
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
                        extension: "jpg|jpeg|png|gif",
                        fileSize : 2097152,
                    },
                    url: {
                        url: true
                    },
                    display_status_id: {
                        required: true,
                    },
                    title: {
                        maxlength: 120
                    },
                    description: {
                        maxlength: 200
                    },
                    location_display: {
                        required: true,
                    }
                },

                messages: {
                    images: {
                        extension: "Chỉ chấp nhận ảnh JPG, JPEG, PNG, GIF",
                        fileSize: "*Kích thước ảnh không được quá 2MB "
                    },
                    url: {
                        url: "Url không đúng định dạng"
                    },
                    title: {
                        maxlength: 'Không được vượt quá 120 ký tự',
                    },
                    description: {
                        maxlength: 'Không được vượt quá 200 ký tự',
                    }
                }
            });
        });
    </script>
@endsection
