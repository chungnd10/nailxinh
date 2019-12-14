@extends('admin.layouts.index')
@section('content')
    {{--Content Header (Page header)--}}
    <section class="content-header">
        <h1>
            Danh sách
            <small>đăng ký nhận tin khuyến mãi</small>
        </h1>
    </section>
    {{--Main content--}}
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('subscribe.delete-many') }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-hover" id="restricted_lists_table">
                                <thead>
                                <tr>
                                    <th class="nosort" width="30">
                                        <label class="">
                                            <div class="icheckbox_flat-green "
                                                 aria-checked="true"
                                                 aria-disabled="false"
                                            >
                                                <input type="checkbox" class="flat-red" id="checkedAll">
                                                <ins class="iCheck-helper"></ins>
                                            </div>
                                        </label>
                                    </th>
                                    <th width="40">STT</th>
                                    <th>Email</th>
                                    <th>Ngày đăng ký</th>
                                    <th class="nosort" width="80">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribes as $key => $item)
                                    <tr>
                                        <td>
                                            <label class="">
                                                <div class="icheckbox_flat-green "
                                                     aria-checked="true"
                                                     aria-disabled="false"
                                                >
                                                    <input type="checkbox" class="flat-red delete-many"
                                                           name="deleteMany[]" value="{{$item->id}}">
                                                    <ins class="iCheck-helper"></ins>
                                                </div>
                                            </label>
                                        </td>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->created_at != null)
                                                {{ $item->created_at->format('H:i d/m/Y') }}
                                            @else
                                                <p>Trống</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('subscribe.destroy', Hashids::encode($item->id)) }}"
                                               class="btn btn-xs btn-danger"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fa fa-trash"></i> Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="form-footer">
                                <button class="btn btn-sm btn-danger btn-delete-many pull-left"
                                        type="submit" style="display: none; margin-right: 10px"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                >
                                    <i class="fa fa-trash"></i>&nbsp;Xoá mục đã chọn
                                </button>
                                @if($subscribes->first())
                                    <a href="{{ route('download-excel') }}" class="btn btn-sm btn-default">
                                        <i class="fa fa-file-excel-o "></i>&nbsp;&nbsp;Excel
                                    </a>
                                @endif
                            </div>
                        </form>
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            //check all
            let checkAll = $('#checkedAll');
            let checkboxes = $('.delete-many');
            checkAll.on('ifChecked ifUnchecked', function (event) {
                if (event.type === 'ifChecked') {
                    checkboxes.iCheck('check');
                } else {
                    checkboxes.iCheck('uncheck');
                }
            });

            checkboxes.on('ifChanged', function (event) {
                if (checkboxes.filter(':checked').length === checkboxes.length) {
                    checkAll.prop('checked', 'checked');
                    console.log(checkboxes.filter(':checked').length);
                } else {
                    checkAll.prop('checked', false);
                    console.log(checkboxes.filter(':checked').length);
                }
                checkAll.iCheck('update');

                if (checkboxes.filter(':checked').length >= 1) {
                    $('.btn-delete-many').css('display', 'block');
                } else {
                    $('.btn-delete-many').css('display', 'none');
                }
            });




            //data table
            $('#restricted_lists_table').DataTable({
                "language": {
                    url: "{{ asset('admin_assets/bower_components/datatables.net-bs/lang/vietnamese-lang.json') }}"
                },
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'autoWidth': false,
                'scrollX': true,
                "responsive": true,
                "columnDefs": [{ "orderable": false, "targets": 'nosort' }]
            });

        });
    </script>
@endsection
