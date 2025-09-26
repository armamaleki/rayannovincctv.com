@extends('components.layouts.app.index')
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'قوانین و مقررات',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="قوانین و مقررات" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet maxime odit officiis omnis temporibus? A architecto blanditiis corporis eaque ex fuga in magnam magni, maxime nisi, placeat tempora tenetur voluptatem.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet maxime odit officiis omnis temporibus? A architecto blanditiis corporis eaque ex fuga in magnam magni, maxime nisi, placeat tempora tenetur voluptatem.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet maxime odit officiis omnis temporibus? A architecto blanditiis corporis eaque ex fuga in magnam magni, maxime nisi, placeat tempora tenetur voluptatem.
    </div>
@endsection
