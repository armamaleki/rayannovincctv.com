@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">ویرایش محصول: {{$product->name}}</h3>
        </div>
        <div class="card-body">
            <div id="attributes" data-attributes="{{ json_encode(\App\Models\Attribute::all()->pluck('name')) }}"></div>

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

                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        ویژگی محصول
                        <button class="btn btn-sm btn-danger" type="button" id="add_product_attribute">ویژگی جدید
                        </button>
                        @error('attributes')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </label>
                    <div class="col-md-9">
                        <div id="attribute_section">
                            @foreach($product->attributes as $attribute)
                                <div class="row" id="attribute-{{$loop->index}}">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label>عنوان ویژگی</label>
                                            <select name="attributes[{{$loop->index}}][name]"
                                                    onchange="changeAttributeValues(event, {{$loop->index}});"
                                                    class="attribute-select form-control">
                                                <option value="">انتخاب کنید</option>
                                                @foreach(\App\Models\Attribute::all() as $attr )
                                                    <option
                                                        value="{{$attr->name}}" {{$attr->name === $attribute->name ? 'selected' :''}}>{{$attr->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label>مقدار ویژگی</label>
                                            <select name="attributes[{{$loop->index}}][value]"
                                                    class="attribute-select form-control">
                                                <option value="">انتخاب کنید</option>
                                                @foreach($attribute->values as $value)
                                                    <option
                                                        value="{{$value->value}}" {{ $value->id === $attribute->pivot->value_id ? 'selected':'' }}>{{$value->value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                            <label>اقدامات</label>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-warning"
                                                    onclick="document.getElementById('attribute-{{$loop->index}}').remove()">
                                                حذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>


                <textarea id="description" name="description">{{ $product->description  }}</textarea>
                <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره مقاله</button>
            </form>
            <div class="row mt-4">
                <div class="col">
                    <div class="mb-3">
                        <h2>آواتار محصول</h2>
                        <div class="form-label">حد اکثر اندازه برای بارگزاری 2 مگابایت میباشد.</div>
                        <div class="form-file">
                            <input type="file" class="form-control form-file-input" id="imageInput" name="avatar"
                                   accept="image/*">
                        </div>
                    </div>
                    <p id="errorMessage" class="text-red-800"></p>
                    <button type="submit" class="btn btn-primary" id="cropButton">
                        برش و آپلود
                        <span style="display: none" id="loader">
                     <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                </span>
                    </button>
                </div>
                <div class="col">
                    <img id="imagePreview" src="" class=" ">
                </div>
                <div class="col">
                    @foreach ($product->getMedia('avatars') as $media)
                        <img
                            class="rounded-lg"
                            src="{{ $media->getFullUrl('watermark') }}" alt="Image">
                    @endforeach
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="mb-3">
                        <h2>گالری محصول</h2>
                        <div class="form-label">حد اکثر اندازه برای بارگزاری 2 مگابایت میباشد.</div>
                        <div class="form-file">
                            <input type="file" class="form-control form-file-input" id="imageInputGallery"
                                   name="gallery" accept="image/*">
                        </div>
                    </div>
                    <p id="errorMessageGallery" class="text-red-800"></p>
                    <button type="submit" class="btn btn-primary" id="cropButtonGallery">
                        برش و آپلود
                        <span style="display: none" id="loaderGallery">
                     <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                </span>
                    </button>
                </div>
                <div class="col">
                    <img id="imagePreviewGallery" src="" class="">
                </div>
                <div class="col">
                    @foreach ($product->getMedia('galleries') as $Gallery)
                        <img
                            class="rounded-lg"
                            src="{{ $Gallery->getFullUrl('watermark') }}" alt="Image">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/plugins/ckeditor/lang/fa.js')}}"></script>

    <link href="{{asset('assets/plugins/cropper/cropper.min.css')}}" rel="stylesheet">
    <script src="{{asset('assets/plugins/cropper/cropper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

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

        const priceInput = document.getElementById('priceInput');
        const showPrice = document.getElementById('showPrice');
        if (priceInput) {
            priceInput.addEventListener('input', function(e) {
                let v = e.target.value ? Number(e.target.value) : 0;
                showPrice.textContent = v.toLocaleString('fa-IR');
            });
        }

        var cropper;
        document.getElementById('imageInput').addEventListener('change', function(event) {
            var image = document.getElementById('imagePreview');
            var reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 1
                });
            };
            reader.readAsDataURL(event.target.files[0]);
        });
        document.getElementById('cropButton').addEventListener('click', function() {
            if (cropper) {
                document.getElementById('loader').style.display = 'inline-block';
                var canvas = cropper.getCroppedCanvas();
                canvas.toBlob(function(blob) {
                    console.log(blob);
                    var formData = new FormData();
                    formData.append('croppedImage', blob);
                    formData.append('model', `{{$product->id}}`);
                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    formData.append('_token', csrfToken);
                    fetch(`{{route('manager.product.avatar')}}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(data => {
                            document.getElementById('loader').style.display = 'none';
                            if (data.success) {

                                location.reload();
                            }
                        })
                        .catch(error => {

                            document.getElementById('loader').style.display = 'none';
                        });
                });
            } else {
                document.getElementById('errorMessage').innerText = 'ابتدا عکس خود را انتخاب کنید';
            }
        });


        document.getElementById('imageInputGallery').addEventListener('change', function(event) {
            var image = document.getElementById('imagePreviewGallery');
            var reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 1
                });
            };
            reader.readAsDataURL(event.target.files[0]);
        });
        document.getElementById('cropButtonGallery').addEventListener('click', function() {
            if (cropper) {
                document.getElementById('loaderGallery').style.display = 'inline-block';
                var canvas = cropper.getCroppedCanvas();
                canvas.toBlob(function(blob) {
                    console.log(blob);
                    var formData = new FormData();
                    formData.append('croppedImage', blob);
                    formData.append('model', `{{$product->id}}`);
                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    formData.append('_token', csrfToken);
                    fetch(`{{route('manager.product.gallery')}}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(data => {
                            document.getElementById('loaderGallery').style.display = 'none';
                            if (data.success) {

                                location.reload();
                            }
                        })
                        .catch(error => {

                            document.getElementById('loaderGallery').style.display = 'none';
                        });
                });
            } else {
                document.getElementById('errorMessageGallery').innerText = 'ابتدا عکس خود را انتخاب کنید';
            }
        });
    </script>


    <script>
        let changeAttributeValues = (event, id) => {
            let valueBox = $(`select[name='attributes[${id}][value]']`);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            });

            $.ajax({
                type: 'POST',
                url: '/manager/attribute/values',
                data: JSON.stringify({
                    name: event.target.value
                }),
                success: function(data) {
                    valueBox.html(`
                            <option value="" selected>انتخاب کنید</option>
                            ${
                            data.data.map(function(item) {
                                return `<option value="${item}">${item}</option>`;
                            })
                        }`
                    );

                }
            });
        };

        let createNewAttr = ({ attributes, id }) => {
            return `
                    <div class="row" id="attribute-${id}">
                        <div class="col-5">
                            <div class="form-group">
                                 <label>عنوان ویژگی</label>
                                 <select name="attributes[${id}][name]" onchange="changeAttributeValues(event, ${id});" class="attribute-select form-control">
                                    <option value="">انتخاب کنید</option>
                                    ${
                attributes.map(function(item) {
                    return `<option value="${item}">${item}</option>`;
                })
            }
                                 </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                 <label>مقدار ویژگی</label>
                                 <select name="attributes[${id}][value]" class="attribute-select form-control">
                                        <option value="">انتخاب کنید</option>
                                 </select>
                            </div>
                        </div>
                         <div class="col-2">
                            <label >اقدامات</label>
                            <div>
                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-${id}').remove()">حذف</button>
                            </div>
                        </div>
                    </div>
                `;
        };

        $('#add_product_attribute').click(function() {
            let attributesSection = $('#attribute_section');
            let id = attributesSection.children().length;
            let attributes = $('#attributes').data('attributes');
            attributesSection.append(
                createNewAttr({
                    attributes,
                    id
                })
            );

            $('.attribute-select').select2({ tags: true });
        });


    </script>

@endpush
