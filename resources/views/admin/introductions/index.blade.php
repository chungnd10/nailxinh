@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Thông tin
            <small>Trang giới thiệu</small>
        </h1>
    </section>
    {{--  content  --}}
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('introductions.update') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="introductions">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <img class="profile-user-img img-responsive img-introduction"
                                     width="200"
                                     src="upload/images/introductions/{{ $item->image }}"
                                     id="proImg"
                                     alt="User profile picture">
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label><span class="text-danger">*</span>
                                <input type="file"
                                       class="form-control"
                                       name="image"
                                >
                                @if($errors->first('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tiêu đề</label><span class="text-danger">*</span>
                                <textarea name="title" id="title" placeholder="Nhập tiêu đề">{{ $item->title }}</textarea>
                                @if($errors->first('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label><span class="text-danger">*</span>
                                <textarea name="content" id="content"
                                          placeholder="Nhập nội dung"
                                >{{ $item->content }}</textarea>
                                @if($errors->first('content'))
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('admin.index') }}" class="btn btn-default">
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

            //editor
            CKEDITOR.replace('title', {

                toolbarGroups: toolbarGroups = [
                    {
                        "name": "document",
                        "groups": ["mode", "document", "doctools"]
                    },
                    {
                        "name": "basicstyles",
                        "groups": ["basicstyles", "cleanup"]
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "indent", "blocks", "align", "bidi", "paragraph"]
                    },
                    {
                        "name": "colors",
                        "groups": ["colors"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    },
                    {
                        "name": "clipboard",
                        "groups": ["clipboard", "undo"]
                    },
                    {
                        "name": "editing",
                        "groups": ["find", "selection", "spellchecker", "editing"]
                    },
                    {
                        "name": "forms",
                        "groups": ["forms"]
                    },
                    {
                        "name": "links",
                        "groups": ["links"]
                    },
                    {
                        "name": "insert",
                        "groups": ["insert"]
                    },
                    {
                        "name": "tools",
                        "groups": ["tools"]
                    },
                    {
                        "name": "others",
                        "groups": ["others"]
                    },
                    {
                        "name": "about",
                        "groups": ["about"]
                    }
                ],

                removeButtons: 'Save,NewPage,Preview,Print,Templates,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,Textarea,Select,TextField,Button,ImageButton,HiddenField,Maximize,About,ShowBlocks,Image,Flash,Table,Smiley,SpecialChar,PageBreak,Iframe,Superscript,Subscript,Strike,RemoveFormat,CreateDiv,Blockquote,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Cut,CopyFormatting,Indent,Outdent,HorizontalRule'
            });

            CKEDITOR.replace('content', {
                toolbarGroups: toolbarGroups = [
                    {
                        "name": "document",
                        "groups": ["mode", "document", "doctools"]
                    },
                    {
                        "name": "basicstyles",
                        "groups": ["basicstyles", "cleanup"]
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "indent", "blocks", "align", "bidi", "paragraph"]
                    },
                    {
                        "name": "colors",
                        "groups": ["colors"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    },
                    {
                        "name": "clipboard",
                        "groups": ["clipboard", "undo"]
                    },
                    {
                        "name": "editing",
                        "groups": ["find", "selection", "spellchecker", "editing"]
                    },
                    {
                        "name": "forms",
                        "groups": ["forms"]
                    },
                    {
                        "name": "links",
                        "groups": ["links"]
                    },
                    {
                        "name": "insert",
                        "groups": ["insert"]
                    },
                    {
                        "name": "tools",
                        "groups": ["tools"]
                    },
                    {
                        "name": "others",
                        "groups": ["others"]
                    },
                    {
                        "name": "about",
                        "groups": ["about"]
                    }
                ],

                removeButtons: 'Save,NewPage,Preview,Print,Templates,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,Textarea,Select,TextField,Button,ImageButton,HiddenField,Maximize,About,ShowBlocks,Image,Flash,Table,Smiley,SpecialChar,PageBreak,Iframe,Superscript,Subscript,Strike,RemoveFormat,CreateDiv,Blockquote,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Cut,CopyFormatting,Indent,Outdent,HorizontalRule'
            });

            //image
            var inputImage = document.querySelector(`[name="image"]`);
            inputImage.onchange = function () {
                var file = this.files[0];
                if (file == undefined) {
                    document.querySelector('#proImg').src = 'upload/images/users/{{ $item->image }}';
                } else {
                    getBase64(file, '#proImg');
                }
            };

            //validate
            $("#introductions").validate({
                rules: {
                    image: {
                        extension: "jpg|jpeg|png|gif",
                        fileSize: 2097152
                    },
                    title: {
                        required: true,
                        maxlength: 100
                    },
                    content: {
                        required: true,
                        maxlength: 600
                    },
                },

                messages: {
                    image: {
                        extension: "*Chỉ chấp nhận ảnh JPG, JPEG, PNG, GIF",
                        fileSize: "*Kích thước ảnh không được quá 2MB "
                    },
                    title: {
                        maxlength: "*Không được vượt quá 100 ký tự",
                    },
                    content: {
                        maxlength: "*Không được vượt quá 600 ký tự",
                    }
                }
            });


        });
    </script>
@endsection
