<div class=" hidden md:block backdrop-blur p-2 sticky z-40 top-0">
    <div class="container mx-auto">
        <div class=" flex flex-wrap gap-3 items-center">
            <a href="/">
                <img src="{{asset('assets/images/logo-n.png')}}" alt="رایان نوین">
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == '/' ? 'border-b text-sky-500' :'' }} "
                href="{{route('client.home')}}">
                <x-icons.home />
                رایان نوین
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'store' ? 'border-b text-sky-500' :'' }} "
                href="{{route('client.store.index')}}">
                <x-icons.building-storefront />
                فروشگاه
            </a>
            <li>
                <div x-data="{ open: false }" @mouseleave="open = false">
                    <button class="flex gap-2 font-bold text-lg items-center" @mouseover="open = true">
                        کارب
                        <x-icons.chevron-down :class="open ? '' : 'hidden'"  class="size-6"/>
                        <x-icons.chevron-down :class="open ? '' : 'hidden'"  class="size-6"/>
                        <x-icons.chevron-down :class="open ? '' : 'hidden'"  class="size-6"/>
                        <x-icons.chevron-down :class="open ? '' : 'hidden'"  class="size-6"/>
                    </button>
                    <div class="absolute top-8 pt-8 w-80"
                         x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-90"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-90"
                         style="display: none;">
                        <div class="bg-gradient-to-tl from-gray-800/90 to-gray-600 border rounded-tl-4xl rounded-br-4xl p-4">
                            <ul class="space-y-2">
                                <li>
                                    <a class="flex gap-2 items-center" href="https://bariz.tech/fa/web-trick">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"></path>
                                        </svg>
                                        ترفند های وب
                                    </a>
                                </li>
                                <li>
                                    <a class="flex gap-2 items-center" href="https://bariz.tech/fa/courses">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"></path>
                                        </svg>
                                        دوره ها
                                    </a>
                                </li>
                                <li>
                                    <a class="flex gap-2 items-center" href="https://bariz.tech/fa/articles">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"></path>
                                        </svg>
                                        مقالات
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </li>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'articles' ? 'border-b text-sky-500' :'' }} "
                href="{{route('client.articles.index')}}">
                <x-icons.pencil-square />
                مقالات
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'disk-calculator' ? 'border-b text-sky-500' :'' }} "
                href="{{route('client.calculator')}}">
                <x-icons.pencil-square />
                محاسبه فضای هارد دوربین
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'about-us' ? 'border-b text-sky-500' :'' }} "
                href="{{route('client.about-us')}}">
                <x-icons.user-group />
                درباره ما
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'contact-us' ? 'border-b text-sky-500' :'' }} "
                href="{{route('client.contact-us')}}">
                <x-icons.phone />
                تماس با ما
            </a>
            @if(auth()->check() )
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'dashboard' ? 'border-b text-sky-500' :'' }} "
                    href="{{route('dashboard.index')}}">
                    <x-icons.arrow-left-end-on-rectangle />
                    حساب کاربری
                </a>
            @else
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300"
                    href="{{route('login')}}">
                    <x-icons.arrow-left-end-on-rectangle />
                    ورود|ثبت نام
                </a>
            @endif
            <livewire:client.product-search />
        </div>
    </div>
</div>


<div
    class="flex justify-around items-center divide-x  md:hidden fixed z-40 bottom-0 w-full  bg-gray-800 rounded-t-xl p-2 shadow shadow-sky-400 ">
    <div x-data="{ open: false }">
        <button
            class="flex flex-col items-center text-center font-thin text-sm p-2 text-[10px] w-full"
            @click="open = ! open">
            <x-icons.text-align-justify class="size-8" />
            منو
        </button>
        <div
            class="fixed top-2 right-2 h-3/4 w-80 rounded-lg shadow shadow-sky-400 backdrop-blur-3xl p-4 overflow-hidden space-y-4 z-40"
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">
            @if(auth()->check() )
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'dashboard' ? 'border-b text-sky-500' :'' }} "
                    href="{{route('dashboard.index')}}">
                    <x-icons.arrow-left-end-on-rectangle />
                    حساب کاربری
                </a>
            @else
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300"
                    href="{{route('login')}}">
                    <x-icons.arrow-left-end-on-rectangle />
                    ورود|ثبت نام
                </a>
            @endif
            <div class="space-y-2">
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == '/' ? 'border-b text-sky-500' :'' }} "
                    href="{{route('client.home')}}">
                    <x-icons.home />
                    رایان نوین
                </a>
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'store' ? 'border-b text-sky-500' :'' }} "
                    href="{{route('client.store.index')}}">
                    <x-icons.building-storefront />
                    فروشگاه
                </a>
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'articles' ? 'border-b text-sky-500' :'' }} "
                    href="{{route('client.articles.index')}}">
                    <x-icons.pencil-square />
                    مقالات
                </a>
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'disk-calculator' ? 'border-b text-sky-500' :'' }} "
                    href="{{route('client.calculator')}}">
                    <x-icons.pencil-square />
                    محاسبه فضای هارد دوربین
                </a>
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'about-us' ? 'border-b text-sky-500' :'' }} "
                    href="{{route('client.about-us')}}">
                    <x-icons.user-group />
                    درباره ما
                </a>
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'contact-us' ? 'border-b text-sky-500' :'' }} "
                    href="{{route('client.contact-us')}}">
                    <x-icons.phone />
                    تماس با ما
                </a>
            </div>
            <div class="h-80 border-t border-dashed space-y-4 overflow-auto p-2">
                @for($i =0 ;$i < 10;$i ++ )
                <a
                    class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 "
                    href="#">
                    <x-icons.cctv />
                    دسته بندی شماره یک
                </a>
                @endfor
            </div>
        </div>
    </div>
    <a
        class="flex flex-col items-center text-center font-thin text-sm p-2 text-[10px] w-full"
        href="/">
        <x-icons.home class="size-9" />
        رایان نوین
    </a>
    <a
        class="flex flex-col items-center text-center font-thin text-sm p-2 text-[10px] w-full"
        href="{{route('client.store.index')}}">
        <x-icons.building-storefront class="size-9" />
        فروشگاه
    </a>
    <a
        class="flex flex-col items-center text-center font-thin text-sm p-2 text-[10px] w-full"
        href="/">
        <x-icons.shopping-cart class="size-9" />
        سبد خرید
    </a>
    <a
        class="flex flex-col items-center text-center font-thin text-sm p-2 text-[10px] w-full"
        href="{{route('dashboard.index')}}">
        <x-icons.user class="size-9" />
        حساب کاربری
    </a>


</div>
