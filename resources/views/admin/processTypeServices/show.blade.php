@extends('admin.layouts.index')
@section('content')
{{--Content Header (Page header)--}}
<section class="content-header">
	<h1>
		Sửa 
		<small>quy trình</small>
	</h1>
</section>
{{--Main content--}}
<section class="content">
	<div class="box box-default">
		<form action="{{ route('process-type-services.update', $process->id) }}" method="POST" enctype="multipart/form-data" id="addProcess">
			@csrf
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Tên quy trình</label><span class="text-danger">*</span>
							<input type="text" class="form-control" value="{{ old('name',$process->name) }}" name="name"  id="name">
							@if($errors->first('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label>Bước</label><span class="text-danger">*</span>
							<input type="text" class="form-control" value="{{ old('step',$process->step) }}" name="step" id="step">
							@if($errors->first('step'))
							<span class="text-danger">{{ $errors->first('step') }}</span>
							@endif
						</div>
					</div>
					<!-- /.col -->
					<div class="col-md-6">
						<div class="form-group">
							<label>Loại dịch vụ</label><span class="text-danger">*</span>
							<select name="type_of_services_id" id="type_of_services_id" class="form-control">
								<option value="">Chọn loại dịch vụ</option>
								@foreach($type_of_services as $item)
								<option value="{{ $item->id }}" @if($process->type_of_services_id == $item->id) selected @endif>{{ $item->name }}</option>
								@endforeach
							</select>
							@if($errors->first('type_of_services_id'))
							<span class="text-danger">{{ $errors->first('type_of_services_id') }}</span>
							@endif
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.col -->
					<div class="col-md-12">
						<div class="form-group">
							<label>Mô tả</label><span class="text-danger">*</span>
							<textarea name="content" class="form-control" id="" cols="30" rows="10">{{$process->content}}</textarea>
						</div>
						<!-- /.form-group -->
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.box-body -->
			<div class="box-footer ">
				<a href="{{ route('process-type-services.index') }}" class="btn btn-default">
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
            $("#addProcess").validate({
            	rules: {
            		type_of_services_id: {
            			required: true,
            		},
            		name: {
            			required: true,
            			minlength: 5,
            			maxlength: 40
            		},
            		step: {
            			required: true,
            			number: true,
            			min: 1
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
            		step: {
            			required: "Mục này không được để trống",
            			number: "Vui lòng nhập số",
            			min:"Giá trị phải lớn hơn 0"
            		}
            	}
            });


        });
    </script>
    @endsection
