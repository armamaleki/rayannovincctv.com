@extends('components.layouts.app.index')
@section('content')
    @php
        $breads = [
               [
                   "route" => 'client.store.index',
                   "name" => 'فروشگاه',
               ],[
                   "route" => '',
                   "name" => $product->name,
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="{{$product->name}}" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        <div
            class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center bg-gray-800 p-2 rounded-xl shadow-lg shadow-sky-400">
            <div class="space-y-4">
                <swiper-container
                    style="--swiper-navigation-color: #fff;
                     --swiper-pagination-color: #fff"
                    class="mySwiper"
                    thumbs-swiper=".mySwiper2" space-between="10" navigation="true">
                    <swiper-slide>
                        @foreach ($product->getMedia('avatars') as $media)
                            <img
                                class="rounded-xl w-full"
                                src="{{ $media->getFullUrl('watermark') }}" alt="">
                        @endforeach
                    </swiper-slide>

                </swiper-container>

                <swiper-container class="mySwiper2" space-between="10" slides-per-view="4" free-mode="true"
                                  watch-slides-progress="true">
                    <swiper-slide>
                        @if($product->getMedia('avatars')->isNotEmpty())
                            <img class="rounded-xl"  src="{{ $product->getMedia('avatars')->first()->getUrl('thumb') }}" alt="">
                        @endif
                    </swiper-slide>
                </swiper-container>
            </div>
            <div class="space-y-4 ">
                <h1 class="text-4xl font-bold ">{{$product->name}}</h1>
                <p class="border-b p-2 w-fit">
                    {{$product->short_description}}
                </p>
                <div class="border-b p-2">
                    <div class="relative overflow-x-auto border rounded-xl inline-block ">
                        <table class="w-fit text-sm text-right">
                            <thead class="text-xs border-b border-dotted">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ویژگی های کلیدی
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b">
                                <th scope="row" class="px-6 py-4 border-l">
                                    Apple M
                                </th>
                                <td class="px-6 py-4">
                                    Silver
                                </td>
                            </tr>
                            <tr class="border-b">
                                <th scope="row" class="px-6 py-4 border-l">
                                    Apple MacBook Pr
                                </th>
                                <td class="px-6 py-4">
                                    Silver
                                </td>
                            </tr>
                            <tr class="border-b">
                                <th scope="row" class="px-6 py-4 border-l">
                                    App
                                </th>
                                <td class="px-6 py-4">
                                    Silver
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="border-b space-y-4 p-2">
                    <div class="flex gap-2">
                        کد کالا: {{$product->sku}}
                    </div>
                    <div class="flex gap-2">
                        گارانتی : باید بزارم
                    </div>
                    <div class="flex gap-2 font-bold">
                        امکان خرید حضوری : دارد
                    </div>
                    <a href="tel:123456" class="flex gap-2">
                        مشاوره رایگان : <span class="text-sky-500">123456</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('assets/plugins/swiper-element-bundle.min.js')}}"></script>

@endpush
