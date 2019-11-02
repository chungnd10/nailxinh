@extends('admin.layouts.index')
@section('content')
{{--Content Header (Page header)--}}
<section class="content-header">
	<h1>
		Sửa
		<small>dịch vụ</small>
	</h1>
</section>
{{--Main content--}}
<section class="content">
	<div class="box box-default">
		<form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data" id="addService">
			@csrf
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Tên dịch vụ</label><span class="text-danger">*</span>
							<input type="text" class="form-control" value="{{ old('name', $service->name) }}" name="name"  id="name">
							@if($errors->first('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label>Giá</label><span class="text-danger">*</span>
							<input type="text" class="form-control" value="{{ old('price', $service->price) }}" name="price" id="price">
							@if($errors->first('price'))
							<span class="text-danger">{{ $errors->first('price') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label>Ảnh dịch vụ</label><span class="text-danger">*</span>
							<img style="width: 130px;" class="img-responsive"
							src="upload/images/service/{{$service->image}}"
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
							<input type="text" class="form-control" value="{{ old('slug' , $service->slug) }}" name="slug" id="slug">
							@if($errors->first('slug'))
							<span class="text-danger">{{ $errors->first('slug') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label>Loại dịch vụ</label><span class="text-danger">*</span>
							<select name="type_of_services_id" id="type_of_services_id" class="form-control">
								<option value="">Chọn loại dịch vụ</option>
								@foreach($type_of_services as $item)
								<option value="{{ $item->id }}" @if($service->type_of_services_id == $item->id) selected @endif>{{ $item->name }}</option>
								@endforeach
							</select>
							@if($errors->first('type_of_services_id'))
							<span class="text-danger">{{ $errors->first('type_of_services_id') }}</span>
							@endif
						</div>
						<!-- /.form-group -->
						<div class="form-group">
							<label>Thời gian hoàn thành</label><span class="text-danger">*</span>
							<input type="text" class="form-control{{ $errors->has('completion_time') ? ' is-invalid' : '' }}" value="{{ old('completion_time', $service->completion_time) }}" name="completion_time" id="completion_time">
							@if($errors->first('completion_time'))
							<span class="text-danger">{{ $errors->first('completion_time') }}</span>
							@endif
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.col -->
					<div class="col-md-12">
						<div class="form-group">
							<label>Mô tả</label><span class="text-danger">*</span>
							<textarea name="description" class="form-control" id="" cols="30" rows="10">{{$service->description}}</textarea>
						</div>
						<!-- /.form-group -->
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.box-body -->
			<div class="box-footer ">
				<a href="{{ route('services.index') }}" class="btn btn-default">
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


            //validate
            $("#addService").validate({
            	rules: {
            		type_of_services_id: {
            			required: true,
            		},
            		name: {
            			required: true,
            			minlength: 5,
            			maxlength: 40
            		},
            		price: {
            			required: true,
            			number: true,
            			min: 1
            		},
            		completion_time:{
            			required: true,
            		}
            		
            	},

            	messages: {
            		type_of_services_id: {
            			required: "Mục này không được để trống",
            		},
            		name: {
            			required: "Mục này không được để trống",
            			minlength: "Yêu cầu từ 5-40 ký tự",
            			maxlength: "Yêu cầu từ 5-40 ký tự",
            		},
            		price: {
            			required: "Mục này không được để trống",
            			number: "Giá dịch vụ phải là số",
            			min:"Giá phải lớn hơn 1"
            		},
            		completion_time:{
            			required: "Mục này không được để trống"
            		}
            	}
            });


        });
    </script>
    @endsection
