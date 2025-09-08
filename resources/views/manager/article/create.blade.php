@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            اضافه کردن مقاله جدید
        </div>
        <div class="card-body">
            <form
                action="{{route('manager.article.store')}}"
                method="post">
                @csrf
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
                               value="{{ old('name') }}">
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
                               value="{{ old('slug') }}">
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
                <textarea id="description" name="description">{{ old('description')  }}</textarea>
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
            requires: 'widget',
        });
        CKEDITOR.editorConfig = function (config) {
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
                'vazir;'
        };
    </script>
@endpush

$table->longText('description')->nullable();
