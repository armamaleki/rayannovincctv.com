@extends('components.layouts.app.index')
@section('content')
    @php
        $images = [
            '/assets/images/SLIDE_01.jpg',
            '/assets/images/SLIDE_02.jpg',
            '/assets/images/SLIDE_03.jpg',
        ];
    @endphp
    <div id="slider" class="relative w-full h-screen overflow-hidden bg-black">
        <div class="absolute z-20 top-0 left-0 w-full h-full bg-sky-400/20 "></div>
        <div class="absolute inset-0 flex">
            <div class="flex-1 border-l border-white/30 animate-pulse"></div>
            <div class="flex-1 border-l border-white/30 animate-pulse"></div>
            <div class="flex-1 border-l border-white/30 animate-pulse"></div>
            <div class="flex-1 border-l border-white/30 animate-pulse"></div>
        </div>
        @foreach ($images as $index => $img)
            <div class="slide absolute inset-0 transition-all duration-[5000ms] ease-linear
                {{ $index === 0 ? 'opacity-50 scale-100 z-10' : 'opacity-0 scale-110 z-0' }}">
                <img src="{{ $img }}"
                     alt="slide-{{ $index }}"
                     class="w-full h-full object-cover transform origin-center">
            </div>
        @endforeach
        <div class="container mx-auto relative h-screen p-2 flex flex-col items-center justify-center">
            <div class="absolute left-10 transform z-20 top-4/5">
                <div class="-rotate-90 origin-left text-white font-bold text-sm tracking-widest pl-6 flex items-center gap-2">
                    <p>SMART SOLUTIONS FOR <span class="text-yellow-400">YOUR SECURITY</span></p>
                    <span class="p-1 rounded-full bg-gray-50 h-fit w-25"></span>
                </div>

            </div>
            <div class="z-30 absolute ">
                Lorem ipsum dolor sit ame
            </div>
        </div>


    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('#slider .slide');
            let current = 0;
            setInterval(() => {
                slides[current].classList.remove('opacity-50', 'scale-100', 'z-10');
                slides[current].classList.add('opacity-0', 'scale-110', 'z-0');
                current = (current + 1) % slides.length;
                slides[current].classList.remove('opacity-0', 'scale-110', 'z-0');
                slides[current].classList.add('opacity-50', 'scale-100', 'z-10');
            }, 6000);
        });
    </script>
@endpush
