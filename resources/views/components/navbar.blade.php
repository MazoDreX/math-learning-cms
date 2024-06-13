<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->


    <nav class="bg-white-800 dark:bg-neutral-900" x-data="{ isOpen: false }"  >
        <div x-data="{ isOn : false}" >
            <div
            x-data="{ currentPage: '{{ Route::currentRouteName() }}' }"
            >
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div  class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button @click="isOn = !isOn" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-white-400 dark:text-neutral-400 dark:hover:text-white hover:bg-neutral-700 hover:text-white  focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg :class="{'hidden': isOn, 'block': !isOn }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg :class="{'block': isOn, 'hidden': !isOn }"
          class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div  class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto" src="{{ asset('/images/math-icon.png') }}" alt="Belajar Matematika">
        </div>
        <div  class="hidden sm:ml-6 sm:block">
          <div
          class="flex space-x-4">
            <!-- Current: "bg-neutral-900 text-white", Default: "text-neutral-300 hover:bg-neutral-700 hover:text-white" -->
            <a href="{{ route('index') }}" 
            :class="currentPage === 'index' ? 'bg-neutral-900 text-white dark:bg-neutral-700' :  'text-neutral-900 hover:bg-neutral-700 hover:text-white dark:text-neutral-200 dark:hover:text-neutral-100'"
            :aria-current="currentPage === 'index' ? 'page' : false"
            class="rounded-md px-3 py-2 text-sm font-medium">Home</a>

            <a href="{{ route('about') }}" 
            :class="currentPage === 'about' ? 'bg-neutral-900 text-white dark:bg-neutral-700' :  'text-neutral-900 hover:bg-neutral-700 hover:text-white dark:text-neutral-200 dark:hover:text-neutral-100'"
            :aria-current="currentPage === 'about' ? 'page' : false"
            class="rounded-md px-3 py-2 text-sm font-medium">Tentang</a>

            

          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <div>
          <button @click="darkMode = !darkMode; localStorage.setItem('dark_mode', darkMode)" type="button" class="btn btn-secondary relative rounded-full  p-1 text-neutral-400 dark:text-neutral-400 dark:hover:text-neutral-300 hover:text-neutral-900 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-neutral-800" title="DarkMode">
              <span class="absolute -inset-1.5"></span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
              </svg>
          </button>

          <button @click="isOpen = !isOpen" type="button" class="relative rounded-full  p-1 text-neutral-400 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-neutral-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Login</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
              </svg>

          </button>
            
          </div>

          <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
          <div 
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"

            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-neutral-100", Not Active: "" -->
            <a href="/admin" class="block px-4 py-2 text-sm text-neutral-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div  class="sm:hidden" id="mobile-menu">
    <div 
    x-show="isOn"
    x-transition:enter="transition ease-out duration-100 transform"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75 transform"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-white-900 text-white", Default: "text-white-300 hover:bg-white-700 hover:text-white" -->
      <a href="{{ route('index') }}" 
        :class="currentPage === 'index' ? 'bg-neutral-900 text-white dark:bg-neutral-700' :  'text-white-300 hover:bg-neutral-700 hover:text-white dark:text-neutral-200 dark:hover:text-neutral-100'"
        :aria-current="currentPage === 'index' ? 'page' : false"
        class="block rounded-md px-3 py-2 text-base font-medium">Home</a>
      <a href="{{ route('about') }}" 
        :class="currentPage === 'about' ? 'bg-neutral-900 text-white dark:bg-neutral-700' :  'text-white-300 hover:bg-neutral-700 hover:text-white dark:text-neutral-200 dark:hover:text-neutral-100'"
        :aria-current="currentPage === 'about' ? 'page' : false"
        class="block rounded-md px-3 py-2 text-base font-medium">Tentang</a>
    </div>
  </div>
</div>
</div>
</nav>

</div>