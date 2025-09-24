@extends('components.layouts.app.index')
@section('content')
    @php
        $breads = [
               [
                   "route" => '',
                   "name" => 'مقالات',
               ],
           ];
    @endphp
    <x-client.ui.breadcrumb title="درباره ما" :breads="$breads" />
    <div class="space-y-4 my-16  container mx-auto p-2">
        <div>
            <h3 class="text-center text-2xl font-bold text-3xl">چرا رایان نوین؟</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 justify-content-center">
            <div>
                <p>
                    <span class="text-sky-400 text-2xl">01</span>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet deserunt dolor doloribus fugiat illo
                    magnam nam nesciunt quo tempora velit? Doloremque ex ipsa laboriosam maxime nostrum obcaecati
                    quaerat quas quibusdam?
                </p>
                <p>
                    <span class="text-sky-400 text-2xl">02</span>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet deserunt dolor doloribus fugiat illo
                    magnam nam nesciunt quo tempora velit? Doloremque ex ipsa laboriosam maxime nostrum obcaecati
                    quaerat quas quibusdam?
                </p>
            </div>
            <img src="{{asset('assets/images/about-us-monitor.jpg')}}" alt="">
            <div>
                <p>
                    <span class="text-sky-400 text-2xl">03</span>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet deserunt dolor doloribus fugiat illo
                    magnam nam nesciunt quo tempora velit? Doloremque ex ipsa laboriosam maxime nostrum obcaecati
                    quaerat quas quibusdam?
                </p>
                <p>
                    <span class="text-sky-400 text-2xl">04</span>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet deserunt dolor doloribus fugiat illo
                    magnam nam nesciunt quo tempora velit? Doloremque ex ipsa laboriosam maxime nostrum obcaecati
                    quaerat quas quibusdam?
                </p>
            </div>
        </div>
    </div>
@endsection
