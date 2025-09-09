@extends('components.layouts.manager.index')
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">ویرایش مقدار : {{$value->name}}</h3>
        </div>
        <div class="card-body">
            <form action="{{route('manager.value.update' , $value)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        نام مقدار
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid state-invalid @enderror "
                               placeholder="نام مقدار باید منحصر به فرد باشد"
                               value="{{$value->name}}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">ذخیره تغییرات</button>

            </form>
        </div>
    </div>
@endsection
