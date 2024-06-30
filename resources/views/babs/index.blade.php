<x-layout>
  <title>Belajar Matematika - Daftar Bab</title>
  @vite('resources/css/app.css', 'resources/js/app.js')
  <x-navbar></x-navbar>
  <div id="home" class="pt-16">
    <div class="flex flex-col">
      <div class="flex md:flex-row flex-col-reverse justify-between max-w-screen-xl mx-auto mt-12 items-center md:gap-16 gap-10 md:px-20 px-10 md:pb-0 pb-10">
        <div>
          <h1 class="lg:text-3xl text-2xl mb-6 font-medium dark:text-slate-200">
            Belajar Matematika dengan Metode yang Menarik dan Inovatif
          </h1>
          <p class="text-xl font-normal mb-10 tracking-normal dark:text-slate-300">
            Matematika SMA kini lebih mudah dengan panduan langkah demi
            langkah dan latihan soal yang variatif.
          </p>
          <a href="#daftarbab" class="align-middle rounded-md text-white bg-gradient-to-r from-slate-900 to-sky-900 border-none hover:from-slate-800 hover:to-sky-800 shadow-lg font-semibold px-6 py-3.5 border mx-px text-lg ease-in-out duration-100  dark:from-sky-300 dark:to-indigo-400 dark:hover:from-sky-200 dark:hover:to-indigo-300 dark:text-slate-900">Belajar Sekarang</a>
        </div>
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

        <dotlottie-player alt="Lottie-Animation Mengajar" src="https://lottie.host/b5425845-8ce5-4098-8df5-e47247037bc9/gK4p8iz2K0.json" background="transparent" speed="1" style="max-width: 600px; height: 400px" loop autoplay></dotlottie-player>
      </div>
      <div id="daftarbab" class="py-6 w-full"></div>
    </div>
  </div>
  <div class="pt-14 pb-6 rounded-t-3xl bg-slate-200 shadow-inner shadow-blue-500/40 min-h-screen bg-gradient-to-b from-neutral-100 to-sky-200 dark:from-neutral-950 dark:to-indigo-950 dark:shadow-indigo-800">
    <main class="flex flex-col px-8 lg:px-4 py-8 max-w-screen-xl mx-auto">
      <h1 class="text-3xl font-bold text-center mb-8 dark:text-neutral-100">Daftar Bab</h1>
      <div class="flex md:flex-row flex-col gap-4">
        <div class="w-full bg-white shadow-md rounded-md px-8 md:px-4 py-5 max-h-max pb-2 overflow-hidden dark:bg-zinc-700">
          <h2 class="text-xl font-bold text-center pb-3 border-b-2 border-neutral-300 mb-4 dark:text-white">Kelas 10</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 10)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-base lg:text-xl text-gray-800 dark:text-neutral-200 hover:text-blue-300 dark:hover:text-neutral-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2"></p>
          @endif
          @endforeach
        </div>

        <div class="w-full bg-white shadow-md rounded-md px-8 md:px-4 py-5 max-h-max pb-2 overflow-hidden dark:bg-zinc-700">
          <h2 class="text-xl font-bold text-center pb-3 border-b-2 border-neutral-300 mb-4 dark:text-white">Kelas 11</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 11)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-base lg:text-xl text-gray-800 dark:text-neutral-200 hover:text-blue-300 dark:hover:text-neutral-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2"></p>
          @endif
          @endforeach
        </div>

        <div class="w-full bg-white shadow-md rounded-md px-8 md:px-4 py-5 max-h-max pb-2 overflow-hidden dark:bg-zinc-700">
          <h2 class="text-xl font-bold text-center pb-3 border-b-2 border-neutral-300 mb-4 dark:text-white">Kelas 12</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 12)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-base lg:text-xl text-gray-800 dark:text-neutral-200 hover:text-blue-300 dark:hover:text-neutral-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2"></p>
          @endif
          @endforeach
        </div>
      </div>
    </main>
  </div>
  <x-footer></x-footer>
</x-layout>