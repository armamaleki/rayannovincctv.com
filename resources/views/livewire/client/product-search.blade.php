<form
    wire:submit.prevent="search"
    class="w-80 relative">
    <label for="search" class="mb-2 sr-only">جستجو </label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <x-icons.magnifying-glass class="size-5 text-gray-400" />
        </div>
        <input
            wire:model.live.debounce.250ms="q"
            type="search"
            id="search"
               class="block w-full p-4 ps-10 text-sm outline-0 rounded-lg bg-gray-800 "
               placeholder="جستجو بین محصولات رایان نوین ..." required />
        <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-sky-400 hover:bg-sky-500 focus:ring-2 focus:outline-none focus:ring-sky-300 font-thin rounded-lg text-sm p-2">
            جستجو
        </button>
    </div>
    @if($this->products)
        <div class="bg-gray-800 absolute z-10 top-20 w-full rounded-md h-96 overflow-x-scroll">
            @foreach($this->products as $product)
                <div class="flex flex-col ">
                    <a
                        href="{{route('client.store.show' , $product)}}" class="w-full border-b border-dashed p-2">
                        {{$product->name}}
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</form>
