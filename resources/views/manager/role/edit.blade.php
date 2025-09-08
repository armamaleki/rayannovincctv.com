@extends('components.layouts.manager.index')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">ویرایش دسترسی</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('manager.role.update', $role->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        نام دسترسی
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="col-md-9">
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid state-invalid @enderror"
                               placeholder="نام دسترسی باید منحصر به فرد باشد"
                               value="{{ old('name', $role->name) }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-3 form-label">
                        دسترسی
                        @error('permission')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="selectgroup col-md-9 selectgroup-pills">
                        @foreach($permission as $permi)
                            <label for="perm-{{ $permi->id }}" class="selectgroup-item">
                                <input
                                    id="perm-{{ $permi->id }}"
                                    type="checkbox"
                                    name="permission[]"
                                    value="{{ $permi->name }}"
                                    class="selectgroup-input"
                                    {{ in_array($permi->name, old('permission', $role->permissions->pluck('name')->toArray())) ? 'checked' : '' }}>
                                <span class="selectgroup-button">{{ $permi->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">
                    بروزرسانی دسترسی
                </button>
            </form>
        </div>
    </div>
@endsection
