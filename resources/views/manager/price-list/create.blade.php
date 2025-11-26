@extends('components.layouts.manager.index')
@section('content')
    @extends('components.layouts.manager.index')
    @section('content')
        <div class="card mt-5">
            <div class="card-header">
                اضافه کردن مقاله جدید
            </div>
            <div class="card-body">
                <form
                    action="{{route('manager.price-list.store')}}"
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
                                   placeholder="نام لیست قیمت"
                                   value="{{ old('name') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره</button>
                </form>
            </div>
        </div>

@endsection
