@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>loại dịch vụ</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên dịch vụ</th>
                                <th>Ảnh</th>
                                <th>Loại dịch vụ</th>
                                <th>Giá</th>
                                <th>Thời gian thực hiện</th>
                                <th>Mô tả</th>
                                <th width="50">
                                    <a href="{{ route('services.create') }}" class="btn btn-xs btn-success">
                                        <i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img width="50" src="upload/images/service/{{ $item->image }}" alt="image">
                                    </td>
                                    <td>{{ $item->typeservice->name }}</td>
                                   	<td>{{ $item->price}}</td>
                                   	<td>{{ $item->completion_time}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <a href="{{ route('services.show', $item->id) }}" class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if($item->role_id != 1)
                                            <a href="{{ route('services.destroy', $item->id) }}"
                                               class="btn btn-xs btn-danger"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $services->links() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
