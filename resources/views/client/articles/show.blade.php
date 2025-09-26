@extends('components.layouts.app.index')
@section('content')
    @php
        $breads = [
               [
                   "route" => 'client.articles.index',
                   "name" => 'مقالات',
               ],
                [
                   "route" => '',
                   "name" => $article->name,
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="{{$article->name}}" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 ">
            <div class="col-span-1 md:col-span-3 lg:col-span-4 space-y-4">
                @foreach ($article->getMedia('avatars') as $media)
                    <img
                        class="w-full rounded-xl"
                        src="{{ $media->getFullUrl('watermark') }}" alt="">
                @endforeach
                <div>
                    {!! $article->description !!}
                </div>
            </div>

        </div>
    </div>
@endsection
