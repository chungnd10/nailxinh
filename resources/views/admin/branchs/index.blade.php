@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>chi nhánh</small>
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
                                <th>Tên chi nhánh</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Thành phố</th>
                                <th width="50">
                                    <a href="{{ route('branch.create') }}" class="btn btn-xs btn-success">
                                        <i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($branchs as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->address}}</td>
                                    <td>{{ $item->city->name}}</td>
                                    <td>
                                        <a href="{{ route('branch.show', $item->id) }}" class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if($item->role_id != 1)
                                            <a href="{{ route('branch.destroy', $item->id) }}"
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
                        {!! $branchs->links() !!}
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
