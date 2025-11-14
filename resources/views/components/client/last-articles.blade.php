<section class="container mx-auto px-2 my-16 py-16 space-y-4">
    <div class="text-center">
        <p class="text-4xl text-sky-500 font-bold">آخرین مقالات</p>
    </div>
        <swiper-container id="latest_article" init="false">
            @foreach($articles as $key=> $article)
                <swiper-slide  class="my-5">
                    <x-client.ui.single-article aos="{{$key}}" :article="$article" />
                </swiper-slide>
            @endforeach
        </swiper-container>
</section>
@push('js')
    <script src="{{asset('assets/plugins/swiper-element-bundle.min.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const swiperEl = document.getElementById('latest_article');

            Object.assign(swiperEl, {
                slidesPerView: 1,
                spaceBetween: 10,
                pagination: {
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 50,
                    },
                },
            });

            swiperEl.initialize();
        });

    </script>
@endpush
