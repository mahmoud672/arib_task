@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}

{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Task
            <small>Edit Task</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/task')}}">Task</a></li>
            <li class="active">Edit Task</li>
        </ol>
    </section>


    <section class="content">

        <form role="form" action="{{ adminUrl("task/$task->id/edit") }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- Left Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Task Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label for="" id="">Task Name</label>
                                    <input type="text" class="form-control  {{ $errors->has('title') ? 'is-invalid' : ''  }}" name="title" id="" placeholder="Enter Task Title" value="{{ $task->title }}">
                                    <p class="help-block" >
                                        Enter Title of Task
                                        @error('title') <span class="text-danger d-block"> {{ $message }} </span> @enderror
                                    </p>

                                </div>

                                <div class="col-lg-12">
                                    <label for="" id="">Employee</label>
                                    <select name="employee_id"  class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : ''  }}" id="">
                                        <option value="" readonly> -- Select Task Employee -- </option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ $task->employee_id == $employee->id ? 'selected' : '' }}> {{ $employee->full_name }} </option>
                                        @endforeach
                                    </select>

                                    <p class="help-block" >
                                        Select Employee For Task
                                        @error('employee_id') <span class="text-danger">  {{ $message }} </span> @enderror
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" id="">Task Description</label>
                                    <textarea name="description" id="" class="form-control  {{ $errors->has('description') ? 'is-invalid' : ''  }}" rows="10" placeholder="Enter Task Description">{{ $task->description }}</textarea>
                                    <p class="help-block" >
                                        Enter Description of Task
                                        @error('description') <span class="text-danger d-block"> {{ $message }} </span> @enderror
                                    </p>
                                </div>

                                <div class="col-lg-4">
                                    <label for="" id="">Start At</label>
                                    <input type="datetime-local" class="form-control  {{ $errors->has('start_at') ? 'is-invalid' : ''  }}" name="start_at" id="" placeholder="Enter Task Start At" value="{{ $task->start_at }}">
                                    <p class="help-block" >
                                        Enter Time of Starting Task At
                                        @error('start_at') <span class="text-danger d-block"> {{ $message }} </span> @enderror
                                    </p>

                                </div>

                                <div class="col-lg-4">
                                    <label for="" id="">End At</label>
                                    <input type="datetime-local" class="form-control  {{ $errors->has('end_at') ? 'is-invalid' : ''  }}" name="end_at" id="" placeholder="Enter Task End At" value="{{ $task->end_at }}">
                                    <p class="help-block" >
                                        Enter Time of Ending Task At
                                        @error('end_at') <span class="text-danger d-block"> {{ $message }} </span> @enderror
                                    </p>

                                </div>

                                <div class="col-lg-4">
                                    <label for="" id="">Status</label>
                                    <select name="status"  class="form-control {{ $errors->has('status') ? 'is-invalid' : ''  }}" id="">
                                        <option value="" readonly> -- Select Status Of Task -- </option>
                                        @foreach($allStatus as $status)
                                            <option value="{{ $status }}" {{ $task->status == $status ? 'selected' : '' }}> {{ $status }} </option>
                                        @endforeach
                                    </select>
                                    <p class="help-block" >
                                        Select Status For Task
                                        @error('status') <span class="text-danger">  {{ $message }} </span> @enderror
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
