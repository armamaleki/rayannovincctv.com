@extends('components.layouts.app.index')
@section('meta')
    <title>دانلود نرم افزار دوربین مدار بسته</title>
    <meta name="description" content="دانلود نرم افزار دوربین مدار بسته">
@endsection
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'دانلود نرم افزار دوربین مدار بسته',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="دانلود نرم افزار دوربین مدار بسته" :breads="$breads" />
    <div class="container mx-auto px-2 py-16 ">
        <div class="p-4 shadow-lg shadow-sky-400 rounded-lg bg-gray-800 divide-y divide-dashed">
            @foreach($applications as $application)
                <div class="p-2 md:flex md:justify-between ">
                    <div>
                        <h2 class="font-bold text-sky-400">
                            {{$application->name}}
                        </h2>
                        <p>
                            {{$application->description}}
                        </p>
                    </div>
                    <a download href="https://dl.rayannovincctv.com/DMSS.apk">
                        <x-icons.hard-drive-download class="size-12"/>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
