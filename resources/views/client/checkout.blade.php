@extends('components.layouts.app.index')
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'سبد خرید',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="سبد خرید" :breads="$breads" />
    <section class="container mx-auto px-2 py-16 ">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="col-span-1 md:col-span-2 lg:col-span-3  shadow-lg h-fit shadow-sky-400 rounded-3xl ">
                <div class="relative rounded-3xl  overflow-x-auto ">
                    <table class="w-full  text-right ">
                        <thead class="text-xs font-bold   bg-sky-900">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                تصویر محصول
                            </th>
                            <th scope="col" class="px-6 py-3">
                                نام محصول
                            </th>
                            <th scope="col" class="px-6 py-3">
                                تعداد
                            </th>
                            <th scope="col" class="px-6 py-3">
                                قیمت
                            </th>
                            <th scope="col" class="px-6 py-3">
                                پاک کردن از سبد خرید
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr class="bg-sky-800 border-t border-sky-400">
                                <th class="px-6 py-4">
                                    @if($item->product->getMedia('avatars')->isNotEmpty())
                                        <img
                                            class="rounded-full"
                                            src="{{ $item->product->getMedia('avatars')->first()->getUrl('thumb') }}"
                                            alt="">
                                    @endif
                                </th>
                                <td class="px-6 py-4">
                                    {{$item->product->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->quantity}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->product->price}}
                                </td>
                                <td class="px-6 py-4">
                                    <form
                                        method="post"
                                        action="{{route('checkout.remove-item')}}">
                                        @csrf
                                        <input
                                            name="item"
                                            value="{{$item->id}}"
                                            type="hidden">
                                        <button
                                            class="border border-sky-400 p-2 rounded-full"
                                            type="submit">
                                            x
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="bg-sky-900 p-4 rounded-3xl divide-y divide-sky-400 shadow-lg   shadow-sky-400">
                <p class="py-2 font-bold">
                    سفارش شما
                </p>
                <div class="flex  py-4">
                    <p>نام محصول : </p>
                    <div class="flex flex-col">
                        @foreach($cartItems as $item)
                            <a href="{{route('client.store.show' , $item->product)}}" class=" hover:font-bold">
                                {{$item->product->name}}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="flex  py-4">
                    <p>قیمت کالاها : </p>
                    <div class="flex flex-col">
                        @php
                            $totalPrice = $cartItems->sum(function($item) {
                                return $item->product->price * $item->quantity;
                            });
                        @endphp
                        جمع کل: {{ number_format($totalPrice) }} تومان
                    </div>
                </div>
                <div class="flex  py-4">
                    <p>روش ارسال : </p>
                    <p>
                        تیپاکس از تهران
                    </p>
                </div>
                <div class="flex  py-4">
                    <p>هزینه ارسال : </p>
                    <p>
                        پس کرایه
                    </p>
                </div>
                <div class="flex  py-4">
                    <p>تاریخ ارسال : </p>
                    <p>
                        امروز
                    </p>
                </div>
                <form
                    method="post"
                    action="{{route('cart.store')}}"
                    class="mt-5 flex flex-col items-center">
                    @csrf

                    <button
                        class="flex gap-2 items-center bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300  shadow-lg shadow-cyan-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        تایید و تکمیل اطلاعات
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
