<x-layout>
  <title>Belajar Matematika - Daftar Bab</title>
  <x-navbar></x-navbar>
  <div class="pt-16 pb-6">
    <div class="flex justify-between max-w-screen-xl mx-auto mt-12 px-20 items-center gap-16">
      <div>
        <h1 class="text-3xl mb-6 font-medium dark:text-slate-200">
          Belajar Matematika dengan Metode yang Menarik dan Inovatif
        </h1>
        <p class="text-xl font-normal mb-10 tracking-normal dark:text-slate-300">
          Matematika SMA kini lebih mudah dengan panduan langkah demi
          langkah dan latihan soal yang variatif.
        </p>
        <a href="#daftarbab" class="align-middle rounded-md text-white bg-gradient-to-r from-sky-900 to-sky-700 border-none hover:from-sky-800 hover:to-sky-600 shadow-lg font-semibold px-6 py-3.5 border mx-px text-lg ease-in-out duration-100  dark:from-sky-300 dark:to-indigo-400 dark:hover:from-sky-200 dark:hover:to-indigo-300 dark:text-slate-900">Belajar Sekarang</a>
      </div>
      <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

      <dotlottie-player src="https://lottie.host/b5425845-8ce5-4098-8df5-e47247037bc9/gK4p8iz2K0.json" background="transparent" speed="1" style="width: 600px; height: 400px" loop autoplay></dotlottie-player>
    </div>
  </div>
  <div class="pt-16 pb-6 rounded-t-3xl bg-slate-200 shadow-inner shadow-blue-500/40 min-h-screen dark:bg-neutral-800 dark:shadow-indigo-800">
    <main id="daftarbab" class="flex flex-col px-4 py-8 max-w-screen-xl mx-auto">
      <h1 class="text-3xl font-bold text-center mb-8 dark:text-neutral-100">Daftar Bab</h1>
      <div class="flex gap-4">
        <div class="w-full bg-white shadow-md rounded-md px-4 py-5 dark:bg-neutral-700">
          <h2 class="text-xl font-bold dark:text-white">Kelas 10</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 10)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-xl font-small text-gray-800 dark:text-neutral-200 hover:text-blue-300 dark:hover:text-neutral-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2"></p>
          @endif
          @endforeach
        </div>

        <div class="w-full bg-white shadow-md rounded-md px-4 py-5 dark:bg-neutral-700">
          <h2 class="text-xl font-bold dark:text-white">Kelas 11</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 11)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-xl font-small text-gray-800 dark:text-neutral-200 hover:text-blue-300 dark:hover:text-neutral-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2"></p>
          @endif
          @endforeach
        </div>

        <div class="w-full bg-white shadow-md rounded-md px-4 py-5 dark:bg-neutral-700">
          <h2 class="text-xl font-bold dark:text-white">Kelas 12</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 12)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-xl font-small text-gray-800 dark:text-neutral-200 hover:text-blue-300 dark:hover:text-neutral-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2"></p>
          @endif
          @endforeach
        </div>
      </div>
    </main>
  </div>

</x-layout>