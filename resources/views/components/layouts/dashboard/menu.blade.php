<div x-data="{ open: false }">
    <button
        class="fixed bottom-30 md:bottom-10 left-10 p-1 rounded-md shadow shadow-sky-400"
        @click="open = ! open">
        <x-icons.adjustments-horizontal/>
    </button>
    <div
        class="absolute top-5 right-5 w-70 bg-gray-800 rounded-lg shadow-lg shadow-sky-400 z-40 p-4 flex flex-col space-y-4"
        x-show="open" x-transition>
        <a
            class="flex gap-1 items-center border-b p-1 border-dotted"
            href="{{route('dashboard.index')}}">
            <x-icons.home/>
            حساب کاربری
        </a>
        <a
            class="flex gap-1 items-center border-b p-1 border-dotted"
            href="">
            <x-icons.home/>
            اطلاعات حساب کاربری
        </a>
        <a
            class="flex gap-1 items-center border-b p-1 border-dotted"
            href="{{route('dashboard.orders')}}">
            <x-icons.home/>
            سفارش ها
        </a>
        <a
            class="flex gap-1 items-center border-b p-1 border-dotted"
            href="{{route('dashboard.transactions')}}">
            <x-icons.home/>
            وضعیت پرداختی ها
        </a>
        <livewire:auth.logout/>
    </div>
</div>
