@extends('components.layouts.app.index')
@section('meta')
    <title>دانلود لیست قیمت دوربین مدار بسته</title>
    <meta name="description" content="دانلود لیست قیمت دوربین مدار بسته">
@endsection
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'دانلود لیست قیمت دوربین مدار بسته',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="دانلود لیست قیمت دوربین مدار بسته" :breads="$breads" />
    <div class="container mx-auto px-2 py-16 ">
        <div class="grid grid-cols-1  md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($price_lists as $price_list)
                <div class="p-4 shadow-lg  shadow-sky-400 rounded-lg  space-y-4  bg-gray-800 text-justify  flex flex-col items-center justify-between h-full">
                    <div>
                        <h2 class="font-bold text-center text-2xl text-sky-400">
                            <span class="text-sky-200">دانلود</span>
                            <br>
                            {{$price_list->name}}
                        </h2>
                    </div>
                    @if($price_list->getFirstMediaUrl('price_list'))
                        <a href="{{ $price_list->getFirstMediaUrl('price_list') }}"
                           class="text-white bg-gradient-to-r from-sky-500 via-sky-600 to-sky-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300  font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Download
                        </a>
                    @endif
                </div>
            @endforeach
        </div>

    </div>
@endsection
