<x-layout>
  <title>Bab {{ $bab->judul }}</title>
  <x-navbar></x-navbar>
  <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- <header class="bg-white dark:bg-gray-800 shadow-md px-4 py-5 flex justify-between items-center">
    <a href="/" class="text-xl font-bold text-gray-800 dark:text-gray-100">Belajar Matematika</a>
      <nav class="space-x-4">
        <button id="toggleDarkMode" class="text-gray-600 hover:text-gray-800 dark:text-gray-200 dark:hover:text-gray-100">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 0 1-9 9m-9-9a9 9 0 0 0 9-9" />
          </svg>
        </button>
        <a href="/admin" class="text-gray-600 hover:text-gray-800 dark:text-gray-200 dark:hover:text-gray-100">Admin</a>
      </nav>
    </header> -->
  


    <h1 class="text-3xl font-bold text-center mb-8 my-6 dark:text-gray-100">{{ $bab->judul }}</h1>
    @if($subbabs && count($subbabs) > 0)
    <div class="grid grid-cols-2 gap-4 place-content-center h-25">
        @foreach ($subbabs as $subbab)
            <div class="bg-white shadow-md rounded-lg p-4 place-items-center">
                <a class="text-center" href="{{ url('/subbab/' . $subbab->slug) }}" >
                    <div class="flex flex-col">
                        <h3 class="font-bold">{{ $subbab->subbabJudul }}</h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@else
    <p class="mt-6 text-gray-600">Tidak ada subbab yang tersedia.</p>
@endif
</div>
</x-layout>