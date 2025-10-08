@extends('components.layouts.app.index')
@section('meta')
    <title>درباره رایان نوین</title>
    <meta name="description" content="درباره رایان نوین">
@endsection
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'درباره ما',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="درباره ما" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        <div>
            <h3 class="text-center   font-bold text-3xl">چرا رایان نوین؟</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 justify-content-center">
            <div>
                <p>
                    <span class="text-sky-400 text-2xl">01</span>
                    <br>
                    رایان نوین با بیش از ۱۲ سال سابقه‌ی فعالیت تخصصی در حوزه‌ی سیستم‌های امنیتی و نظارت تصویری، امروز یکی از مجموعه‌های معتبر و خوش‌نام در این صنعت است. در طول این سال‌ها، با اجرای صدها پروژه‌ی موفق در سازمان‌ها، شرکت‌ها و واحدهای صنعتی و تجاری، توانسته‌ایم اعتماد گسترده‌ای را به دست آوریم.
                </p>
                <p>
                    <span class="text-sky-400 text-2xl">02</span>
                    <br>
                    این مجموعه به عنوان نماینده و عاملیت رسمی دو برند بین‌المللی هایک‌ویژن (Hikvision) و داهوا (Dahua)، طیف کاملی از محصولات و راهکارهای حفاظتی را با اصالت کالا، قیمت رقابتی و خدمات پس از فروش واقعی ارائه می‌دهد.
                </p>
            </div>
            <img src="{{asset('assets/images/about-us-monitor.jpg')}}" alt="">
            <div>
                <p>
                    <span class="text-sky-400 text-2xl">03</span>
                    <br>
                    آنچه رایان نوین را متمایز می‌کند، تنها فروش تجهیزات نیست؛ بلکه ارائه‌ی مشاوره تخصصی، طراحی و اجرای راهکارهای جامع امنیتی و پشتیبانی مطمئن است. ما معتقدیم امنیت، یک خرید ساده نیست؛ بلکه سرمایه‌ای پایدار برای آینده‌ی سازمان‌ها و کسب‌وکارهاست.
                </p>
                <p>
                    <span class="text-sky-400 text-2xl">04</span>
                    <br>
                    انتخاب رایان نوین یعنی تکیه بر ۱۲ سال تجربه، اعتبار و تعهد؛ همراهی که می‌توانید با اطمینان برای سال‌ها روی آن حساب کنید
                </p>
            </div>
        </div>
    </div>
@endsection
