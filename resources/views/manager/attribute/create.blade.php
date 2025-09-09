@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">اضافه کردن ویژگی</h3>
        </div>
        <div class="card-body">
            <form action="{{route('manager.attribute.store')}}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        نام مقدار
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid state-invalid @enderror "
                               placeholder="نام ویژگی باید منحصر به فرد باشد"
                               value="{{old('name')}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        ایکون svg
                        @error('icon') <span class="text-danger">{{$message}}</span> @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="icon"
                               class="form-control @error('icon') is-invalid state-invalid @enderror "
                               placeholder="حتما باید svg باشد"
                               value="{{old('icon')}}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">ذخیره ویژگی</button>

            </form>
        </div>
    </div>
@endsection
