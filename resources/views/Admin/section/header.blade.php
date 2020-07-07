<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">وبسایت آموزشی لاراول</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li><a href="#">Dashboard</a></li>--}}
                {{--<li><a href="#">Settings</a></li>--}}
                {{--<li><a href="#">Profile</a></li>--}}
                {{--<li><a href="#">Help</a></li>--}}
            {{--</ul>--}}
            {{--<form class="navbar-form navbar-right">--}}
                {{--<input type="text" class="form-control" placeholder="Search...">--}}
            {{--</form>--}}

            <div class="navbar-left">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    @method('post')
                    <button class="btn btn-sm btn-warning" style="margin: 15px">خروج از پنل کاربری</input>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="/admin/panel">پنل اصلی</a></li>
                <li><a href="/admin/articles">مقاله ها</a></li>
                <li><a href="/admin/courses">دوره ها</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="/admin/users">کاربران <span class="badge">0</span></a></li>
                <li><a href="">پرداختی های موفق <span class="badge">0</span></a></li>
                <li><a href="">پرداختی های ناموفق <span class="badge">0</span></a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">همه نظرات</a></li>
                <li><a href="">نظرات تایید نشده <span class="badge">0</span></a></li>
                {{--<li><a href="">Another nav item</a></li>--}}
            </ul>
        </div>
