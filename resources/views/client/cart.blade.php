@extends('components.layouts.app.index')
@section('meta')
    <title>سبد خرید</title>
    <meta name="description" content="سبد خرید">
@endsection
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'جزئیات پرداخت',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="جزئیات پرداخت" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        <form
            method="post"
            action="{{route('purchase',$order)}}"
            class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @csrf
            <div class="col-span-1 md:col-span-2 lg:col-span-3 space-y-8 bg-gray-800 shadow-lg shadow-sky-400 p-2 rounded-lg">
                <livewire:client.add-address/>
                @error('address') <span class="text-red-600 font-bold ">{{$message}}</span>@enderror
                <div class="grid grid-cols-1 md:grid-cols-2 gsp-4 items-center gap-4">
                    @foreach(auth()->user()->addresses as $address)
                        <div>
                            <input type="radio" id="address-{{$loop->index +1}}" name="address" value="{{$address->id}}"
                                   class="hidden peer"/>
                            <label for="address-{{$loop->index +1}}"
                                   class="inline-flex items-center justify-between w-full p-5 bg-pink border border-sky-400 rounded-lg cursor-pointer   peer-checked:border-sky-800   peer-checked:text-sky-50 hover:text-sky-50 hover:bg-sky-800 peer-checked:bg-sky-800 @error('address') bg-red-400 @enderror">
                                <span>
                                    <p>
                                     {{$address->province}}:{{$address->city}}
                                    </p>
                                    <p>
                                        پلاک:{{$address->no}}  واحد:{{$address->number}} کد پستی: {{$address->postal_code}}
                                    </p>
                                    <p>
                                        {{$address->address}}
                                    </p>
                                </span>
                                <x-icons.map-pin class="size-12"/>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-gray-800 shadow-lg shadow-sky-400 p-4 rounded-lg divide-y divide-gray-400 h-fit sticky top-38">
                <p class="py-2 font-bold">
                    مجموع سبد خرید
                </p>
                <div class="flex  py-4">
                    مجموع : {{number_format($order->total_price)}}
                </div>
                <div class="flex flex-col   py-4">
                    <button
                        type="submit"
                        class=" bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 shadow-lg shadow-sky-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        پرداخت صورت حساب
                    </button>

                </div>
            </div>
        </form>
    </div>
    @push('js')
        @error('address')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'در صورت نداشتن آدرس از قسمت<span class="text-pink-900"> اضافه کردن آدرس +</span>ابتدا آدرس خودر را وارد پس از آن آدرس ارسال سفارش را انتخاب کنید.<br>سپاس از همراهی شما',
                });
            });
        </script>
        @enderror
    @endpush
@endsection

