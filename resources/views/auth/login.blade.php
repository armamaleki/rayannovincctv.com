@extends('components/layouts/auth/index')
@section('content')
    <div class="min-h-screen bg-gray-950 py-6 flex flex-col justify-center sm:py-12 text-gray-50">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-gray-800 shadow-lg sm:rounded-3xl sm:p-20">

                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">ورود|ثبت نام</h1>
                    </div>
                    <livewire:auth.login/>
                </div>
            </div>
        </div>
    </div>
@endsection
