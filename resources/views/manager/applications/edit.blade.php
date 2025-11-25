@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            اضافه کردن نرم افزار جدید
        </div>
        <div class="card-body">
            <form
                action="{{route('manager.application.update' , $application)}}"
                method="post">
                @csrf
                @method('put')
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        نام نرم افزار
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid state-invalid @enderror"
                               placeholder="به طور مثال:دانلود gdmss plus برای اندروید"
                               value="{{ $application->name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        لینک دانلود
                        @error('link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="link"
                               class="form-control @error('link') is-invalid state-invalid @enderror"
                               placeholder="https://dl.rayannovincctv.com/app.apk"
                               value="{{ $application->link }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        توضیح کوتاه
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                            <textarea
                                name="description"
                                class="form-control @error('description') is-invalid state-invalid @enderror"
                                placeholder="توضیح کوتاه نهایتا 500 کارکتر به طور خلاصه نرم افزار را شرح دهید.">{{ $application->description }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره</button>
            </form>
        </div>
    </div>
@endsection
