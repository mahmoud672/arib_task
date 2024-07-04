<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

    <!-- ======================= CSS ===================== -->

    <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboard/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('dashboard/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset('dashboard/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/skin-blue.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/style_updates.css')}}">

    <link rel="stylesheet" href="{{asset('dashboard/css/index.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <!-- Bootstrap Min CSS -->
    <!-- Fonts and icons -->
    @yield('customizedStyle')





</head>







<body class="hold-transition skin-blue sidebar-mini">
<div id="app">
    <main>
        <div class="wrapper">
            @include('dashboard.layouts.header')
            @if(currentUserType() == 'employee')
                @include('dashboard.layouts.sideMenuEmployee')
            @else
                @include('dashboard.layouts.sideMenu')
            @endif
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('dashboard.layouts.footer')
        </div>
    </main>
</div>






{{--<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>--}}
<!-- JS
============================================ -->
<!-- jQuery 3 -->
<script src="{{asset('dashboard/js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- DataTables -->
<script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/js/dataTables.bootstrap.min.js')}}"></script>
<!-- <script src="./js/Chart.js"></script> -->
<script src="{{asset('dashboard/js/jquery.flot.js')}}"></script>
<script src="{{asset('dashboard/js/jquery.flot.resize.js')}}"></script>
<script src="{{asset('dashboard/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('dashboard/js/jquery.flot.categories.js')}}"></script>
<script src="{{asset('dashboard/js/adminlte.min.js')}}"></script>
<script src="{{asset('dashboard/js/index.js')}}"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
   Both of these plugins are recommended to enhance the
   user experience. -->
<!-- CK Editor -->
<script src="{{asset("dashboard/bower_components/ckeditor/ckeditor.js")}}"></script>
{{--<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>--}}

@yield('customizedScript')

</body>
</html>
