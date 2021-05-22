@component('Home.panel.master')

    <ul style="margin: 20px">
        <li>نام کاربری : {{ auth()->user()->name }}</li>
        <li>ایمیل کاربری : {{ auth()->user()->email }}</li>

    </ul>

@endcomponent
