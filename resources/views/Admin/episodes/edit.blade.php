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
            <h2>ویرایش ویدئو</h2>
        </div>
        <form class="form-horizontal" action="{{ route('episodes.update' , $episode->id) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">عنوان ویدئو</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $episode->title }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">نوع ویدئو</label>
                    <select name="type" id="type" class="form-control">
                        <option value="vip" {{ $episode->type == 'vip'? 'selected' :''  }}>اعضای ویژه</option>
                        <option value="cashe" {{ $episode->type == 'cashe'? 'selected' :''  }}>نقدی</option>
                        <option value="free" {{ $episode->type == 'free'? 'selected' :''  }}>رایگان</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">توضیحات</label>
                    <textarea rows="8" class="form-control" name="description"
                              id="body">{{ $episode->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="course_id" class="control-label">دوره های مرتبط</label>
                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}" {{ $course->id == $episode->course_id ? 'selected' : '' }}>{{$course->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="price" class="control-label">زمان ویدئو</label>
                    <input type="text" class="form-control" name="time" id="time" placeholder="زمان را وارد کنید"
                           value="{{$episode->time }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">شماره قسمت</label>
                    <input type="text" class="form-control" name="number" id="number"
                           placeholder="شماره قسمت را وارد کنید"
                           value="{{ $episode->number }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="price" class="control-label">لینک ویدئو</label>
                    <input type="text" class="form-control" name="videoUrl" id="videoUrl"
                           placeholder="لینک را وارد کنید"
                           value="{{ $episode->videoUrl }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید"
                           value="{{ $episode->tags }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">ویرایش</button>
                    <a href="{{route('episodes.index')}}" class="btn btn-warning">انصراف </a>
                </div>
            </div>
        </form>
    </div>
@endsection
