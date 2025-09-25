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
            <div>

            </div>
            <div class="col-span-1 md:col-span-3 lg:col-span-4 space-y-4">
                <div class="border-y p-2 flex gap-1 items-center">
                    <p>
                        مرتب سازی بر اساس:
                    </p>
                    <a
                        class="flex gap-2 items-center"
                        href="">
                        <x-icons.bars-arrow-down/>
                        جدید ترین
                    </a>
                    <a
                        class="flex gap-2 items-center"
                        href="">
                        <x-icons.bars-arrow-up/>
                        بیشترین قیمت
                    </a>
                    <a
                        class="flex gap-2 items-center"
                        href="">
                        <x-icons.bars-arrow-down/>
                        کم ترین قیمت
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <x-client.ui.single-product/>
                    <x-client.ui.single-product/>
                    <x-client.ui.single-product/>
                    <x-client.ui.single-product/>
                    <x-client.ui.single-product/>

                </div>

            </div>

        </div>
    </div>
@endsection
