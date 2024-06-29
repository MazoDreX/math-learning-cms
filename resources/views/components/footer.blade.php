@php
$isHomePage = request()->is('/');
@endphp
@vite('resources/css/app.css', 'resources/js/app.js')
<div class="bg-slate-900 dark:bg-slate-950">
    <div class="flex flex-col items-center gap-5 max-w-screen-xl mx-auto pt-8 pb-6">
        <div class="w-full flex justify-around items-center">
            <h1 class="text-xl select-none tracking-wide font-semibold text-cyan-600 dark:text-gradient-dark md:text-2xl lg:text-3xl">MathEdge</h1>
            <div class="flex flex-col text-base gap-2 text-slate-300">
                <a href="{{ $isHomePage ? '#home' : url('/#home') }}" class="hover:text-slate-400">Home</a>
                <a href=" {{ route('about') }}" class="hover:text-slate-400">About</a>
                <a href="{{ $isHomePage ? '#daftarbab' : url('/#daftarbab') }}" class="hover:text-slate-400">Learn Now</a>
            </div>
        </div>
        <div>
            <p class=" text-base text-slate-400 select-none">Copyright &copy; 2024 MathEdge</p>
        </div>
    </div>
</div>