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

    <div class="container mx-auto px-2 py-16">

        {{-- فیلترها --}}
        <div class="flex flex-wrap gap-2 items-center tag_menu">
            <button class="active px-3 py-1 bg-sky-600 text-white rounded" data-filter="*">همه</button>

            @foreach($tags as $tag)
                <button
                    class="px-3 py-1 bg-gray-700 text-white rounded"
                    data-filter=".{{ Str::slug($tag->name) }}"
                >
                    {{ $tag->name }}
                </button>
            @endforeach
        </div>
        <div dir="rtl" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 contentLists mt-6">

            @foreach($price_lists as $price_list)
                <div class=" p-2 filter-item @foreach($price_list->tags as $ta) {{ Str::slug($ta->name) }} @endforeach">
                    <div class=" p-4 shadow-lg shadow-sky-400 rounded-lg space-y-4 bg-gray-800 text-justify flex flex-col items-center justify-between h-40">
                        <div>
                            <h2 class="font-bold text-center text-2xl text-sky-400">
                                <span class="text-sky-200">دانلود</span><br>
                                {{ $price_list->name }}
                            </h2>
                        </div>

                        @if($price_list->getFirstMediaUrl('price_list'))
                            <a href="{{ $price_list->getFirstMediaUrl('price_list') }}"
                               class="text-white bg-gradient-to-r from-sky-500 via-sky-600 to-sky-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none
                           focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Download
                            </a>
                        @endif
                    </div>
                </div>

            @endforeach

        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/isotope.min.js') }}"></script>

    <script>
        $(window).on('load', function() {
            var $container = $('.contentLists');
            $container.isotope({
                itemSelector: '.filter-item',
                filter: '*',
                isOriginLeft: false,
                animationOptions: {
                    duration: 500,
                    easing: 'linear',
                    queue: false
                }
            });
            var $buttons = $('.tag_menu button');
            $buttons.on('click', function() {
                $buttons.removeClass('active bg-sky-600').addClass('bg-gray-700');
                $(this).addClass('active bg-sky-600').removeClass('bg-gray-700');

                // فیلتر
                var selector = $(this).attr('data-filter');

                $container.isotope({
                    filter: selector,
                    isOriginLeft: false,
                    animationOptions: {
                        duration: 500,
                        easing: 'linear',
                        queue: false
                    }
                });
            });

        });
    </script>
@endpush
