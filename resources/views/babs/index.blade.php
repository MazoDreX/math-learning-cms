<x-layout>
  <title>Belajar Matematika - Daftar Bab</title>
<x-navbar></x-navbar>
<div class="flex flex-col min-h-screen bg-gray-100 dark:bg-neutral-900">
    <!-- <header class="bg-white dark:bg-gray-800 shadow-md px-4 py-5 flex justify-between items-center">
    <a href="/" class=" text-xl font-bold text-gray-800 dark:text-gray-100">Belajar Matematika</a>
      <nav class="space-x-4">
        <button id="toggleDarkMode" class="text-gray-600 hover:text-gray-800 dark:text-gray-200 dark:hover:text-gray-100">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 0 1-9 9m-9-9a9 9 0 0 0 9-9" />
          </svg>
        </button>
        <a href="/admin" class="text-gray-600 hover:text-gray-800 dark:text-gray-200 dark:hover:text-gray-100">Admin</a>
      </nav>
    </header> -->
    
    <main class="flex-grow px-4 py-8">
      <h1 class="text-3xl font-bold text-center mb-8 dark:text-neutral-100">Daftar Bab</h1>
      <div class="grid grid-cols-3 gap-4">
        <div class="bg-white shadow-md rounded-md px-4 py-5 hover:shadow-lg dark:bg-neutral-700">
          <h2 class="text-xl font-bold dark:text-white">Kelas 10</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 10)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-xl font-small text-gray-800 dark:text-neutral-200 hover:text-neutral-600 dark:hover:text-neutral-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2"></p>
          @endif
          @endforeach
        </div>

        <div class="bg-white shadow-md rounded-md px-4 py-5 hover:shadow-lg dark:bg-neutral-700">
          <h2 class="text-xl font-bold dark:text-white">Kelas 11</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 11)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-xl font-medium text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2">Kelas {{$bab->kelas}}</p>
          @endif
          @endforeach
        </div>

        <div class="bg-white shadow-md rounded-md px-4 py-5 hover:shadow-lg dark:bg-neutral-700">
          <h2 class="text-xl font-bold dark:text-white">Kelas 12</h2>
          @foreach ($babs as $bab)
          @if ($bab->kelas == 12)
          <a href="{{url('/bab/' . $bab->slug)}}" class="text-xl font-medium text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">
            {{$bab->judul}}
          </a>
          <p class="text-gray-600 dark:text-gray-400 mt-2">Kelas {{$bab->kelas}}</p>
          @endif
          @endforeach
        </div>
      </div>
    </main>
  </div>

</x-layout>