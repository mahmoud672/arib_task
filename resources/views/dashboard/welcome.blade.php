@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
<!-- Drop Your Customized Style Here -->
@section('customizedStyle')
@endsection
<!-- Drop Your Customized Scripts Here -->
@section('customizedScript')
@endsection
<!-- Start of content section -->
@section('content')


    <!-- Main content -->
    <section class="content container-fluid">
        <div class="rgs-wrapper">
            <!-- start stats section -->
            <div class="stats-section">
                <div class="section-heading">
                    <i class="ion-stats-bars"></i>
                    <p>
                        Statistics
                    </p>
                </div>
                <div class="section-body">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{ $employees }}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                           Employees
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="fa fa-male"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{ $managers }}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Managers
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion-ios-people"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{ $departments }}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                           Departments
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion-ios-paper"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{ $tasks }}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Task
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion-ios-boo"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end stats section -->


            <!-- start shortcuts section -->
            <div class="shortcuts-section">
                <div class="section-heading">
                    <i class="ion-shuffle"></i>
                    <p>
                        Shortcuts
                    </p>
                </div>
                <div class="section-body">
                    <ul>
                        <li>
                            <a href="{{adminUrl('task/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/shortcuts/managment.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Task
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('department/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/shortcuts/add-service.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Department
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{adminUrl('employee/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/shortcuts/employee.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                       Add Employee
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end shortcuts section -->

        </div>
    </section>
    <!-- /.content -->


@endsection
