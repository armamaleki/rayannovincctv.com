@extends('components.layouts.dashboard.index')
@section('content')

    <p class="text-2xl font-bold mb-2">
        لیست سفارشات شما
    </p>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-right">
            <thead class="  bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    شماره سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    مبلغ کل
                </th>
                <th scope="col" class="px-6 py-3">
                    محصولات خریداری شده
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="odd:bg-gray-900   even:bg-gray-800 border-b border-gray-700 ">
                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap ">
                        {{$order->order_number}}
                    </th>
                    <td class="px-6 py-4">
                        @if($order->total_price)
                            {{number_format($order->total_price)}}
                        @endif
                    </td>
                    <td class="px-6 py-4 flex flex-col space-y-4">
                        @foreach($order->items as  $item)
                            <p>{{$item->product->name}}</p>
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        {{$order->status}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
