<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{adminUrl('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- <span class="logo-mini"><b>A</b>LT</span> -->
        <!-- logo for regular state and mobile devices -->
        <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
        <img src="{{asset('dashboard/img/logo.png')}}" alt="logo">
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="{{adminUrl('message')}}" class="dropdown-toggle">
                        <i class="fa fa-envelope-o"></i>
                    </a>
                </li>
                <!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="{{adminUrl('setting/edit')}}" class="dropdown-toggle">
                        <i class="fa fa-cogs"></i>
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @if(auth()->check())
                            <img src="{{ asset(auth()->user()->image_path) }}" class="img-circle" style="width: 40px;height:40px" alt="User Image">
                            <span class="hidden-xs"> {{ auth()->user()->type }} </span>
                        @else
                            <img src="{{asset('dashboard/img/photo2.png')}}" class="img-circle" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"> Admin Panel</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                           @if(auth()->check())
                                <img src="{{ asset(auth()->user()->image_path) }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ auth()->user()->full_name }}
                                    <small>Member since {{ auth()->user()->created_at->format('M Y') }}</small>
                                </p>
                            @else
                                <img src="{{asset('dashboard/img/photo2.png')}}" class="img-circle" alt="User Image">
                                <p>
                                    Admin - Dashboard
                                    <small>Member since Sep. 2020</small>
                                </p>
                            @endif

                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ auth()->check() ? adminUrl('employee/'.Auth::user()->id.'/edit') : ''}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form method="post" action="{{auth()->check() ? route('logout') : '' }}">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
