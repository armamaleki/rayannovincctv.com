@extends('components.layouts.app.index')
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'فروشگاه',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="فروشگاه راین نوین" :breads="$breads" />
    <div class="space-y-4 md:my-16  container mx-auto p-2">

        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 ">
            <div
                class="border hidden md:block border-gray-400 rounded-xl bg-gray-800 h-fit p-3 shadow-lg shadow-sky-400">
                <p class="text-2xl font-bold mb-3">
                    فیلتر ها
                </p>
                @foreach($attributes as $attribute)
                    <div class="mb-4">
                        <p class="text-lg font-semibold text-white mb-2">{{ $attribute->name }}</p>
                        @foreach($attribute->values as $value)
                            @php
                                $query = request()->query();
                                $query[$attribute->name] = $value->value;
                                $url = route('client.store.index', $query);
                                $isActive = request($attribute->name) == $value->value;
                            @endphp
                            <a href="{{ $url }}"
                               class="inline-block px-3 py-1 rounded-lg mr-2 mb-2 transition
                                       {{ $isActive ? 'bg-sky-500 text-white' : 'bg-gray-700 text-gray-300 hover:bg-sky-500 hover:text-white' }}">
                                {{ $value->value }}
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="col-span-1 md:col-span-3 lg:col-span-4 space-y-4">
                <div class="border-y p-2  gap-1 items-center flex overflow-x-scroll">
                    <p class="hidden md:block">مرتب سازی بر اساس:</p>
                    @php
                        $query = request()->query();
                    @endphp
                    @php $query['sort'] = 'latest'; @endphp
                    <a href="{{ route('client.store.index', $query) }}"
                       class="flex text-nowrap gap-2 items-center {{ request('sort') == 'latest' ? 'text-sky-500 font-bold' : '' }}">
                        <x-icons.bars-arrow-down />
                        جدیدترین
                    </a>
                    @php $query['sort'] = 'price_desc'; @endphp
                    <a href="{{ route('client.store.index', $query) }}"
                       class="flex text-nowrap gap-2 items-center {{ request('sort') == 'price_desc' ? 'text-sky-500 font-bold' : '' }}">
                        <x-icons.bars-arrow-up />
                        بیشترین قیمت
                    </a>
                    @php $query['sort'] = 'price_asc'; @endphp
                    <a href="{{ route('client.store.index', $query) }}"
                       class="flex text-nowrap gap-2 items-center {{ request('sort') == 'price_asc' ? 'text-sky-500 font-bold' : '' }}">
                        <x-icons.bars-arrow-down />
                        کمترین قیمت
                    </a>
                </div>
                <div class="border-y p-2 md:hidden gap-1 items-center flex overflow-x-scroll">
                    @foreach($attributes as $attribute)
                        <div x-data="{ open: false }">
                            <button
                                class="flex gap-1 items-center"
                                @click="open = ! open">
                                {{ $attribute->name }}
                                <x-icons.chevron-down />
                            </button>
                            <div
                                x-show="open"
                                @click="open = ! open"
                                x-transition
                                class="fixed w-full h-full top-0 left-0 backdrop-blur-md z-30"></div>
                            <div
                                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 z-40 bg-gray-800 text-white rounded-lg"
                                x-show="open"
                                x-transition>
                                @foreach($attribute->values as $value)
                                    @php
                                        $query = request()->query();
                                        $query[$attribute->name] = $value->value;
                                        $url = route('client.store.index', $query);
                                        $isActive = request($attribute->name) == $value->value;
                                    @endphp
                                    <a href="{{ $url }}"
                                       class="inline-block px-3 py-1 rounded-lg mr-2 mb-2 transition
                                       {{ $isActive ? 'bg-sky-500 text-white' : 'bg-gray-700 text-gray-300 hover:bg-sky-500 hover:text-white' }}">
                                        {{ $value->value }}
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($products as $product)
                        <x-client.ui.single-product :product="$product" />
                    @endforeach
                </div>

            </div>

        </div>
    </div>
@endsection
