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
            task
            <small>All Tasks</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/task')}}">Tasks</a></li>
            <li class="active">All Tasks</li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Tasks Info</h3>
                        @if(currentUserType() != 'employee')
                            <a href="{{adminUrl('task/create')}}" id="add_new_client" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New task </a>
                        @endif
                    </div>
                @include('dashboard.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Employee</th>
                            <th>Start At</th>
                            <th>End At</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Employee</th>
                            <th>Start At</th>
                            <th>End At</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($tasks)
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->employee->full_name}}</td>
                                    <td>{{$task->start_at}}</td>
                                    <td>{{$task->end_at}}</td>
                                    <td>{{$task->status}}</td>
                                    <td>{{$task->created_at ? $task->created_at->diffForHumans() : ''}}</td>
                                    <td>{{$task->updated_at ? $task->updated_at->diffForHumans() : ''}}</td>
                                    <td>
                                        <button type="button" class data-toggle="modal" data-target="#changeStatus{{$task->id}}" style="font-size: 20px">
                                            <i class="fa fa-tasks"></i>
                                        </button>
                                        @if(currentUserType() != 'employee')
                                            <a href="{{adminUrl("task/$task->id/edit")}}" class style="font-size: 20px"><i class="fa fa-pencil-square-o"></i> </a>
                                            <button type="button" class data-toggle="modal" data-target="#delete{{$task->id}}" style="font-size: 20px">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

                    @if($tasks)
                        @foreach($tasks as $task)
                            <div class="modal modal-danger fade" id="delete{{$task->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete task</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete task <strong>{{$task->title}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{adminUrl("task/$task->id/delete")}}" method="post">
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

                    @if($tasks)
                        @foreach($tasks as $task)
                            <div class="modal modal-primary fade" id="changeStatus{{$task->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Change task status</h4>
                                        </div>
                                        <div class="modal-body">

                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{adminUrl("task/$task->id/change-status")}}" method="post">
                                                @method('PATCH')
                                                @csrf
                                                <div>
                                                    <select name="status"  class="form-control {{ $errors->has('status') ? 'is-invalid' : ''  }}" id="">
                                                        <option value="" readonly> -- Select Status Of Task -- </option>
                                                        @foreach($allStatus as $status)
                                                            <option value="{{ $status }}" {{ $task->status == $status ? 'selected' : '' }}> {{ $status }} </option>
                                                        @endforeach
                                                    </select>
                                                    <p class="help-block" >
                                                        @error('status') <span class="text-danger">  {{ $message }} </span> @enderror
                                                    </p>
                                                </div>
                                                <div class="d-flex flex-row">
                                                    <button type="submit" class="btn btn-primary">
                                                        change
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
