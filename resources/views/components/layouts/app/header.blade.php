<div class=" hidden md:block backdrop-blur p-2 sticky z-40 top-0">
    <div class="container mx-auto">
        <div class=" flex flex-wrap gap-3 items-center">
            <a href="/">
                <img src="{{asset('assets/images/logo-80.png')}}" alt="رایان نوین">
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
    </div>
</div>


<div
    class="flex justify-around items- center divide-x  md:hidden fixed bottom-0 w-full  bg-gray-800 rounded-t-xl p-2 shadow shadow-sky-400 ">
    <a
        class="flex flex-col items-center text-center font-thin text-sm p-2 text-[10px] w-full"
        href="/">
        <x-icons.home class="size-9" />
        رایان نوین
    </a>
    <a
        class="flex flex-col items-center text-center font-thin text-sm p-2 text-[10px] w-full"
        href="{{route('client.store.index')}}">
        <x-icons.building-storefront  class="size-9"/>
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
        href="/">
        <x-icons.user class="size-9" />
        حساب کاربری
    </a>



</div>
