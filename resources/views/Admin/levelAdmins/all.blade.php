@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>مدیران سایت</h2>
            <div class="btn-group">
                <a href="{{route('level.create')}}" class="btn btn-sm btn-info">ثبت نقش برای کاربر</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>ایمیل</th>
                    <th>نقش</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    @if (count($role->users))
                        @foreach($role->users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$role->name}} - {{$role->label}}</td>
                                <td>
                                    <div class="col-1">
                                        <form action="{{route('user.destroy' , $user->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('level.edit' , $user->id)}}" class="btn-sm btn-warning">ویرایش</a>
                                            <button class="btn-sm btn-danger">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
                {{$roles->links()}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
