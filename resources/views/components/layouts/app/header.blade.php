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
            class="fixed top-2 right-2 h-3/4 w-80 rounded-lg shadow shadow-sky-400 backdrop-blur-3xl p-4 overflow-hidden space-y-4"
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
