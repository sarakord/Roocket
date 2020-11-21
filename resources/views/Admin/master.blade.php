<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>وبسایت آموزشی لاراول</title>

    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

<div id="app">
    @include('Admin.section.header')
    @yield('content')
</div>

@include('Admin.section.footer')

</body>
@include('sweetalert::alert')

</html>
