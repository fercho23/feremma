<header class="main-header">
    <!-- Logo -->
    <a href="{!! URL::to('/') !!}" class="logo"><b>Admin</b>HOTEL</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    @if(Auth::check())
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{!! asset('dist/img/avatar'.(Auth::user()->sex == 'm' ? '5' : '2').'.png') !!}" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">
                                {!! Auth::user()->username !!}
                            </span>
                        </a>

                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{!! asset('dist/img/avatar'.(Auth::user()->sex == 'm' ? '5' : '2').'.png') !!}" class="img-circle" alt="User Image"/>
                                <p>
                                    {!! Auth::user()->fullname() !!}
                                </p>
                                <small>
                                    {!! Auth::user()->role->name !!}
                                </small>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{!! URL::route('users-profile') !!}" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{!! URL('auth/logout') !!}" class="btn btn-default btn-flat">logout</a>
                                </div>
                            </li>
                        </ul>
                    @else
                        <a href="{!! URL('auth/login') !!}">Login</a>
                    @endif

                </li>
            </ul>
        </div>
    </nav>
</header>