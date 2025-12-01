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
        <div class="grid grid-cols-1  md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($applications as $application)
                <div class="p-4 shadow-lg shadow-sky-400 rounded-lg space-y-4 bg-gray-800 text-justify  flex flex-col items-center justify-between h-full">
                    <div>
                        <h2 class="font-bold text-2xl text-sky-400">
                            {{$application->name}}
                        </h2>
                        <p>
                            {{$application->description}}
                        </p>
                    </div>
                    <a download href="{{$application->link}}"
                       class="text-white bg-gradient-to-r from-sky-500 via-sky-600 to-sky-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300  font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        Download
                    </a>
                </div>
            @endforeach
        </div>


    </div>
@endsection
