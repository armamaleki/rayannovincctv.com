@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            ویرایش مقاله : {{$article->name}}
        </div>
        <div class="card-body">
            <form
                action="{{route('manager.article.update' , $article)}}"
                method="post">
                @csrf
                @method('put')
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        نام مقاله
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid state-invalid @enderror"
                               placeholder="نام مقاله باید منحصر به فرد باشد"
                               value="{{$article->name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        آدرس اینترنتی
                        @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="slug"
                               class="form-control @error('name') is-invalid state-invalid @enderror"
                               placeholder="نام مقاله باید منحصر به فرد باشد"
                               value="{{ $article->slug }}">
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
                               value="{{ $article->meta_title }}">
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
                                placeholder="توضیح متا نهایتا 155 کارکتر">{{ $article->meta_description }}</textarea>
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
                                placeholder="توضیح کوتاه نهایتا 250 کارکتر">{{ $article->short_description }}</textarea>
                    </div>
                </div>
                <textarea id="description" name="description">{{ $article->description  }}</textarea>
                @can('article-update')
                    <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره مقاله</button>
                @endcan
            </form>

            <div class="row mt-4">
                <div class="col">
                    <div class="mb-3">
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
                    @foreach ($article->getMedia('avatars') as $media)
                        <img
                            class="rounded-lg"
                            src="{{ $media->getFullUrl('watermark') }}" alt="Image">
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
                    aspectRatio: 16 / 9,
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
                    formData.append('model', `{{$article->id}}`);
                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    formData.append('_token', csrfToken);
                    fetch(`{{route('manager.article.avatar')}}`, {
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
    </script>
@endpush
