<div
    data-aos="fade-up"
    data-aos-delay="{{$aos +1 *2}}00"
    class="flex flex-col items-center space-y-2 group text-center">
    <a href="{{route('client.articles.show' , $article)}}">

        <div class="rounded-xl overflow-hidden">
            @foreach ($article->getMedia('avatars') as $media)
                <img
                    class="group-hover:scale-125 group-hover:rotate-5 transition delay-150 duration-300  ease-in-out  group-hover:skew-1 group-hover:grayscale"
                    src="{{ $media->getFullUrl('watermark') }}" alt="">
            @endforeach
        </div>
    </a>

    <div class="p-4 space-y-2">
        <a href="{{route('client.articles.show' , $article)}}">

            <h2 class="text-2xl font-bold group-hover:text-sky-400 transition delay-150 duration-300  ease-in-out">
                {{$article->name}}
            </h2>
        </a>

        <p class="text-justify">
            {{$article->short_description}}
        </p>
        <div class="p-2 rounded-full bg-sky-400 flex justify-between">
            <div class=" flex gap-2 ">
                <x-icons.calendar-date-range />
                {{jdate($article->created_at)->ago()}}
            </div>
            <div class=" flex gap-1 ">
                <x-icons.user />
                {{$article->user->name}}
            </div>
        </div>
    </div>
</div>
