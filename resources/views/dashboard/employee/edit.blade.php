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
            Employee
            <small>Edit Employee</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/employee')}}">Employee</a></li>
            <li class="active">Edit Employee</li>
        </ol>
    </section>


    <section class="content">

        <form role="form" action="{{ adminUrl("employee/$employee->id/edit") }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- Left Side -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                @if(currentUserType() == 'admin')
                                    <div class="col-lg-12">
                                        <label for="" id="">Type</label>
                                        <select name="type"  class="form-control {{ $errors->has('type') ? 'is-invalid' : ''  }}" id="">
                                            <option value="" readonly> -- Select Employee Type -- </option>
                                            @foreach($types as $type)
                                                <option value="{{ $type }}" {{ $employee->type == $type ? 'selected' : '' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>

                                        <p class="help-block" >
                                            Select Department of Employee
                                            @error('type') <span class="text-danger">  {{ $message }} </span> @enderror
                                        </p>
                                    </div>
                                @endif

                                <div class="col-lg-12">
                                    <label for="" id="">Employee First Name</label>
                                    <input type="text" class="form-control  {{ $errors->has('fname') ? 'is-invalid' : ''  }}" name="fname" id="" placeholder="Enter Employee Name" value="{{ $employee->fname }}">
                                    <p class="help-block" >
                                        Enter First Name of Employee
                                        @error('fname') <span class="text-danger d-block"> {{ $message }} </span> @enderror
                                    </p>

                                </div>

                                <div class="col-lg-12">
                                    <label for="" id="">Employee Last Name</label>
                                    <input type="text" class="form-control {{ $errors->has('lname') ? 'is-invalid' : ''  }}" name="lname" id="" placeholder="Enter Employee Last Name" value="{{ $employee->lname }}">
                                    <p class="help-block" >
                                        Enter Last Name of Employee
                                        @error('lname') <span class="text-danger"> {{ $message }} </span> @enderror
                                    </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="" id="">Email</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''  }}" name="email" id="" placeholder="Enter Employee Email" value="{{ $employee->email }}">
                                    <p class="help-block" >
                                        Enter Email of Employee
                                        @error('email') <span class="text-danger"> {{ $message }} </span> @enderror
                                    </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="" id="">Password</label>
                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''  }}" name="password" id="" placeholder="Enter Employee Password" value="">
                                    <p class="help-block" >
                                        Enter Password of Employee
                                        @error('password') <span class="text-danger">  {{ $message }} </span> @enderror
                                    </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="" id="">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Employee Password" autocomplete="new-password">
                                    <p class="help-block" >Confirm Password</p>
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
                <!-- Right Side -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">More Info</h3>
                        </div>
                        <!-- .box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label for="" id="">Phone</label>
                                    <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''  }}" name="phone" id="" placeholder="Enter Employee Phone" value="{{ $employee->phone }}">
                                    <p class="help-block" >
                                        Enter Phone of Employee
                                        @error('phone') <span class="text-danger"> {{ $message }} </span> @enderror
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Image</label>
                                    <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : ''  }}" name="image" id="">
                                    <p class="help-block client_logo">
                                        Upload Employee Image
                                        @error('image') <span class="text-danger">  {{ $message }} </span> @enderror
                                    </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="" id="">Salary</label>
                                    <input type="number" class="form-control {{ $errors->has('salary') ? 'is-invalid' : ''  }}" name="salary" id="" placeholder="Enter Employee Salary" value="{{ $employee->salary }}">
                                    <p class="help-block" >
                                        Enter Salary of Employee
                                        @error('salary') <span class="text-danger">  {{ $message }} </span> @enderror
                                    </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="" id="">Department</label>
                                    <select name="department_id"  class="form-control {{ $errors->has('department_id') ? 'is-invalid' : ''  }}" id="">
                                        <option value="" readonly> -- Enter Employee Department -- </option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}> {{ $department->name }} </option>
                                        @endforeach
                                    </select>

                                    <p class="help-block" >
                                        Select Department of Employee
                                        @error('department_id') <span class="text-danger">  {{ $message }} </span> @enderror
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
