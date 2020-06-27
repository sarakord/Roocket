@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: '/admin/panel/upload-image',
            filebrowserImageUploadUrl: '/admin/panel/upload-image'

        })
    </script>
    <script>
        $(document).ready(function () {
            $('#course_id').selectpicker();
        });
    </script>

@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویدئو جدید</h2>
        </div>
        <form class="form-horizontal" action="{{ route('episodes.store') }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">عنوان ویدئو</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید"
                           value="{{ old('title') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">نوع ویدئو</label>
                    <select name="type" id="type" class="form-control">
                        <option value="vip">اعضای ویژه</option>
                        <option value="cashe">نقدی</option>
                        <option value="free" selected>رایگان</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">توضیحات</label>
                    <textarea rows="8" class="form-control" name="description"
                              id="description">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="course_id" class="control-label">دوره های مرتبط</label>
                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="price" class="control-label">زمان ویدئو</label>
                    <input type="text" class="form-control" name="time" id="time" placeholder="زمان را وارد کنید"
                           value="{{ old('time') }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">شماره قسمت</label>
                    <input type="text" class="form-control" name="number" id="number"
                           placeholder="شماره قسمت را وارد کنید"
                           value="{{ old('number') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="price" class="control-label">لینک ویدئو</label>
                    <input type="text" class="form-control" name="videoUrl" id="videoUrl"
                           placeholder="لینک را وارد کنید"
                           value="{{ old('videoUrl') }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید"
                           value="{{ old('tags') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">ارسال</button>
                    <a href="{{route('episodes.index')}}" class="btn btn-warning"> انصراف</a>
                </div>
            </div>
        </form>
    </div>
@endsection
