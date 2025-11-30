<div class="container mx-auto p-4 rounded-t-lg bg-gray-500 mb-18 md:mb-0 space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 ">
        <div class="space-y-4 ">
            <h3 class="text-2xl">درباره رایان نوین</h3>
            <p class="text-justify">
                عاملیت رسمی (dahua -Hikvision)  با ارائه محصولات اورجینال برند هایک ویژن و داهوا در خدمت مشتریان گرامی در سراسر ایران است.
            </p>
        </div>
        <div class="space-y-4 ">
            <h3 class="text-2xl">تماس با رایان نوین</h3>
            <div class="space-y-2">
                <a href="tel:09129494234" class="flex gap-1 items-center">
                    <x-icons.phone />
                    09129494234
                </a>
                <a href="tel:09902706257" class="flex gap-1 items-center">
                    <x-icons.phone />
                    09902706257
                </a>
                <a href="mailto:info@rayannovincctv.com" class="flex gap-1 items-center">
                    <x-icons.envelope />
                    info@rayannovincctv.com
                </a>
                <div class="flex gap-1 items-center">
                    <div>
                        <x-icons.map/>
                    </div>
                    دفتر مرکزی: تهران،خیابان جمهوری، تقاطع شیخ هادی و رازی ،مرکز تجاری یگانه،طبقه دوم، واحد ۲۱۱
                </div>
            </div>
        </div>
        <div class="space-y-4 ">
            <h3 class="text-2xl">دسترسی سریع </h3>
            <a href="{{route('client.store.index')}}" class="flex gap-1 items-center">
                <x-icons.building-storefront />
                فروشگاه
            </a>
            <a href="{{route('client.calculator')}}" class="flex gap-1 items-center">
                <x-icons.pencil-square />
                محاسبه فضای هارد دوربین
            </a>
            <a href="{{route('client.price-list')}}" class="flex gap-1 items-center">
                <x-icons.pencil-square />
                دانلود لیست قیمت
            </a>
            <a href="{{route('client.articles.index')}}" class="flex gap-1 items-center">
                <x-icons.pencil-square />
                مقالات
            </a>
            <a href="{{route('client.privacy-policy')}}" class="flex gap-1 items-center">
                <x-icons.shield-exclamation />
                قوانین و مقررات
            </a>
            <a href="{{route('client.faq')}}" class="flex gap-1 items-center">
                <x-icons.question-mark-circle />
                سوالات متداول
            </a>

        </div>
        <div class="space-y-4 ">
            <h3 class="text-2xl">مجوز ها</h3>
            <div id="enamad"></div>
        </div>
    </div>
    <div class="flex flex-col items-center font-thin">
        <p>
            کلیه حقوق برای مالک سایت محفوظ است و هر گونه کپی برداری بدون درج نام شرکت رایان نوین پیگرد قانونی خواهد داشت.
        </p>
        <a target="_blank"
           class="text-purple-200 font-bold"
           href="https://bariz.tech/">طراحی و توسعه با تیم باریز</a>
    </div>
</div>

@push('js')

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     console.log('ddd');
        //     var enamad = document.createElement('a');
        //     enamad.setAttribute('referrerpolicy', 'origin');
        //     enamad.setAttribute('target', '_blank');
        //     enamad.setAttribute('href', 'https://trustseal.enamad.ir/?id=667972&Code=XNhWc5JWT3Tvrhvzc6Ezjyxl64Z3pMYp');
        //
        //     var img = document.createElement('img');
        //     img.setAttribute('referrerpolicy', 'origin');
        //     img.setAttribute('src', 'https://trustseal.enamad.ir/logo.aspx?id=667972&Code=XNhWc5JWT3Tvrhvzc6Ezjyxl64Z3pMYp');
        //     img.setAttribute('alt', '');
        //     img.style.cursor = 'pointer';
        //
        //     enamad.appendChild(img);
        //
        //     var target = document.getElementById('enamad');
        //     if (target) {
        //         target.appendChild(enamad);
        //     } else {
        //         console.warn('div#enamad not found');
        //     }
        // });
    </script>
@endpush

