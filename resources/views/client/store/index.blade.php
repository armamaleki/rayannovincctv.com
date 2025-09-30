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
    <div class="space-y-4 my-16  container mx-auto p-2">

        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 ">
            <div class="border border-gray-400 rounded-xl bg-gray-800 h-fit p-3 shadow-lg shadow-sky-400">
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
                <div class="border-y p-2 flex gap-1 items-center">
                    <p>مرتب سازی بر اساس:</p>
                    @php
                        $query = request()->query();
                    @endphp
                    @php $query['sort'] = 'latest'; @endphp
                    <a href="{{ route('client.store.index', $query) }}"
                       class="flex gap-2 items-center {{ request('sort') == 'latest' ? 'text-sky-500 font-bold' : '' }}">
                        <x-icons.bars-arrow-down/>
                        جدیدترین
                    </a>
                    @php $query['sort'] = 'price_desc'; @endphp
                    <a href="{{ route('client.store.index', $query) }}"
                       class="flex gap-2 items-center {{ request('sort') == 'price_desc' ? 'text-sky-500 font-bold' : '' }}">
                        <x-icons.bars-arrow-up/>
                        بیشترین قیمت
                    </a>
                    @php $query['sort'] = 'price_asc'; @endphp
                    <a href="{{ route('client.store.index', $query) }}"
                       class="flex gap-2 items-center {{ request('sort') == 'price_asc' ? 'text-sky-500 font-bold' : '' }}">
                        <x-icons.bars-arrow-down/>
                        کمترین قیمت
                    </a>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($products as $product)
                        <x-client.ui.single-product :product="$product"/>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
@endsection
