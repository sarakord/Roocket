@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>دوره ها</h2>
            <a href="{{route('courses.create')}}" class="btn btn-sm btn-primary">ارسال دوره</a>
        </div>




        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>عنوام دوره</th>
                    <th>تعداد نظرات</th>
                    <th>میزان بازدید</th>
                    <th>وضعیت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($courses as $course)
                        <tr>
                            <td><a href="{{$course->path()}}">{{$course->title}}</a></td>
                            <td>{{$course->commentCount}}</td>
                            <td>{{$course->viewCount}}</td>
                            <td>
                                @if ($course->type == 'vip')
                                    ویژه
                                @elseif($course->type == 'free')
                                    رایگان
                                @else
                                    نقدی
                                @endif
                            </td>
                            <td>

                                <div class="col-1">
                                    <a href="{{route('courses.destroy' , $course->id)}}" class="btn-sm
                                    btn-danger">حذف</a>
                                    <a href="{{route('courses.edit' , $course->id)}}"
                                            class="btn-sm btn-warning">ویرایش</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{$courses->links()}}

                </tbody>
            </table>
        </div>
    </div>
@endsection
