<div class="relative">
    <img class="transform scale-x-[-1]" src="{{ asset('/assets/images/breadcrumb.jpg') }}" alt="">
    <div class="absolute z-10 top-0 left-0 w-full h-full bg-sky-400/20"></div>

    <div class="absolute top-1/2 right-15 z-30 space-y-2">
        <h1 class="text-3xl font-bold text-sky-500">{{ $title ?? '' }}</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center gap-1">
                <li>
                    <a href="{{ route('client.home') }}" class="flex gap-1 items-center hover:text-sky-500">
                        <x-icons.home />
                        <p>رایان نوین</p>
                    </a>
                </li>
                <x-icons.chevron-left />
                @foreach($breads as $bread)
                    <li class="inline-flex items-center">
                        @if($bread['route'])
                            <a class="flex items-center  hover:text-sky-500 gap-2  "
                               href="{{$bread['route'] ? route($bread['route']) : ''}}">
                                {{$bread['name']}}
                            </a>
                            <x-icons.chevron-left />
                        @else
                            <h3 class="flex items-center gap-2 ">
                                {{$bread['name']}}
                            </h3>
                        @endif
                    </li>

                @endforeach
            </ol>
        </nav>
    </div>
</div>
