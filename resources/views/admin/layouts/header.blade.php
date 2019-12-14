<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>N</b>X</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Nail</b>Xinh</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="upload/images/users/{{ Auth::check() ? Auth::user()->avatar : '' }}"
                             class="user-image"
                             alt="User Image">
                        <span class="hidden-xs">{{ Auth::check() ? Auth::user()->full_name : '' }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="upload/images/users/{{ Auth::check() ? Auth::user()->avatar : '' }}"
                                 class="img-circle"
                                 alt="User Image">

                            <p>
                                {{ Auth::check() ? Auth::user()->full_name : ''}}
                                <small>{{ Auth::check() ? Auth::user()->role->name : ''}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('profile', Auth::check() ? Hashids::encode(Auth::user()->id) :'' ) }}"
                                   class="btn btn-default btn-flat">Thông tin</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="btn btn-default btn-flat">Đăng xuất</a>
                                    <form id="logout-form"
                                          action="{{ url('/logout') }}"
                                          method="POST" style="display: none;">
                                            @csrf
                                    </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
