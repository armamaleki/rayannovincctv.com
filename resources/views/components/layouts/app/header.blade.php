<div class=" hidden md:block backdrop-blur p-2 sticky z-40 top-0">
    <div class="container mx-auto">
        <div class=" flex flex-wrap gap-3 items-center">
            <img src="{{asset('assets/images/logo-80.png')}}" alt="رایان نوین">
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == '/' ? 'border-b text-sky-500' :'' }} "
                href="{{route('client.home')}}">
                <x-icons.home/>
                رایان نوین
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == '/' ? 'border-b text-sky-500' :'' }} "
                href="#">
                <x-icons.building-storefront />
                فروشگاه
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == '/' ? 'border-b text-sky-500' :'' }} "
                href="#">
                <x-icons.pencil-square/>
                مقالات
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == 'about-us' ? 'border-b text-sky-500' :'' }} "
                href="{{route('client.about-us')}}">
                <x-icons.user-group/>
                درباره ما
            </a>
            <a
                class="flex gap-1 items-center font-bold text-lg hover:border-b hover:text-sky-500 transition-all delay-150 duration-300 {{request()->path() == '/' ? 'border-b text-sky-500' :'' }} "
                href="#">
                <x-icons.phone/>
                تماس با ما
            </a>
        </div>
    </div>
</div>
