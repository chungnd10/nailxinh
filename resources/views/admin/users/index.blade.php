@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>người dùng</small>
        </h1>
        <ol class="breadcrumb">
            <a href="{{ route('users.create') }}"
               class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i> Thêm</a>
        </ol>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box form-advanced-search">
                    <div class="box-body">
                        <form method="get" action="{{ route('users.advanced-search') }}">
                            @csrf
                            <div class="row">
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                    <input type="text"
                                           class="form-control pull-right"
                                           id="full_name"
                                           name="full_name"
                                           value="{{ old('full_name') }}"
                                           placeholder="Họ và tên">
                                </div>
                                @if(Auth::user()->isAdmin())
                                    <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3">
                                        <select name="branch_id" class="form-control" id="branch_id">
                                            <option value="">Tất cả chi nhánh</option>
                                                @foreach($branches as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if(old('branch_id') == $item->id)
                                                            selected
                                                            @endif
                                                    >{{ $item->name . ', ' . $item->address }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="padding-bottom-input col-xs-12 col-sm-6 col-md-3 ">
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">Tất cả quyền</option>
                                        @if($roles)
                                            @foreach($roles as $item)
                                                <option value="{{ $item->id }}"
                                                        @if(old('role_id') == $item->id)
                                                        selected
                                                        @endif
                                                >{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="padding-bottom-input col-xs-6 col-sm-6 col-md-3 "
                                     style="box-sizing: border-box">
                                    <div class="input-group date input-date">
                                        <button class="btn btn-primary">
                                            Tìm kiếm
                                        </button>
                                        <button type="button" style="margin-left: 10px"
                                                class="btn btn-default btn-reset-form">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="users_table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th class="nosort" width="60">Ảnh</th>
                                <th>Số điện thoại</th>
                                <th>Quyền</th>
                                <th>Chi nhánh</th>
                                <th class="nosort" width="70">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>
                                        <img width="50" style="border-radius: 50%"
                                             src="upload/images/users/{{ $item->avatar }}" alt="avatar">
                                    </td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->role->name }}</td>
                                    <td>{{ $item->branch->name.", ".$item->branch->address  }}</td>
                                    <td>
                                        <a href="{{ route('users.show', Hashids::encode($item->id)) }}"
                                           class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('users.destroy', Hashids::encode($item->id)) }}"
                                           class="btn btn-xs btn-danger"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        @if($users->count() > 0)
                            <div class="pull-left">
                                <p>Tổng số: <b>{{ $users->total() }}</b> mục</p>
                            </div>
                        @endif
                        {!! $users->appends($_GET)->links() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        // display form search
        $('.btn-reset-form').click(function () {
            $('#full_name').val('');
            $('#branch_id').val('');
            $('#role_id').val('');
        });


        //data table
        $('#users_table').DataTable({
            "language": {
                    url: "{{ asset('admin_assets/bower_components/datatables.net-bs/lang/vietnamese-lang.json') }}"
            },
            "bInfo" : false,
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'autoWidth': false,
            "scrollX": true,
            "responsive": true,
            "columnDefs": [{"orderable": false, "targets": 'nosort'}]
        });

    </script>
@endsection
