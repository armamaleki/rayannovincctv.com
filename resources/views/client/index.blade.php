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
        <a href="https://rayannovincctv.com/store" class="flex flex-col items-center space-y-2 h-full">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                 class="size-20 text-sky-500" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M3 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"></path>
                <path
                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8.5v3a1.5 1.5 0 0 1 1.5 1.5h5.5a.5.5 0 0 1 0 1H10A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5H.5a.5.5 0 0 1 0-1H6A1.5 1.5 0 0 1 7.5 10V7H2a2 2 0 0 1-2-2zm1 0v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1m6 7.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5"></path>
            </svg>
            <h2 class="font-bold text-xl">سوئیچ</h2>
        </a>
        <a href="https://rayannovincctv.com/store" class="flex flex-col items-center space-y-2 h-full">
            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                 stroke-linejoin="round" class="size-20 text-sky-500" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.75 12h3.632a1 1 0 0 1 .894 1.447l-2.034 4.069a1 1 0 0 1-1.708.134l-2.124-2.97"></path>
                <path
                    d="M17.106 9.053a1 1 0 0 1 .447 1.341l-3.106 6.211a1 1 0 0 1-1.342.447L3.61 12.3a2.92 2.92 0 0 1-1.3-3.91L3.69 5.6a2.92 2.92 0 0 1 3.92-1.3z"></path>
                <path d="M2 19h3.76a2 2 0 0 0 1.8-1.1L9 15"></path>
                <path d="M2 21v-4"></path>
                <path d="M7 9h.01"></path>
            </svg>
            <h2 class="font-bold text-xl">دوربین مداربسته</h2>
        </a>
        <a href="https://rayannovincctv.com/store" class="flex flex-col items-center space-y-2 h-full">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                 class="size-20 text-sky-500" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-7.5.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M5 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                <path
                    d="M12 7a4 4 0 0 1-3.937 4c-.537.813-1.02 1.515-1.181 1.677a1.102 1.102 0 0 1-1.56-1.559c.1-.098.396-.314.795-.588A4 4 0 0 1 8 3a4 4 0 0 1 4 4m-1 0a3 3 0 1 0-3.891 2.865c.667-.44 1.396-.91 1.955-1.268.224-.144.483.115.34.34l-.62.96A3 3 0 0 0 11 7"></path>
                <path
                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
            </svg>
            <h2 class="font-bold text-xl">هارد</h2>

        </a>
        <a href="https://rayannovincctv.com/store" class="flex flex-col items-center space-y-2 h-full">
            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                 stroke-linejoin="round" class="size-20 text-sky-500" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 21v-2a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1"></path>
                <path d="M19 15V6.5a1 1 0 0 0-7 0v11a1 1 0 0 1-7 0V9"></path>
                <path d="M21 21v-2h-4"></path>
                <path d="M3 5h4V3"></path>
                <path d="M7 5a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a1 1 0 0 1 1-1V3"></path>
            </svg>
            <h2 class="font-bold text-xl">لوازم جانبی</h2>
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
