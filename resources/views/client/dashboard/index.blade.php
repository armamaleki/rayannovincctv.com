@extends('components.layouts.dashboard.index')
@section('content')
    <p class="text-2xl font-bold mb-2">
        آخرین سفارش های شما
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

    <p class="text-2xl font-bold mb-2 mt-4">
        آخرین پرداختی های شما
    </p>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-right">
            <thead class="  bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    پرداخت مربوط به شماره سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    مبلغ کل
                </th>
                <th scope="col" class="px-6 py-3">
                    زمان ایجاد
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
            <tr class="odd:bg-gray-900   even:bg-gray-800 border-b border-gray-700 ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap ">
                    {{$transaction->order->order_number}}
                </th>
                <td class="px-6 py-4">
                    @if($transaction->paid)
                        {{number_format($transaction->paid)}}
                    @endif
                </td>
                <td class="px-6 py-4 flex flex-col space-y-4">
                    {{\Carbon\Carbon::create($transaction->created_at)->ago()}}
                </td>
                <td class="px-6 py-4">
                    @if($transaction->status ==2)
                        پرداخت شده
                    @elseif($transaction->status ==1 )
                        پرداخت با خطا مواجه شد
                    @else
                        پرداخت با خطا مواجه شد
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
