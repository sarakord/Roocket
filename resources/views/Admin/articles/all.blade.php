@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>مقالات</h2>
            <a href="{{route('articles.create')}}" class="btn btn-sm btn-primary">ارسال مقاله</a>
        </div>



        <div class="table-responsive">
            <table class="table table-striped table-bordered">
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
                <tr>
                    @foreach($articles as $article)

                        @switch($article->status)
                            @case(0)
                                @php
                                   $url = route('article.status' , $article->id);
                                    $sattus='<a href="'.$url.'" class="badge badge-danger">منتشر نشده</a>';
                                @endphp
                            @break
                            @case(1)
                            @php
                                $url = route('article.status' , $article->id);
                                 $sattus='<a href="'.$url.'" class="badge badge-success">منتشر شده</a>';
                            @endphp
                            @break
                        @endswitch

                        <td><a href="{{$article->path()}}">{{$article->title}}</a></td>
                        <td>{{$article->commentCount}}</td>
                        <td>{{$article->viewCount}}</td>
                        <td>{!! $status !!}</td>
                        <td>
                            <form action="{{route('articles.destroy' , $article->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <div>
                                    <button class="badge badge-danger">حذف</button>
                                    <a href="{{route('articles.edit' , $article->id)}}" class="badge
                                    badge-warning">ویرایش</a>
                                </div>
                            </form>
                        </td>
                    @endforeach
                        {{$articles->links()}}
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
