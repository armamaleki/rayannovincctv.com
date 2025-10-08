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
                برای راه‌اندازی سیستم حفاظتی، دوربین مدار بسته یا دزدگیر شبکه، کافیست نام و شماره تلفن خود را ارسال
                کنید تا کارشناسان ما با شما تماس بگیرند و بهترین راهکار را ارائه دهند.
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
                        تماس کارشناس مربوطه
                    </p>
                </div>
                <div class="flex items-center gap-2 ">
                        <span
                            class="flex items-center justify-center w-10 h-10 outline-4 rounded-full bg-sky-400 text-2xl font-bold text-white">
                            03
                        </span>
                    <p class="text-xl font-bold ">
                        براورد هزینه پروژه
                    </p>
                </div>
                <div class="flex items-center gap-2 ">
                        <span
                            class="flex items-center justify-center w-10 h-10 outline-4 rounded-full bg-sky-400 text-2xl font-bold text-white">
                            04
                        </span>
                    <p class="text-xl font-bold ">
                        اعلام هزینه به کاربر
                    </p>
                </div>
                <div class="flex items-center gap-2 ">
                        <span
                            class="flex items-center justify-center w-10 h-10 outline-4 rounded-full bg-sky-400 text-2xl font-bold text-white">
                            05
                        </span>
                    <p class="text-xl font-bold ">
                        انجام پروژه
                    </p>
                </div>

            </div>
        </div>

        <form
            wire:submit.prevent="store"
            class="bg-gray-800 h-full p-4 rounded-xl shadow-lg shadow-sky-400">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                <div>
                    <label for="input-group-1" class="block mb-2 text-sm font-medium">
                        نام و نام خانوادگی
                        @error('name') <span class="text-red-400">{{$message}}</span>@enderror
                    </label>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="input-group-1"
                            wire:model="name"
                            class="bg-gray-700 border border-gray-100 text-sm rounded-lg outline-0  focus:border-sky-400  block w-full ps-10 p-2.5"
                            placeholder="آرما....">
                    </div>
                </div>
                <div>
                    <label for="input-group-1" class="block mb-2 text-sm font-medium">
                        شماره تلفن همراه
                        @error('phone') <span class="text-red-400">{{$message}}</span>@enderror
                    </label>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>

                        </div>
                        <input
                            type="text"
                            id="input-group-1"
                            wire:model="phone"
                            class="bg-gray-700 border border-gray-100 text-sm rounded-lg outline-0  focus:border-sky-400  block w-full ps-10 p-2.5"
                            placeholder="091211111">
                    </div>
                </div>

            </div>
            <div>
                <label for="input-group-1" class="block mb-2 text-sm font-medium">
                    پروژه خود را به طور خلاصه برای ما شرح دهید
                    @error('description') <span class="text-red-400">{{$message}}</span>@enderror
                </label>
                <div class="relative mb-6">
                    <div class="absolute inset-y-10  start-0 flex items-center ps-3.5 pointer-events-none">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>

                    </div>
                    <textarea
                        wire:model="description"
                        id=""
                        class="bg-gray-700 border border-gray-100 text-sm rounded-lg outline-0  focus:border-sky-400  block w-full ps-10 p-2.5"
                        rows="10"
                    placeholder="لطفا پروژه خود را در چند سطر به طور خلاصه برای کارشناسان ما شرح دهید تا مشاوره ما دقیق تر باشد."></textarea>
                </div>
            </div>
            <button type="submit"
                    class="bg-gradient-to-r w-full from-sky-500 via-sky-600 to-sky-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300  shadow-lg shadow-sky-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">

                <span wire:loading.remove>ثبت درخواست</span>
                <span wire:loading>
                    کمی صبر کنید....
                </span>
            </button>
        </form>

    </div>
</section>
