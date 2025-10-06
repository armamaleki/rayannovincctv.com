@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            اضافه کردن گارانتی جدید
        </div>
        <div class="card-body">
            <form
                action="{{route('manager.granite.store')}}"
                method="post">
                @csrf
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        نام گارانتی
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
                        مدت زمان گارانتی
                        @error('duration')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="duration"
                               class="form-control @error('duration') is-invalid state-invalid @enderror"
                               placeholder="به طور مثال 12 ماه"
                               value="{{ old('duration') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره گارانتی</button>
            </form>
        </div>
    </div>
@endsection
