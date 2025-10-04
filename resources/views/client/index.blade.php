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
                    <p>SMART SOLUTIONS FOR <span class="text-yellow-400">YOUR SECURITY</span></p>
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
                    دوربین مداربسته
                    <br>
                    و
                    <br>
                    <div class="typewrite" data-period="2000"
                         data-type='[ "تجهیزات نظارتی"  , "سیستم های حفاظتی" ]'>
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
                <h3 class="text-2xl ">دوربین مداربسته برای امنیت شما</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dolorem exercitationem nostrum?
                    Ab
                    accusantium aspernatur beatae dolores ducimus ea eaque illo maiores nihil officia rem saepe sequi
                    soluta
                    velit, voluptate!
                </p>
            </div>
            <img
                class="shadow-lg shadow-sky-300 rounded-4xl"
                src="{{asset('assets/images/about-photo.png')}}" alt="">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                data-aos="fade-up"
                data-aos-delay="300"
                class="p-8 flex flex-col items-center bg-gray-700 rounded-xl">
                <span class="text-6xl">+15</span>
                سال تجربه
            </div>
            <div
                data-aos="fade-up"
                data-aos-delay="600"
                class="p-8 flex flex-col items-center bg-gray-700 rounded-xl">
                <span class="text-6xl">+15</span>
                پروژه انجام شده
            </div>
            <div
                data-aos="fade-up"
                data-aos-delay="700"
                class="p-8 flex flex-col items-center bg-gray-700 rounded-xl">
                <span class="text-6xl">+15</span>
                کارمند
            </div>
        </div>
    </section>
<x-client.last-products/>
    <section class="container mx-auto px-2 py-16 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center ">
            <div
                style="background-image: url('{{asset('assets/images/form-bg.jpg')}}')"
                class="bg-center bg-cover rounded-xl p-4 space-y-4 ">
                <div class="flex gap-2 items-center">
                    <x-ui.ping-dot />
                    <h2 class="ml1 text-xl font-bold">
                        <span class="letters">درخواست پروژه</span>
                    </h2>
                </div>
                <p class="text-justify">
                    Sed sed tortor lobortis, dictum lacus sed, mollis enim. Aenean ullamcorper accumsan sem sit amet
                    aliquam. Cras euismod mauris felis, eget bibendum nibh facilisis ac.
                </p>
                <div class="space-y-6">
                    <div class="flex items-center gap-2 ">
                        <span
                            class="flex items-center justify-center w-10 h-10 outline-4 rounded-full bg-sky-400 text-2xl font-bold text-white">
                            01
                        </span>
                        <p class="text-xl font-bold ">
                            ثبت فرم درخواست
                        </p>
                    </div>
                    <div class="flex items-center gap-2 ">
                        <span
                            class="flex items-center justify-center w-10 h-10 outline-4 rounded-full bg-sky-400 text-2xl font-bold text-white">
                            02
                        </span>
                        <p class="text-xl font-bold ">
                            ثبت فرم درخواست
                        </p>
                    </div>
                    <div class="flex items-center gap-2 ">
                        <span
                            class="flex items-center justify-center w-10 h-10 outline-4 rounded-full bg-sky-400 text-2xl font-bold text-white">
                            03
                        </span>
                        <p class="text-xl font-bold ">
                            ثبت فرم درخواست
                        </p>
                    </div>
                    <div class="flex items-center gap-2 ">
                        <span
                            class="flex items-center justify-center w-10 h-10 outline-4 rounded-full bg-sky-400 text-2xl font-bold text-white">
                            04
                        </span>
                        <p class="text-xl font-bold ">
                            ثبت فرم درخواست
                        </p>
                    </div>
                    <div class="flex items-center gap-2 ">
                        <span
                            class="flex items-center justify-center w-10 h-10 outline-4 rounded-full bg-sky-400 text-2xl font-bold text-white">
                            05
                        </span>
                        <p class="text-xl font-bold ">
                            ثبت فرم درخواست
                        </p>
                    </div>

                </div>
            </div>

            <div class="bg-gray-800 h-full p-4 rounded-xl shadow-lg shadow-sky-400">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab beatae dolores doloribus in nulla
                    voluptas. Delectus enim eum eveniet fuga incidunt. A aliquam exercitationem expedita ipsum
                    perferendis, rem sequi tenetur?
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                    <div>
                        <label for="input-group-1" class="block mb-2 text-sm font-medium">Your Email</label>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 20 16">
                                    <path
                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                    <path
                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="input-group-1"
                                class="bg-gray-700 border border-gray-100 text-sm rounded-lg outline-0  focus:border-sky-400  block w-full ps-10 p-2.5"
                                placeholder="نام و نام خوانداگی">
                        </div>
                    </div>
                    <div>
                        <label for="input-group-1" class="block mb-2 text-sm font-medium">Your Email</label>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 20 16">
                                    <path
                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                    <path
                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="input-group-1"
                                class="bg-gray-700 border border-gray-100 text-sm rounded-lg outline-0  focus:border-sky-400  block w-full ps-10 p-2.5"
                                placeholder="نام و نام خوانداگی">
                        </div>
                    </div>

                </div>
                <div>
                    <label for="input-group-1" class="block mb-2 text-sm font-medium">Your Email</label>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="input-group-1"
                            class="bg-gray-700 border border-gray-100 text-sm rounded-lg outline-0  focus:border-sky-400  block w-full ps-10 p-2.5"
                            placeholder="نام و نام خوانداگی">
                    </div>
                </div>
                <button type="button"
                        class="bg-gradient-to-r w-full from-sky-500 via-sky-600 to-sky-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300  shadow-lg shadow-sky-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                    ثبت درخواست
                </button>
            </div>

        </div>
    </section>

    <a href="tel:1245"
       class="container mx-auto px-2 py-16 space-y-1 flex flex-col items-center bg-gray-600 rounded-xl shadow-lg shadow-sky-400 relative">
        <x-icons.device-phone-mobile
            class="size-48 phone-shake absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-25" />

        <p class="text-2xl font-bold text-sky-400">درخواست رایگان مشاوره</p>
        <p class="text-3xl font-bold">09122454545</p>
    </a>
    <section
        style="background-image: url('{{asset('assets/images/shape/about-photo.png')}}')"
        class="container mx-auto px-2 my-16 py-16 bg-center bg-cover">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="overflow-hidden p-16">
                <swiper-container class="" effect="cards" grab-cursor="true">
                    <swiper-slide
                        class=" shadow-lg shadow-sky-400 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-400 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-400">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>محمد ملکی</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aspernatur assumenda, atque
                            corporis deleniti deserunt dolorem excepturi illo ipsa iure, labore magni mollitia obcaecati
                            placeat qui repellendus sequi veniam voluptates.
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-400 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-400 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-400">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>محمد ملکی</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aspernatur assumenda, atque
                            corporis deleniti deserunt dolorem excepturi illo ipsa iure, labore magni mollitia obcaecati
                            placeat qui repellendus sequi veniam voluptates.
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-400 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-400 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-400">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>محمد ملکی</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aspernatur assumenda, atque
                            corporis deleniti deserunt dolorem excepturi illo ipsa iure, labore magni mollitia obcaecati
                            placeat qui repellendus sequi veniam voluptates.
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-400 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-400 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-400">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>محمد ملکی</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aspernatur assumenda, atque
                            corporis deleniti deserunt dolorem excepturi illo ipsa iure, labore magni mollitia obcaecati
                            placeat qui repellendus sequi veniam voluptates.
                        </p>
                    </swiper-slide>
                    <swiper-slide
                        class=" shadow-lg shadow-sky-400 p-4 rounded-lg backdrop-blur-xl outline-1 outline-sky-400 text-center space-y-4">
                        <div
                            class=" mx-auto p-1 outline-4 rounded-full flex flex-col items-center bg-gray-600 w-16 h-16 outline-sky-400">
                            <x-icons.user class="size-12" />
                        </div>
                        <h4>محمد ملکی</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aspernatur assumenda, atque
                            corporis deleniti deserunt dolorem excepturi illo ipsa iure, labore magni mollitia obcaecati
                            placeat qui repellendus sequi veniam voluptates.
                        </p>
                    </swiper-slide>
                </swiper-container>
            </div>
            <div class="p-2 rounded-xl backdrop-blur shadow-md shadow-sky-400 space-y-4 ">
                <h2 class="text-2xl font-bold">در مورد رایان نوین چه میشنویم؟</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur corporis cum
                    explicabo
                    fugiat ipsa ipsum magni molestias nihil nobis praesentium rerum, sed tempore ut vel velit voluptate?
                    Aliquam, animi!
                </p>
            </div>
        </div>
    </section>
    <x-client.last-articles/>

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
