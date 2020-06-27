@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویدئو ها</h2>
            <a href="{{route('episodes.create')}}" class="btn btn-sm btn-primary">ارسال ویدئو</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>عنوام ویدئو</th>
                    <th>تعداد نظرات</th>
                    <th>میزان بازدید</th>
                    <th>تعداد دانلود</th>
                    <th> وضعیت ویدئو</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($episodes as $episode)
                        <tr>
                            <td><a href="{{$episode->path()}}">{{$episode->title}}</a></td>
                            <td>{{$episode->commentCount}}</td>
                            <td>{{$episode->viewCount}}</td>
                            <td>{{$episode->downloadCount}}</td>
                            <td>
                                @if ($episode->type == 'vip')
                                    ویژه
                                @elseif($episode->type == 'free')
                                    رایگان
                                @else
                                    نقدی
                                @endif
                            </td>
                            <td>

                                <div class="col-1">
                                    <form action="{{route('episodes.destroy' , $episode->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-sm btn-danger">حذف</button>
                                        <a href="{{route('episodes.edit' , $episode->id)}}"
                                            class="btn-sm btn-warning">ویرایش</a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$episodes->links()}}
    </div>
@endsection
