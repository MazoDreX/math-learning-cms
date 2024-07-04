<x-layout>
  <title>Bab {{ $bab->judul }}</title>
  @vite('resources/css/app.css')
  <x-navbar></x-navbar>
  <div class="flex flex-col min-h-screen py-20 bg-gradient-to-b from-neutral-100 to-sky-200 dark:from-neutral-950 dark:to-indigo-950">
    <h1 class="text-3xl font-bold text-center mb-8 my-6 dark:text-neutral-100">{{ $bab->judul }}</h1>
    @if($subbabs && count($subbabs) > 0)
    <div class="flex flex-col items-center gap-6">
      @foreach ($subbabs as $subbab)
      <div class="bg-white w-2/3 dark:text-gray-200 dark:bg-zinc-700 shadow-md rounded-lg p-4 place-items-center">
        <a class="text-center" href="{{ url('/subbab/' . $subbab->slug) }}">
          <div class="flex flex-col">
            <h3 class="font-bold">{{ $subbab->subbabJudul }}</h3>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    @else
    <p class="mt-6 mx-auto text-gray-600">Tidak ada subbab yang tersedia.</p>
    @endif
  </div>
</x-layout>