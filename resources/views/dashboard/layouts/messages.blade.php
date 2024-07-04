@if(count($errors) > 0)
    <div class="w-100">
        <div class="alert alert-danger" style="background-color: #f66e84">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif


@if(Session::has('success'))
    <div class="alert alert-success w-100">
        <h6>{{session('success')}}</h6>
    </div>
@endif


@if(Session::has('exception'))
    <div class="alert alert-danger w-100" style="background-color: #f66e84">
        <h6>{{session('exception')}}</h6>
    </div>
@endif
