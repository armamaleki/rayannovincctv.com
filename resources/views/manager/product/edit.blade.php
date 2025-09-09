@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">ویرایش محصول: {{$product->name}}</h3>
        </div>
        <div class="card-body">
            <form action="{{route('manager.product.update' , $product)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        نام محصول
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid state-invalid @enderror "
                               placeholder="نام محصول باید منحصر به فرد باشد"
                               value="{{$product->name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        آدرس اینترنتی
                        @error('slug') <span class="text-danger">{{$message}}</span> @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="slug"
                               class="form-control @error('slug') is-invalid state-invalid @enderror "
                               placeholder="آدرس اینترنتی باید منحصر به فرد باشد (بهتره انگلیسی باشه)"
                               value="{{$product->slug}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        قیمت محصول
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <span id="showPrice">0</span> تومن
                        <input
                                name="price"
                                type="number"
                                pattern="\d*"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                value="{{$product->price}}"
                                id="priceInput"
                                class="form-control @error('price') is-invalid state-invalid @enderror"
                                placeholder="قیمت محصول به تومان وارد شود">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        موجودی انبار
                        @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="quantity"
                               class="form-control @error('quantity') is-invalid state-invalid @enderror"
                               placeholder="موجودی انبار حتما باید وارد شود پس از خرید از این موجودی کم میشه."
                               value="{{ $product->quantity }}">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        تیتر متا
                        @error('meta_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="meta_title"
                               class="form-control @error('meta_title') is-invalid state-invalid @enderror"
                               placeholder="تیتر متا نهایتا 65 کارکتر"
                               value="{{ $product->meta_title }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        توضیح متا
                        @error('meta_description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                            <textarea
                                    name="meta_description"
                                    class="form-control @error('meta_description') is-invalid state-invalid @enderror"
                                    placeholder="توضیح متا نهایتا 155 کارکتر">{{ $product->meta_description }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        توضیح کوتاه
                        @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                            <textarea
                                    name="short_description"
                                    class="form-control @error('short_description') is-invalid state-invalid @enderror"
                                    placeholder="توضیح کوتاه نهایتا 250 کارکتر">{{ $product->short_description }}</textarea>
                    </div>
                </div>
                <textarea id="description" name="description">{{ $product->description  }}</textarea>
                <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره مقاله</button>
            </form>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/plugins/ckeditor/lang/fa.js')}}"></script>
    <script>
        const editor = CKEDITOR.replace('description', {
            {{--            filebrowserUploadUrl: `{{route('manager.imageUploader' , ['_token' => csrf_token()])}}`,--}}
            customConfig: 'editorConfig',
            requires: 'widget'
        });
        CKEDITOR.editorConfig = function(config) {
            config.language = 'fa';
            config.uiColor = '#e9d5ff';
            config.allowedContent = true;
            config.extraPlugins = 'language';
            config.height = 500;
            config.extraPlugins = 'uploadimage';
            {{--            config.uploadUrl = `{{route('manager.imageUploader' , ['_token' => csrf_token()])}}`;--}}
                config.toolbarCanCollapse = true;
            config.extraPlugins = 'font';
            config.font_names =
                'yekan;' +
                'vazir;';
        };
    </script>
    <script>
        const priceInput = document.getElementById('priceInput');
        const showPrice = document.getElementById('showPrice');
        priceInput.addEventListener('input', function(e) {
            let formatted = Number(e.target.value).toLocaleString('fa-IR');
            showPrice.textContent = formatted;
        });
    </script>

@endpush
