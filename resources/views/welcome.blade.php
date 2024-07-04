<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/login/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/login/index.css')}}">
    <title>Login</title>
</head>

<body>
<div class="login-wrapper">
    <div class="logo-div">
        <img src="{{asset('dashboard/img/login.png')}}" alt="logo">
    </div>
    <form action="{{ route('login') }}" class="login-form" method="post">
        @csrf
        <div class="form-div">
            <input type="text" name="email" placeholder="Email">
            @error('email') <span class="invalid-feedback text-danger" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
        </div>
        <div class="form-div">
            <input type="password" name="password" placeholder="Password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
            @error('password') <span class="invalid-feedback text-danger" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

        </div>
        <button type="submit">
            <i class="ion-log-in"></i>
            <span>
          Login
        </span>
        </button>
    </form>
</div>

<script src="{{asset("dashboard/js/jquery-3.4.1.js")}}"></script>
<script src="{{asset("dashboard/js/bootstrap.min.js")}}"></script>
</body>

</html>
