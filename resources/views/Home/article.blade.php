@extends('Home.master')


@section('content')
        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>عنوان مقاله</h1>

            <!-- Author -->
            <p class="lead">
                توسط <a href="#">حسام موسوی</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> ارسال شده در ۱۲ خرداد ۹۶</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">

            <hr>

            <!-- Post Content -->
            <p dir="rtl">بعد از آنکه تیم مدیریت راکت وب تصمیم گرفتند که بخشی از مقاله ها را به موضوع لینوکس اختصاص دهیم، تصمیم گرفتم که از مفاهیم و مقدمات اولیه شروع کنم تا اگر در آینده سراغ مباحث کمی پیشرفته تر رفتیم، منبعی برای خواندن مفاهیم اولیه داشته باشید.</p>

            <p dir="rtl" style="text-align:center"><img alt="" src="/public/images/2017/6/26/linux.jpg"></p>

            <p dir="rtl">لینوکس توی دهه ۹۰ متولد شد و از اون وقت همواره در حال رشد و ترقی بوده، تا جایی که الان به عنوان یک سیستم عامل خانگی ازش استفاده می کنن. برای اون دسته از افرادی که نمی دونن باید بگم که لینوکس تقریبا همه جا هست. تلفن همراه تان را نگاهی بیاندازید، سیستم هوشمند ماشین ها از لینوکس ساخته شدند. وسائل هوشمند آشپزخانه تان هم دقیقا به همین شکل. پس واقعا لینوکس در همه جا حضور داره. البته باید گفت که بیشترین نقش لینوکس در سوپر کامپیوترها، دسکتاپ، سرور و سیستم های تعبیه شده است. اما قبل از آنکه درباره سطح اجرایی لینوکس صحبت بشه باید گفت که لینوکس یک سیستم عامل پایدار، امن و رایگان است.</p>

            <p dir="rtl">خب در این مقاله می خوام که بدون هیچ حاشیه ای، خیلی سریع شما رو با مفهوم لینوکس آشنا کنم.</p>

            <p dir="rtl"><span style="font-size:16px"><strong>لینوکس</strong><strong> </strong><strong>چیست؟</strong></span></p>

            <p dir="rtl">درست مانند سیستم عامل های ویندوز اکس پی و مکینتاش، لینوکس هم یک سیستم عامل محسوب میشه. سیستم عامل از دسته نرم افزار ها محسوب میشه و ارتباط مستقیمی با سخت افزار داره. یعنی یه سیستم عامل می تونه سخت افزار رو کنترل کنه. در لایه بالایی سیستم عامل، کاربر و نرم افزارهای کاربردی قرار داره. پس میشه گفت رابط بین کاربر و سخت افزار هم محسوب می شه. سیستم عامل جزو برنامه های سیستمی به حساب می آد و در نهایت برنامه های کاربردی و … روی سیستم عامل اجرا می شن. بدون داشتن یک سیستم عامل توانایی اجرای برنامه ها رو ندارید.</p>

            <p dir="rtl">سیستم عامل معمولا شامل این مورد ها هستش:</p>

            <p dir="rtl"><strong>Bootloader</strong></p>

            <p dir="rtl"><strong>&nbsp;</strong>برنامه ای هستش که فرایند بوت شدن «بالا آمدن» سیستم رو برای شما انجام میده. بعضی از بوت لودر ها خیلی ساده اند و بعضی ها هم پیچیده. ولی خب در نهایت کار آن ها در لایه منطقی یکی هستش.</p>

            <p dir="rtl"><strong>Kernel</strong></p>

            <p dir="rtl"><strong>&nbsp;</strong>مهمترین قسمت یک سیستم عامل محسوب می شه، در حقیقت ما بهش می گیم، لینوکس. چون خود لینوکس یک کرنل کلی محسوب میشه. کرنل سی پی یو شما رو کنترل میکنه، حافظه اصلی شما رو در اختیار داره و همچنین اجزای دیگه سخت افزار رو می تونه کنترل کنه. کرنل پایین ترین سطح سیستم عامل محسوب میشه.</p>

            <p dir="rtl"><strong>Daemons</strong></p>

            <p dir="rtl">دیمونس در واقع فرایند های پشت زمینه سیستم شما رو در بر می گیره. که معمولا یا در هنگام بوت شدن سیستم شروع به کار میکنه و یا بعد از اینکه به دسکتاپ وارد شدید.</p>

            <p dir="rtl"><strong>Shell</strong></p>

            <p dir="rtl">&nbsp;به احتمال زیاد چیزی به اسم خط فرمان لینوکس رو شنیده باشید. این قسمت رو شل یا پوسته میگن. در واقع جایی هستش که شما می تونید از طریق متن در یک محیط متنی با کامپیوتر ارتباط برقرار کنید. اینجا جاییه که باعث میشه مردم بیشترین ترس رو نسبت به لینوکس پیدا کنند. البته با حضور دسکتاپ های گرافیکی مدرن کمتر برای انجام کارهای روزمره به محیط کامند لاین احتیاج پیدا می کنیم.&nbsp;</p>

            <p dir="rtl"><strong>Graphical Server</strong></p>

            <p dir="rtl">&nbsp;در واقع این قسمت رو میشه یک زیر سیستم به حساب آورد که می تونه گرافیک رو روی صفحه نمایش، نشون بده. اغلب اوقات ما اون رو با اسم X-Server هم می بینیم.</p>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>ثبت نظر :</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-right" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">حسام موسوی
                        <small>۱۰ روز قبل</small>
                        <button class="pull-left btn btn-xs btn-success" data-toggle="modal" data-target="#sendCommentModal" data-parent="21">پاسخ</button>
                    </h4>
                    معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است.
                </div>
            </div>

            <!-- Comment -->
            <div class="media">
                <a class="pull-right" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">حسام موسوی
                        <small>۱۰ روز قبل</small>
                        <button class="pull-left btn btn-xs btn-success" data-toggle="modal" data-target="#sendCommentModal" data-parent="21">پاسخ</button>
                    </h4>
                    معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-right" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">حسام موسوی
                                <small>۱۰ روز قبل</small>
                            </h4>
                            معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>جستجو در سایت</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>دیوار</h4>
                <p>طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.</p>
            </div>

        </div>

    <div class="modal fade" id="sendCommentModal" tabindex="-1" role="dialog" aria-labelledby="sendCommentModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ارسال پاسخ</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <input type="hidden" name="parent_id" value="0">
                        <div class="form-group">
                            <label for="message-text" class="control-label">متن پاسخ:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection