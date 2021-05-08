@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>پرداخت‌های ناموفق</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>مبلغ پرداخت شده</th>
                    <th>نوع پرداخت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>

                @foreach($payments as $payment)
                    <tr>
                        <td>{{optional($payment->user)->name}}</td>
                        <td>{{$payment->price}}</td>
                        <td>
                            @if ($payment->course_id == 'vip')
                                عضویت ویژه
                            @else
                                {{$payment->course->title}}
                            @endif
                        </td>
                        <td>
                            <div class="col-1 " style="display: flex;">
                                <a href="{{route('payments.update', ['payment' => $payment])}}" class="btn-sm btn-warning">تائیدکردن</a>
                                <form action="{{route('payments.destroy' , $payment->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-sm btn-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{$payments->links()}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
