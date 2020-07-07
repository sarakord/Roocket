@extends('Admin.master')

@section('script')

    <script>
        $(document).ready(function () {
            $('#role_id').selectpicker();
        });
    </script>

@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ثبت نقش</h2>
        </div>
        <form class="form-horizontal" action="{{ route('level.update' , $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('Admin.section.errors')

            <div class="form-group">
                <label for="user_id" class="control-label">نام کاربر</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" readonly>
            </div>
            <div class="form-group">
                <label for="role_id" class="control-label">نقش ها</label>
                <select name="role_id[]" id="role_id"  class="form-control" multiple>
                    @foreach(\App\Role::all() as $role)
                        <option value="{{$role->id}}" {{$user->hasRole($role->name) ? 'selected' : ''}}>{{$role->name}} - {{$role->label}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">ارسال</button>
                    <a href="{{route('level.index')}}" class="btn btn-warning">انصراف</a>
                </div>
            </div>
        </form>
    </div>
@endsection
