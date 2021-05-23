@component('Home.panel.master')

    <ul style="margin: 20px">
        <li>نام کاربری : {{ user()->name }}</li>
        <li>ایمیل کاربری : {{ user()->email }}</li>
        @if(user()->isActive())
            <li> زمان پایان اعتبار ویژه : {{ \Carbon\Carbon::parse(user()->viptime)->diffInDays() }} روز دیگر</li>
        @else
            <li>شما عضو ویژه نیستید</li>
        @endif
    </ul>

@endcomponent
