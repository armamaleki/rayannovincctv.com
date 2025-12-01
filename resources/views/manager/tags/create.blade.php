@extends('components.layouts.manager.index')
@section('content')
    <div class="card-header">
        <h3 class="card-title">اضافه کردن تگ</h3>
    </div>
    <div class="card-body">
        <form action="{{route('manager.tags.store')}}" method="post">
            @csrf
            <div class="mb-3 row">
                <label class="col-md-3 form-label">
                    نام تک
                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </label>
                <div class="col-md-9">
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid state-invalid @enderror "
                           placeholder="نام تگ باید منحصر به فرد باشد"
                           value="{{old('name')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">ذخیره</button>

        </form>
    </div>
@endsection
