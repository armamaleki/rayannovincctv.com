<section class="container mx-auto px-2 my-16 py-16 space-y-4">
    <div class="text-center">
        <p class="text-4xl text-sky-500 font-bold">آخرین مقالات</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
        @foreach($articles as $article)
            <x-client.ui.single-article :article="$article" />
        @endforeach
    </div>
</section>
