<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Bảng tin</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.index') }}"><i class="fa fa-angle-right"></i>Bảng tin</a></li>
                </ul>
            </li>
            @can('view-branchs')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-suitcase"></i> <span>Chi nhánh</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-branchs')
                            <li><a href="{{route('branch.index')}}"><i class="fa fa-angle-right"></i>Danh sách</a></li>
                        @endcan
                        @can('add-branchs')
                            <li><a href="{{route('branch.create')}}"><i class="fa fa-angle-right"></i>Thêm mới</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-type-of-services')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cubes"></i> <span>Loại dịch vụ</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-type-of-services')
                            <li><a href="{{route('type-services.index')}}"><i class="fa fa-angle-right"></i>Danh
                                    sách</a></li>
                        @endcan
                        @can('add-type-of-services')
                            <li>
                                <a href="{{route('type-services.create')}}"><i class="fa fa-angle-right"></i>Thêm
                                    mới</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-services')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cube"></i> <span>Dịch vụ</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-services')
                            <li><a href="{{route('services.index')}}"><i class="fa fa-angle-right"></i>Danh sách</a>
                            </li>
                        @endcan
                        @can('add-services')
                            <li><a href="{{route('services.create')}}"><i class="fa fa-angle-right"></i>Thêm mới</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-process-of-services')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Quy trình dịch vụ</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-process-of-services')
                            <li>
                                <a href="{{route('process-type-services.index')}}">
                                    <i class="fa fa-angle-right"></i>Danh sách
                                </a>
                            </li>
                        @endcan
                        @can('add-process-of-services')
                            <li>
                                <a href="{{route('process-type-services.create')}}">
                                    <i class="fa fa-angle-right"></i>Thêm mới
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-bills')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dollar"></i> <span>Hóa đơn</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-bills')
                            <li><a href="{{ route('bills.index') }}"><i class="fa fa-angle-right"></i>Danh sách</a></li>
                        @endcan
{{--                        @can('add-bills')--}}
{{--                            <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i>Thêm mới</a></li>--}}
{{--                        @endcan--}}
                    </ul>
                </li>
            @endcan
            @can('view-orders')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bookmark-o"></i> <span>Lịch đặt</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-orders')
                            <li><a href="{{ route('orders.index') }}"><i class="fa fa-angle-right"></i>Danh sách</a></li>
                        @endcan
                        @can('add-orders')
                            <li><a href="{{ route('orders.create') }}"><i class="fa fa-angle-right"></i>Thêm mới</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-accumulate-points, view-discount')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i> <span>Tích điểm</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-accumulate-points')
                            <li>
                                <a href="{{ route('accumulate-points.index') }}">
                                    <i class="fa fa-angle-right"></i>Tích điểm
                                </a>
                            </li>
                        @endcan
                        @can('view-discount')
                            <li>
                                <a href="{{ route('membership_type.index') }}">
                                    <i class="fa fa-angle-right"></i>Loại thành viên
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-restricted-lists')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-exclamation-triangle"></i> <span>Danh sách hạn chế</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-restricted-lists')
                            <li><a href="{{ route('restricted-lists.index') }}"><i class="fa fa-angle-right"></i>Danh
                                    sách</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-users')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Người dùng</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-users')
                            <li>
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-angle-right"></i>Danh sách
                                </a>
                            </li>
                        @endcan
                        @can('add-users')
                            <li>
                                <a href="{{ route('users.create') }}">
                                    <i class="fa fa-angle-right"></i>Thêm mới
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-feedback')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-comments"></i> <span>Phản hồi</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-feedback')
                            <li>
                                <a href="{{ route('feedbacks.index') }}">
                                    <i class="fa fa-angle-right"></i>Danh sách
                                </a>
                            </li>
                        @endcan
                        @can('add-feedback')
                            <li>
                                <a href="{{ route('feedbacks.create') }}">
                                    <i class="fa fa-angle-right"></i>Thêm mới
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-subscribe')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span>Đăng ký nhận tin </span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-subscribe')
                            <li>
                                <a href="{{ route('subscribe.index') }}">
                                    <i class="fa fa-angle-right"></i>Danh sách
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('photo-library')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-image"></i> <span>Thư viện ảnh</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('view-photo-library')
                            <li>
                                <a href="{{ route('photo-library.index') }}">
                                    <i class="fa fa-angle-right"></i>Danh sách
                                </a>
                            </li>
                        @endcan
                        @can('add-photo-library')
                            <li>
                                <a href="{{ route('photo-library.create') }}">
                                    <i class="fa fa-angle-right"></i>Thêm mới
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view-web-settings')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span>Thông tin</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('edit-web-settings')
                            <li>
                                <a href="{{ route('web-settings.index') }}">
                                    <i class="fa fa-angle-right"></i>Cài đặt webstite
                                </a>
                            </li>
                        @endcan
                        @can('view-slide')
                            <li>
                                <a href="{{ route('slides.index') }}">
                                    <i class="fa fa-angle-right"></i>Slides
                                </a>
                            </li>
                        @endcan
                        @can('edit-introductions-page')
                            <li>
                                <a href="{{ route('introductions.index') }}">
                                    <i class="fa fa-angle-right"></i>Trang giới thiệu
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
