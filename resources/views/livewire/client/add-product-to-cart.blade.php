<div>
    <form
        wire:submit.prevent="addProduct"
        class="md:flex md:gap-16 space-y-4 md:space-y-0 items-end ">
        <div>
            <label for="quantity-input" class=" mb-2 font-medium">
                تعداد
                <span  wire:loading wire:target="negative, positive">درحال انجام</span>
            </label>
            <div class="relative flex items-center max-w-24">
                <button type="button"
                        wire:click.prevent="negative"
                        wire:loading.attr="disabled"
                        id="decrement-button"
                        class="bg-sky-500 shadow shadow-sky-400  hover:bg-sky-600 rounded-s-lg p-3 h-11 focus:ring-sky-700  focus:ring-2 focus:outline-none">
                    <x-icons.negative class="size-3"/>
                </button>

                <input type="text" id="quantity-input"
                       wire:model="quantity"
                       inputmode="numeric"
                       pattern="\d*"
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                       class="bg-sky-500 shadow w-14 shadow-sky-400  hover:bg-sky-600  p-3 h-11 focus:ring-sky-700  focus:ring-2 focus:outline-none"
                       required/>

                <button
                    wire:click.prevent="positive"
                    wire:loading.attr="disabled"
                    type="button"
                    id="increment-button"
                    class="bg-sky-500 shadow shadow-sky-400  hover:bg-sky-600 rounded-e-lg p-3 h-11 focus:ring-sky-700  focus:ring-2 focus:outline-none">
                    <x-icons.positive class="size-3"/>
                </button>
            </div>
        </div>
        <button class=" flex gap-2 items-center bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300  shadow-lg shadow-cyan-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            <span>اضافه کردن به سبد خرید</span>
            <span wire:loading wire:target="addProduct">
            <svg class=" size-5 animate-spin " xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            </span>
        </button>
    </form>

</div>
