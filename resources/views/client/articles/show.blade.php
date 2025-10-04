@extends('components.layouts.app.index')
@section('meta')
    <title>{{$article->meta_title}}</title>
    <meta name="description" content="{{$article->meta_description}}">
@endsection
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
    <div class="space-y-4 my-16  container mx-auto p-2 md:p-8 rounded-2xl bg-gray-800">
        @foreach ($article->getMedia('avatars') as $media)
            <img
                class="w-full rounded-xl"
                src="{{ $media->getFullUrl('watermark') }}" alt="">
        @endforeach
        <div class="editor ">
            {!! $article->description !!}
        </div>
    </div>
@endsection
