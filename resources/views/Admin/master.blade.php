<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>وبسایت آموزشی لاراول</title>

    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
</head>

<body>

    @include('Admin.section.header')
        @yield('content')
    @include('Admin.section.footer')
</body>
</html>
