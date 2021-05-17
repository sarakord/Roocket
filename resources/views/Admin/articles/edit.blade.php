@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: '/admin/panel/upload-image',
            filebrowserImageUploadUrl: '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش مقاله</h2>
        </div>
        <form class="form-horizontal" action="{{ route('articles.update' , $article->id) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">عنوان مقاله</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">زبان مقاله</label>
                    <select name="lang" id="lang" class="form-control">
                        <option value="fa" {{$article->lang =='fa' ? 'selected':''}}>فارسی</option>
                        <option value="en" {{$article->lang =='en' ? 'selected':''}}>انگلیسی</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">توضیحات کوتاه</label>
                    <textarea rows="5" class="form-control" name="description"
                              id="description">{{ $article->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="body" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="body" id="body">{{ $article->body }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="images" class="control-label">تصویر مقاله</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر مقاله را
                    وارد کنید">
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        @foreach($article->images['images'] as $key => $image)
                            <div class="col-sm-2">
                                <div class="control-label">
                                    {{--@if ($key != 'thumb')--}}
                                    {{$key}}
                                    <input type="radio" name="imagesThumb" value="{{ $image }}" {{
                                        $article->images['thumb'] == $image ? 'checked' :'' }} />
                                    <a href="{{$image}}" target="_blank"><img src="{{$image}}" width="100%"></a>
                                    {{--@endif--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" value="{{ $article->tags }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">ارسال</button>
                    <a href="{{route('articles.index')}}" class="btn btn-warning">انصراف </a>
                </div>
            </div>
        </form>
    </div>
@endsection
