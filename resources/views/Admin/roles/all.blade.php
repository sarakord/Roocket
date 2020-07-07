@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>نقش ها</h2>
            <div class="btn-group">
                <a href="{{route('roles.create')}}" class="btn btn-sm btn-info">ایجاد نقش</a>
                <a href="{{route('permissions.index')}}" class="btn btn-sm btn-success ">بخش دسترسی ها</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>نام نقش</th>
                    <th>توضیحات</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>{{$role->label}}</td>
                        <td>
                            <div class="col-1">
                                <form action="{{route('roles.destroy' , $role->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('roles.edit' , $role->id)}}" class="btn btn-sm btn-warning">ویرایش</a>
                                    <button class="btn-sm btn-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{$roles->links()}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
