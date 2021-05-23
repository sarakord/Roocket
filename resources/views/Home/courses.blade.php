@extends('Home.master')


@section('content')
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$course->title}}</h1>

        <!-- Author -->
        <p class="lead small">
            توسط <a href="#">{{$course->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> ارسال شده در {{jdate($course->created_at)->format('d M Y')}}
        </p>

        <hr>

        <!-- Post Content -->
        <p dir="rtl">{!! $course->description !!}</p>

        <hr>
        <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید این دوره را خریداری کنید</div>

        @if (auth()->check())
            @if (! auth()->user()->isActive())
                <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید عضویت ویژه تهیه کنید</div>
            @endif
        @else
            <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید ابتدا وارد سایت شوید</div>
        @endif

        <h3>قسمت های دوره</h3>
        <table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th>شماره قسمت</th>
                <th>عنوان قسمت</th>
                <th>زمان قسمت</th>
                <th>دانلود</th>
            </tr>
            </thead>
            <tbody>
            @foreach($course->episodes()->get() as $episode)
                <tr>
                    <th scope="row">{{$episode->number}}</th>
                    <td>{{$episode->title}}</td>
                    <td>{{$episode->time}}</td>
                    <td>
                        <a href="{{$episode->download()}}">
                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <!-- Blog Comments -->

        @include('Home.layouts.comment' , ['comments' => $comments , 'subject' => $course])
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        @if (auth()->guest() || ! auth()->user()->checkLearning($course))
            <div class="well">
                <form action="{{route('course.payment')}}" method="post">
                    @csrf
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <button type="submit" class="btn btn-success">خرید دوره</button>
                </form>
            </div>
    @endif

    <!-- Blog Search Well -->
        <div class="well">
            <h4>جستجو در سایت</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>دیوار</h4>
            <p>طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح
                سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.</p>
        </div>

    </div>
@endsection
