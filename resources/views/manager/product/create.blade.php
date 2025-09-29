@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">اضافه کردن محصول</h3>
        </div>
        <div class="card-body">
            <div id="attributes" data-attributes="{{ json_encode(\App\Models\Attribute::all()->pluck('name')) }}"></div>
            <form action="{{route('manager.product.store')}}" method="post">
                @csrf
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
                               value="{{old('name')}}">
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
                               value="{{old('slug')}}">
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
                            value="{{old('price')}}"
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
                               value="{{ old('quantity') }}">
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
                               value="{{ old('meta_title') }}">
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
                                placeholder="توضیح متا نهایتا 155 کارکتر">{{ old('meta_description') }}</textarea>
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
                                placeholder="توضیح کوتاه نهایتا 250 کارکتر">{{ old('short_description') }}</textarea>
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
                        <div id="attribute_section"></div>
                    </div>
                </div>

                <textarea id="description" name="description">{{ old('description')  }}</textarea>
                <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره محصول</button>
            </form>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/plugins/ckeditor/lang/fa.js')}}"></script>
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
    </script>
    <script>
        const priceInput = document.getElementById('priceInput');
        const showPrice = document.getElementById('showPrice');
        priceInput.addEventListener('input', function(e) {
            let formatted = Number(e.target.value).toLocaleString('fa-IR');
            showPrice.textContent = formatted;
        });

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
