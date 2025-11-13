@extends('components.layouts.app.index')
@section('meta')
    <title>مقالات رایان نوین</title>
    <meta name="description" content="مقالات رایان نوین">
@endsection
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'مقالات',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="مقالات" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($articles as $key=> $article)
                <x-client.ui.single-article aos="{{$key}}" :article="$article" />
            @endforeach
        </div>
        {{$articles->links('vendor.pagination.tailwind')}}
    </div>
@endsection
