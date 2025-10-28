@extends('components.layouts.app.index')
@section('meta')
    <title>فروشگاه اینترنتی رایان نوین</title>
    <meta name="description" content="فروشگاه اینترنتی رایان نوین">
@endsection
@section('content')
    @php
        $images = [
            '/assets/images/SLIDE_01.jpg',
            '/assets/images/SLIDE_02.jpg',
            '/assets/images/SLIDE_03.jpg',
        ];
    @endphp
    <div id="slider" class="relative w-full h-screen overflow-hidden bg-black">
        <div class="absolute z-20 top-0 left-0 w-full h-full bg-sky-400/20 "></div>
        <div class="absolute inset-0 flex">
            <div class="flex-1 border-l border-white/30 animate-pulse"></div>
            <div class="flex-1 border-l border-white/30 animate-pulse"></div>
            <div class="flex-1 border-l border-white/30 animate-pulse"></div>
            <div class="flex-1 border-l border-white/30 animate-pulse"></div>
        </div>
        @foreach ($images as $index => $img)
            <div class="slide absolute inset-0 transition-all duration-[5000ms] ease-linear
                {{ $index === 0 ? 'opacity-50 scale-100 z-10' : 'opacity-0 scale-110 z-0' }}">
                <img src="{{ $img }}"
                     alt="slide-{{ $index }}"
                     class="w-full h-full object-cover transform origin-center">
            </div>
        @endforeach
        <div class="container mx-auto relative h-screen p-2 flex flex-col items-center justify-center">
            <div class="absolute left-10 transform z-20 top-4/5">
                <div
                    class="-rotate-90 origin-left text-white font-bold text-sm tracking-widest pl-6 flex items-center gap-2">
                    <p>SMART SOLUTIONS FOR <span class="text-sky-400">YOUR SECURITY</span></p>
                    <span class="p-1 rounded-full bg-gray-50 h-fit w-25"></span>
                </div>
            </div>
            <div class="absolute right-10 transform z-20 1/2 flex flex-col items-center space-y-4">
                <x-icons.chat-bubble-oval-left class="size-6  stroke-sky-400 animate-pulse" />
                <x-icons.chat-bubble-oval-left class="size-6  stroke-sky-400 animate-pulse" />
                <x-icons.chat-bubble-oval-left class="size-6  stroke-sky-400 animate-pulse" />
                <x-icons.chat-bubble-oval-left class="size-6  stroke-sky-400 animate-pulse" />
                <x-icons.chat-bubble-oval-left class="size-6 stroke-sky-400 animate-pulse" />
            </div>
            <div class="z-30 absolut ">
                <h1 class="text-4xl md:text-6xl   font-bold text-center">
                    عاملیت محصولات
                    <br>

                    <br>
                    <div class="typewrite" data-period="2000"
                         data-type='[ "سیستم های حفاظتی"  , "پایش تصویری" ]'>
                        <h1 class="wrap"></h1>
                    </div>
                </h1>

            </div>
        </div>
    </div>
    <div
        class="container mx-auto p-8 rounded-xl grid grid-cols-1 md:grid-cols-2 md:divide-x-2 divide-y-2 md:divide-y-0 divide-dashed divide-sky-200 lg:grid-cols-4 gap-4 items-center bg-gray-800 -mt-10 relative z-30 shadow-lg shadow-sky-500">
        <a href="#" class="flex flex-col items-center space-y-2 h-full">
            <img src="{{asset('assets/images/shape/top-icon-1.png')}}" alt="">
            <h2 class="font-bold text-xl">ایفون تصویری</h2>
        </a>
        <a href="#" class="flex flex-col items-center space-y-2 h-full">
            <img src="{{asset('assets/images/shape/top-icon-2.png')}}" alt="">
            <h2 class="font-bold text-xl">ایفون تصویری</h2>

        </a>
        <a href="#" class="flex flex-col items-center space-y-2 h-full">
            <img src="{{asset('assets/images/shape/top-icon-3.png')}}" alt="">
            <h2 class="font-bold text-xl">ایفون تصویری</h2>

        </a>
        <a href="#" class="flex flex-col items-center space-y-2 h-full">
            <img src="{{asset('assets/images/shape/top-icon-4.png')}}" alt="">
            <h2 class="font-bold text-xl">ایفون تصویری</h2>
        </a>
    </div>
    <section class="container mx-auto px-2 py-16 space-y-8">
        <div class=" grid grid-cols-1 md:grid-cols-2 items-center">
            <div class="space-y-4">
                <div class="flex gap-2 items-center">
                    <x-ui.ping-dot />
                    <h2 class="ml1 text-xl font-bold">
                        <span class="letters">درباره رایان نوین</span>
                    </h2>
                </div>
                <p>
                    رایان نوین با بیش از ۱۲ سال سابقه‌ی فعالیت تخصصی در حوزه‌ی سیستم‌های امنیتی و نظارت تصویری، امروز
                    یکی از مجموعه‌های معتبر و خوش‌نام در این صنعت است. در طول این سال‌ها، با اجرای صدها پروژه‌ی موفق در
                    سازمان‌ها، شرکت‌ها و واحدهای صنعتی و تجاری، توانسته‌ایم اعتماد گسترده‌ای را به دست آوریم.
                </p>
            </div>
            <div class="relative">
                <div class="flex justify-end ">
                    <div class="image-anime w-fit">
                        <img
                            class="rounded-xl self-center  "
                            src="{{asset('assets/images/about-img-1.jpg')}}" alt="">
                    </div>
                </div>
                <img
                    class="z-40 absolute top-1/2 left-1/2 -mt-4 md:-mt-0 transform -translate-x-1/2 -translate-y-1/2 rotate360 drop-shadow-md drop-shadow-sky-500"
                    src="{{asset('assets/images/shape/experience-circle.png')}}" alt="">
                <div class="md:-mt-40 mt-2">
                    <div class="image-anime w-fit">

                        <img
                            class="rounded-xl "
                            src="{{asset('assets/images/about-img-2.jpg')}}" alt="">
                    </div>
                </div>

            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                data-aos="fade-up"
                data-aos-delay="300"
                class="p-8 flex flex-col items-center bg-gray-700 rounded-xl">
                <span class="text-6xl">+25</span>
                سال تجربه
            </div>
            <div
                data-aos="fade-up"
                data-aos-delay="600"
                class="p-8 flex flex-col items-center bg-gray-700 rounded-xl">
                <span class="text-6xl">+1400</span>
                پروژه انجام شده
            </div>
            <div
                data-aos="fade-up"
                data-aos-delay="700"
                class="p-8 flex flex-col items-center bg-gray-700 rounded-xl">
                <span class="text-6xl">+4</span>
                کارمند
            </div>
        </div>
    </section>
    <x-client.last-products />
    <livewire:client.request-project />

    <a href="tel:09129494234"
       class="container mx-auto px-2 py-16 space-y-1 flex flex-col items-center bg-gray-600 rounded-xl shadow-lg shadow-sky-400 relative">
        <x-icons.device-phone-mobile
            class="size-48 phone-shake absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-25" />

        <p class="text-2xl font-bold text-sky-400">درخواست رایگان مشاوره</p>
        <p class="text-3xl font-bold">09129494234</p>
        <br>
        <p class="text-3xl font-bold">09902706257</p>
    </a>
    <section
        style="background-image: url('{{asset('assets/images/shape/about-photo.png')}}')"
        class="container mx-auto px-2 my-16 py-16 bg-center bg-cover">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="overflow-hidden p-16">
                <swiper-container class="" effect="cards" grab-cursor="true">
                    <swiper-slide
                        class=" shadow-lg shadow-sky-200 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-200 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-200">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>علی محمدی</h4>
                        <p>
                            نصب دوربین‌های مدار بسته توسط تیم رایان نوین واقعاً حرفه‌ای بود. از لحظه مشاوره تا اجرای
                            نهایی، همه چیز دقیق و منظم انجام شد. سیستم دوربین‌ها بسیار با کیفیت و قابل اعتماد است و باعث
                            شده احساس امنیت بیشتری در محل کارم داشته باشم. واقعاً خوشحالم که با یک تیم حرفه‌ای کار کردم
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-300 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-300 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-300">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>سارا حسینی</h4>
                        <p>
                            تیم رایان نوین دزدگیر شبکه دفتر کارمان را نصب کردند و تجربه‌ای فراتر از انتظار داشتیم. از
                            مشاوره اولیه تا راه‌اندازی سیستم، همه مراحل با دقت و صبر انجام شد. حالا مطمئن هستیم که
                            اطلاعات و دارایی‌هایمان تحت حفاظت کامل قرار دارند. واقعاً به تخصص این تیم اعتماد دارم.
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-400 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-400 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-400">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>رضا کاظمی</h4>
                        <p>
                            پشتیبانی و مشاوره رایان نوین بی‌نظیر است. قبل از شروع پروژه، نیازهای ما را به دقت بررسی
                            کردند و بهترین راهکار را پیشنهاد دادند. نصب سیستم‌های حفاظتی دقیقاً طبق برنامه انجام شد و
                            بدون هیچ مشکلی تحویل داده شد. از تجربه همکاری با چنین تیم حرفه‌ای کاملاً راضی هستم.
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-500 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-500 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-500">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>نرگس صادقی</h4>
                        <p>
                            من همیشه در انتخاب شرکت‌های خدماتی سخت‌گیر هستم، اما رایان نوین اعتمادم را جلب کرد. تیم
                            پشتیبانی با حوصله تمام سوالات من را پاسخ داد و حتی پس از نصب سیستم‌ها، همراه و پاسخگو بودند.
                            این سطح از پشتیبانی و مسئولیت‌پذیری واقعاً ارزشمند است.
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-600 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-600 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-600">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>محمدرضا ایزدی</h4>
                        <p>
                            سیستم‌های حفاظتی رایان نوین فوق‌العاده دقیق و قابل اطمینان هستند. نصب و راه‌اندازی کاملاً
                            حرفه‌ای انجام شد و آموزش‌های لازم هم داده شد. حس امنیتی که الان دارم، واقعاً ارزش
                            سرمایه‌گذاری را داشته است. پیشنهاد می‌کنم هر کسی که به دنبال امنیت واقعی است، حتماً با این
                            تیم همکاری کند.
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-700 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-700 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-700">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>مریم فتحی</h4>
                        <p>
                            تجربه‌ای امن، راحت و حرفه‌ای با رایان نوین داشتم. از اولین تماس تا تحویل پروژه، همه چیز به
                            صورت کاملاً منظم و شفاف انجام شد. کیفیت خدمات و سرعت اجرای پروژه عالی بود و تیم واقعاً به
                            نیازهای مشتری اهمیت می‌دهد. خوشحالم که با یک تیم متخصص کار کردم
                        </p>
                    </swiper-slide>
                </swiper-container>
            </div>
            <div class="p-2 rounded-xl backdrop-blur shadow-md shadow-sky-400 space-y-4 ">
                <h2 class="text-2xl font-bold">در مورد رایان نوین چه میشنویم؟</h2>
                <p>
                    مشتریان ما بهترین گواه کیفیت خدمات ما هستند. ببینید چگونه سیستم‌های حفاظتی، دوربین مدار بسته و
                    دزدگیر شبکه ما امنیت محل کار و منزل آنها را تضمین کرده است. نظرات واقعی کاربران، نشان از اعتماد و
                    رضایت بالای مشتریان رایان نوین دارد.
                </p>
            </div>
        </div>
    </section>
    <x-client.last-articles />

@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('#slider .slide');
            let current = 0;
            setInterval(() => {
                slides[current].classList.remove('opacity-50', 'scale-100', 'z-10');
                slides[current].classList.add('opacity-0', 'scale-110', 'z-0');
                current = (current + 1) % slides.length;
                slides[current].classList.remove('opacity-0', 'scale-110', 'z-0');
                slides[current].classList.add('opacity-50', 'scale-100', 'z-10');
            }, 6000);
        });
    </script>
    <script src="{{asset('assets/plugins/swiper-element-bundle.min.js')}}"></script>

@endpush
