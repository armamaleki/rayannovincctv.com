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
                    action="{{route('manager.price-list.update' , $priceList)}}"
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
                                   placeholder="نام لیست قیمت"
                                   value="{{ $priceList->name }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-5">ذخیره</button>
                </form>
                <div class="row mt-4">
                    <div class="col">
                        <div class="mb-3">
                            <h2>لیست قیمت (دقت کنید حتما pdf باشه چیز دیگه ای نباشه )</h2>
                            <div class="form-label">
                                حد اکثر اندازه برای بارگزاری 20 مگابایت میباشد.
                                @error('price_list')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <form action="{{ route('manager.price-list.price_list'  , $priceList) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="price_list" accept=".pdf,application/pdf">
                                <button
                                    class="btn btn-primary"
                                    type="submit">آپلود
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        @if($priceList->getFirstMediaUrl('price_list'))
                            <a href="{{ $priceList->getFirstMediaUrl('price_list') }}" target="_blank"
                               class="btn btn-primary">
                                دانلود لیست قیمت
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

@endsection
