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
            Department
            <small>Add New Department</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/department')}}">Department</a></li>
            <li class="active">Add Department</li>
        </ol>
    </section>


    <section class="content">

        <form role="form" action="{{ adminUrl("department/create") }}" method="post">
            @csrf
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- Left Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Department Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label for="" id="">Department Name</label>
                                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : ''  }}" name="name" id="" placeholder="Enter Department Name" value="{{old('name')}}">
                                    <p class="help-block" >
                                        Enter Name of Department
                                        @error('name') <span class="text-danger d-block"> {{ $message }} </span> @enderror
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
