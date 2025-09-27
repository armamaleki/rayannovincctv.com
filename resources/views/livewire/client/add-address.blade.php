<div class="space-y-8">
    <div class="flex gap-2">
        <p class="font-bold">
            برای ارسال مرسوله ابتدا آدرس خود را اضافه کنید.
        </p>
        <button
            wire:click.prevent="create"
            wire:loading.class="cursor-wait"
            wire:loading.attr="disabled"
            class="text-sky-400 border-b flex gap-1 cursor-pointer ">
            <span>اضافه کردن آدرس</span>
            <x-icons.plus class="size-6"/>
        </button>
    </div>
    @if($showMode)
        <div class="space-y-4">
            <div class="md:flex md:items-center space-y-4 md:space-y-0 gap-4">
                <input
                    wire:model="province"
                    placeholder="استان خود را وارد کنید *"
                    class="bg-gray-600 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-0 block w-full p-2.5 @error('province') border-red-300 text-red-300 @enderror"
                    type="text">
                <input
                    wire:model="city"
                    placeholder="شهر خود را وارد کنید *"
                    class="bg-gray-600 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-0 block w-full p-2.5 @error('city') border-red-300 text-red-300 @enderror"
                    type="text">
            </div>
            <textarea
                rows="5"
                wire:model="address"
                placeholder="لطفا آدرس پستی خود را جهت ارسال محصول وارد کنید *"
                class="bg-gray-600 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-0 block w-full p-2.5 @error('address') border-red-300 text-red-300 @enderror"></textarea>
            <div class="md:flex md:items-center space-y-4 md:space-y-0 gap-4">
                <input
                    wire:model="no"
                    placeholder="پلاک *"
                    inputmode="numeric"
                    pattern="\d*"
                    class="bg-gray-600 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-0 block w-full p-2.5 @error('no') border-red-300 text-red-300 @enderror"
                    type="number">
                <input
                    wire:model="number"
                    placeholder="واحد *"
                    inputmode="numeric"
                    pattern="\d*"
                    class="bg-gray-600 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-0 block w-full p-2.5 @error('number') border-red-300 text-red-300 @enderror"
                    type="number">
            </div>
            <input
                wire:model="postal_code"
                placeholder="کد پستی *"
                inputmode="numeric"
                pattern="\d*"
                class="bg-gray-600 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-0 block w-full p-2.5 @error('postal_code') border-red-300 text-red-300 @enderror"
                type="number">
        </div>
        <div class="flex flex-col">
            <button
                wire:click.prevent="store"
                wire:loading.class="cursor-wait"
                wire:loading.attr="disabled"
                class=" bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 shadow-lg shadow-sky-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                ذخیره آدرس
            </button>

        </div>
    @endif
</div>
