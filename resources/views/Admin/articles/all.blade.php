@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>مقالات</h2>
            <a href="{{route('articles.create')}}" class="btn btn-sm btn-primary">ارسال مقاله</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>عنوام مقاله</th>
                    <th>تعداد نظرات</th>
                    <th>میزان بازدید</th>
                    <th>وضعیت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($articles as $article)
                        <tr>
                            @switch($article->status)
                                @case(0)
                                @php
                                    $url = route('article.status' , $article->id);
                                     $status='<a href="'.$url.'" class="btn-sm btn-danger">منتشر نشده</a>';
                                @endphp
                                @break
                                @case(1)
                                @php
                                    $url = route('article.status' , $article->id);
                                     $status='<a href="'.$url.'" class="btn-sm btn-primary ">منتشر شده</a>';
                                @endphp
                                @break
                            @endswitch

                            <td><a href="{{$article->path()}}">{{$article->title}}</a></td>
                            <td>{{$article->commentCount}}</td>
                            <td>{{$article->viewCount}}</td>
                            <td>{!! $status !!}</td>
                            <td>

                                <div class="col-1">
                                    <form action="{{route('articles.destroy' , $article->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-sm btn-danger">حذف</button>
                                        <a href="{{route('articles.edit' , $article->id)}}"
                                           class="btn-sm btn-warning">ویرایش</a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{$articles->links()}}

                </tbody>
            </table>
        </div>
    </div>
@endsection
