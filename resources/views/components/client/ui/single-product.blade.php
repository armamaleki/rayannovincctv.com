<div class="group flex flex-col items-center text-center space-y-4">
    <div class="overflow-hidden">
        <a href="{{route('client.store.show' , $product)}}">
            <div class="rounded-xl overflow-hidden">
                @foreach ($product->getMedia('avatars') as $media)
                    <img
                        class="group-hover:scale-125 group-hover:rotate-5 transition delay-150 duration-300  ease-in-out  group-hover:skew-1 group-hover:grayscale"
                        src="{{ $media->getFullUrl('watermark') }}" alt="">
                @endforeach
            </div>
        </a>

    </div>
    <a  href="{{route('client.store.show' , $product)}}">
        <h2 class="text-2xl font-bold group-hover:text-sky-400 transition delay-150 duration-300  ease-in-out">این
            {{$product->name}}
        </h2>
    </a>

    <p>
        {{$product->short_description}}
    </p>

    <a  href="{{route('client.store.show' , $product)}}" class="p-2 rounded-full bg-sky-400 flex gap-1">
        <x-icons.shopping-cart />
        اضافه کردن به سبد خرید
    </a>
</div>
