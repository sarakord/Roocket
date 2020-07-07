@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>دسترسی ها</h2>
            <div class="btn-group">
                <a href="{{route('permissions.create')}}" class="btn btn-sm btn-info">ایجاد دسترسی</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>نام دسترسی</th>
                    <th>توضیحات</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->label}}</td>
                        <td>
                            <div class="col-1">
                                <form action="{{route('permissions.destroy' , $permission->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('permissions.edit' , $permission->id)}}" class="btn-sm btn-warning">ویرایش</a>
                                    <button class="btn-sm btn-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{$permissions->links()}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
