@extends('Admin.master')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>نظرات</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>متن نظر</th>
                    <th>پست مربوطه</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>

                @foreach($comments as $comment)
                    <tr>
                        <td>{{optional($comment->user)->name}}</td>
                        <td>{{$comment->comment}}</td>
                        <td><a href="{{$comment->commentable->path()}}">{{$comment->commentable->title}}</a></td>
                        <td>
                            <div style="display: flex">
                                <form action="{{route('comments.destroy' , ['comment' => $comment->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-sm btn-danger">حذف</button>
                                </form>
                                <form style="margin-right: 5px" action="{{ route('comments.update'  , ['comment' => $comment->id]) }}" method="post">
                                    {{ method_field('patch') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-success">تایید</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{$comments->links()}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
