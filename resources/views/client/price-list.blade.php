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
        <div class="p-4 shadow-lg shadow-sky-400 rounded-lg bg-gray-800 divide-y divide-dashed">
            @foreach($price_lists as $price_list)
                <div class="p-2 md:flex md:justify-between ">
                    <div>
                        <h2 class="font-bold text-sky-400">
                            {{$price_list->name}}
                        </h2>
                    </div>
                    @if($price_list->getFirstMediaUrl('price_list'))
                        <a href="{{ $price_list->getFirstMediaUrl('price_list') }}" target="_blank">
                            <x-icons.hard-drive-download class="size-12"/>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>

    </div>
@endsection
