<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(auth()->check())
                    <img src="{{ asset(auth()->user()->image_path) }}">
                @else
                    <img src="{{asset("dashboard/img/avatar.png")}}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ auth()->check() ? Auth::user()->full_name : '' }} </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> <span>Statistics</span></a></li>

            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-male"></i>
                    <span>Employee</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('employee/create')}}"><i class="fa fa-plus"></i> Add Employee</a></li>
                    <li><a href="{{adminUrl('employee')}}"><i class="fa fa-edit"></i> Show / Edit Employee</a></li>
                </ul>
            </li>--}}

            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Department</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{adminUrl('department/create')}}"><i class="fa fa-plus"></i> Add Department</a></li>
                    <li><a href="{{adminUrl('department')}}"><i class="fa fa-edit"></i> Show / Edit Department</a></li>
                </ul>
            </li>--}}

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Task</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    {{--<li><a href="{{adminUrl('task/create')}}"><i class="fa fa-plus"></i> Add Task</a></li>--}}
                    <li><a href="{{adminUrl('task')}}"><i class="fa fa-edit"></i> Show / Edit Task</a></li>
                </ul>
            </li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
