@extends('components.layouts.app.index')
@section('meta')
    <title>تماس رایان نوین</title>
    <meta name="description" content="تماس رایان نوین">
@endsection
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'تماس با ما',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="درباره ما" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            <div class="space-y-4">
                <p>
                    در رایان نوین، ارتباط با شما تنها یک پل نیست؛ بخشی از استانداردی است که برای همکاری پایدار تعریف کرده‌ایم.
                    <br>
                    برای دریافت مشاوره اختصاصی، پیگیری امور و همکاری‌های آینده، می‌توانید از مسیرهای زیر با ما در تماس باشید:
                </p>
                <div class="space-y-2">
                    <a href="tel:09129494234" class="flex gap-1 items-center">
                        <x-icons.phone />
                        09129494234
                    </a>
                    <a href="tel:09902706257" class="flex gap-1 items-center">
                        <x-icons.phone />
                        09902706257
                    </a>
                    <a href="mailto:info@rayammovincctv.com" class="flex gap-1 items-center">
                        <x-icons.envelope />
                        info@rayammovincctv.com
                    </a>
                    <div class="flex gap-1 items-center">
                        <x-icons.map />
                        تهران خیابان جمهوری تقاطع شیخ هادی پاساژ پاساژ یگانه طبقه دوم
                    </div>
                </div>
                <span class="font-bold">ساعات پاسخگویی:</span>
                <br>
                <span class="font-bold">شنبه تا چهارشنبه، ساعت</span> ۹:۰۰ الی ۱۸:۰۰
                <span class="font-bold">پنجشنبه‌ها، ساعت</span> ۹:۰۰ الی ۱۴:۰۰
<p>                 جایی که ارتباط، به تجربه‌ای حرفه‌ای تبدیل میشود.</p>

            </div>
            <div>
                <iframe
                    class="w-full h-96 rounded-xl shadow-lg shadow-sky-400"
                    src="https://balad.ir/embed?p=PRdqBp3eMUGgpo" title="مشاهده «بورس ساعت» روی نقشه بلد"
                        frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
@endsection
