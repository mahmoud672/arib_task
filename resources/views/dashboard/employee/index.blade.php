@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            employee
            <small>All Employees</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/employee')}}">Employees</a></li>
            <li class="active">All Employees</li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Employees Info</h3>
                        <a href="{{adminUrl('employee/create')}}" id="add_new_client" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New employee </a>
                    </div>
                @include('dashboard.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Manager</th>
                            <th>Department</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Manager</th>
                            <th>Department</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($employees)
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td><img src="{{asset($employee->image_path) ?? asset('dashboard/img/picture.png')}}" style="width: 50px" alt="slide image" > </td>
                                    <td>{{$employee->full_name}}</td>
                                    <td>{{$employee->salary}}</td>
                                    <td>{{$employee->manager->full_name}}</td>
                                    <td>{{$employee->department->name}}</td>
                                    <td>{{$employee->created_at ? $employee->created_at->diffForHumans() : ''}}</td>
                                    <td>{{$employee->updated_at ? $employee->updated_at->diffForHumans() : ''}}</td>
                                    <td>
                                        <a href="{{adminUrl("employee/$employee->id/edit")}}" class style="font-size: 20px"><i class="fa fa-pencil-square-o"></i> </a>
                                        <button type="button" class data-toggle="modal" data-target="#delete{{$employee->id}}" style="font-size: 20px">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

                    @if($employees)
                        @foreach($employees as $employee)
                            <div class="modal modal-danger fade" id="delete{{$employee->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete employee</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete employee <strong>{{$employee->full_name}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{adminUrl("employee/$employee->id/delete")}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="d-flex flex-row">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="margin-right: 5px">
                                                        cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>

@endsection
