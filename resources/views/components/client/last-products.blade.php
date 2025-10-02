<section class="container mx-auto px-2 my-16 py-16 space-y-4">
    <div class="text-center">
        <p class="text-4xl text-sky-500 font-bold">پر فروش ترین محصولات</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 ">
        @foreach($products as $product)
            <x-client.ui.single-product :product="$product"/>
        @endforeach
    </div>
</section>
