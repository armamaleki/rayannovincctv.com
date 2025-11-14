<section class="container mx-auto px-2 my-16 py-16 space-y-4 ">
    <div class="text-center">
        <p class="text-4xl text-sky-500 font-bold">پر فروش ترین محصولات</p>
    </div>
    <swiper-container id="latest_product"  init="false">
        @foreach($products as $key=> $product)
            <swiper-slide class="my-8">
            <x-client.ui.single-product aos="{{$key}}" :product="$product"/>
            </swiper-slide>
        @endforeach
    </swiper-container>
</section>
@push('js')
    <script src="{{asset('assets/plugins/swiper-element-bundle.min.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const swiperEl = document.getElementById('latest_product');

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
