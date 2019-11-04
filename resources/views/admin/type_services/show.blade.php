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
		<form action="{{ route('type-services.update', $type_of_service->id) }}" method="POST" enctype="multipart/form-data" id="addTypeService">
			@csrf
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Tên loại dịch vụ</label><span class="text-danger">*</span>
							<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name',$type_of_service->name) }}" name="name"  id="name">
							 @if($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                             @endif
						</div>
						<div class="form-group">
							<label>Ảnh đại diện</label><span class="text-danger">*</span>
							<img style="width: 130px;" class="img-responsive"
							src="upload/images/type-service/{{$type_of_service->image}}"
							id="proImg"
							alt="">
							<input type="file" class="form-control" name="image" id="image">
							@if($errors->first('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                             @endif
						</div>
						
					</div>
					<!-- /.col -->
					<div class="col-md-6">
						<div class="form-group">
							<label>Đường dẫn</label><span class="text-danger">*</span>
							<input type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" value="{{ old('slug',$type_of_service->slug) }}" name="slug" id="slug">
							@if($errors->first('slug'))
                                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                             @endif
						</div>
						<!-- /.form-group -->
						<div class="form-group">
							<label>Mô tả</label><span class="text-danger">*</span>
							<textarea name="description" id="" class="form-control" rows="7">{{old('description',$type_of_service->description)}}</textarea>
							
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
<script type="text/javascript">
	$(document).ready(function () {
		var inputImage = document.querySelector(`[name="image"]`);
		inputImage.onchange = function () {
			var file = this.files[0];
			if (file == undefined) {
				document.querySelector('#proImg').src = 'upload/images/type-service/{{$type_of_service->image}}';
			} else {
				getBase64(file, '#proImg');
			}
		}

            //validate
            $("#addTypeService").validate({
            	rules: {
            		image: {
            			extension: "jpg|jpeg|png"
            		},
            		name: {
            			required: true,
            			minlength: 5,
            			maxlength: 40
            		},
            		slug: {
            			required: true
            		}
            		
            	},

            	messages: {
            		image: {
            			extension: "Chỉ chấp nhận ảnh JPG, JPEG, PNG"
            		},
            		name: {
            			required: "Mục này không được để trống",
            			minlength: "Yêu cầu từ 5-40 ký tự",
            			maxlength: "Yêu cầu từ 5-40 ký tự",
            			alpha: "Mục này không được để trống"
            		},
            		slug: {
            			required: "Mục này không được để trống"
            		}
            	}
            });


        });
    </script>
    @endsection
