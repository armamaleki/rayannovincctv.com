<div class="divide-y divide-gray-200">
    @if($registerForm)
        <form
            wire:submit="register"
            class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="relative">
                <input
                    id="phone"
                    wire:model="phone"
                    type="text"
                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                    placeholder="0912...."
                    pattern="\d*"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    autofocus autocomplete required />
                <label for="phone"
                       class="absolute right-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                    تلفن همراه

                </label>
            </div>
            <div class="relative">
                <button
                    wire:loading.attr="disabled"
                    class="bg-cyan-500 text-white rounded-md px-2 py-1 flex items-center">ارسال کد ورود
                    <span wire:loading>
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                </button>
            </div>
        </form>
    @endif
    @if($loginForm)
        <form
            wire:submit="login"
            class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="relative">
                <input
                    id="code"
                    wire:model="code"
                    type="text"
                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                    placeholder="12345"
                    inputmode="numeric"
                    pattern="\d*"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    autofocus autocomplete required />
                <label for="code"
                       class="absolute right-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                    کد ورود
                </label>
            </div>
            <div class="relative">
                <button
                    wire:loading.attr="disabled"
                    class="bg-cyan-500 text-white rounded-md px-2 py-1 flex items-center">ورود
                    <span wire:loading>
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                </button>
            </div>
        </form>
    @endif
    @error('phone') <span class="text-red-400 font-thin">{{$message}}</span>@enderror
    @error('code') <span class="text-red-400 font-thin">{{$message}}</span>@enderror

    <script>
        document.addEventListener('autofocus', () => {
            setTimeout(() => {
                document.getElementById('code').focus();
            }, 50);
        });
    </script>
</div>
