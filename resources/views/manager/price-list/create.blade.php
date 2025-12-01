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
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        تگ
                        @error('tag') <span class="text-danger">{{$message}}</span> @enderror
                    </label>
                    <div class="col-md-9">
                        <select
                            name="tag[]"
                            multiple
                            class="form-control select2-show-search" data-placeholder="انتخاب تگ">
                            <option value="">انتخاب تگ</option>
                            @foreach($tags as $tag)
                                <option

                                    value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره</button>
            </form>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $('.select2-show-search').select2({
            minimumResultsForSearch: ''
        });
    </script>
@endpush
