@php
$isHomePage = request()->is('/');
@endphp

<x-layout>
  <title>Tentang</title>
  @vite('resources/css/app.css')
  <x-navbar>
  </x-navbar>
  <div class="bg-gradient-to-b from-slate-200 to-sky-200 min-h-screen  dark:from-indigo-950 dark:to-slate-900 dark:text-slate-200 pt-20 w-full">
    <div class="my-7 px-8 max-w-screen-xl mx-auto">

      <!-- WELCOMING -->
      <div class="md:w-3/4 lg:w-3/5 mx-auto">
        <h1 class="text-3xl text-center font-semibold">Welcome to <span class="font-bold text-gradient-light dark:text-gradient-dark">MathEdge!</span></h1>
        <p class="tracking-wide leading-loose py-8 text-center">
          MathEdge adalah platform pembelajaran matematika yang dirancang khusus
          untuk siswa SMA. Dengan pendekatan yang interaktif dan metode yang
          inovatif, MathEdge berkomitmen untuk membuat matematika lebih
          mudah dan menyenangkan.
        </p>
      </div>

      <!-- WHY CHOOSE MATHEDGE -->
      <h1 class="text-3xl text-center font-semibold py-10">Why Choose <span class="font-bold text-gradient-light dark:text-gradient-dark">MathEdge?</span></h1>
      <div class="snap-x flex gap-6 snap-mandatory h-screen/2 w-72 p-4 mx-auto overflow-scroll md:w-3/4 lg:w-fit lg:overflow-hidden">
        <div class="snap-start p-8 bg-gradient-to-r shadow-md from-indigo-300 to-sky-300 dark:from-teal-500 dark:to-cyan-500 rounded-xl w-80 lg:w-72 flex-shrink-0 h-screen/2 flex flex-col items-center justify-center">
          <lottie-player alt="lottie-animation player" src="https://lottie.host/d2809d88-ecc4-4bc2-884f-855dc1fe91d3/Bjadr7lTs3.json" background="##FFFFFF" speed="1" style="max-width: 300px; height: 200px" loop autoplay direction="1" mode="normal"></lottie-player>
          <p class="text-xl tracking-wide text-center font-semibold dark:text-slate-950">
            Materi pembelajaran yang komprehensif dan mudah dimengerti
          </p>
        </div>
        <div class="snap-start p-8 bg-gradient-to-r shadow-md from-sky-300 to-cyan-300 dark:from-sky-500 dark:to-blue-500 rounded-xl w-80 lg:w-72 flex-shrink-0 h-screen/2 flex flex-col items-center justify-center">
          <lottie-player alt="lottie-animation player" src="https://lottie.host/1dd389ee-6015-42ee-accb-e036bb954032/Elw6rum7um.json" background="##FFFFFF" speed="1" style="max-width: 300px; height: 200px" loop autoplay direction="1" mode="normal"></lottie-player>
          <p class="text-xl tracking-wide text-center font-semibold dark:text-slate-950">Pengalaman belajar yang menyenangkan dan efektif</p>
        </div>
        <div class="snap-start p-8 bg-gradient-to-r shadow-md from-cyan-300 to-blue-300 dark:from-indigo-500 dark:to-violet-500 rounded-xl w-80 lg:w-72 flex-shrink-0 h-screen/2 flex flex-col items-center justify-center">
          <lottie-player alt="lottie-animation player" src="https://lottie.host/ed6d53ef-df0b-49fd-b24c-a5982fb44071/VpJIaDOqar.json" background="##ffffff" speed="1" style="max-width: 300px; height: 200px" loop autoplay direction="1" mode="normal"></lottie-player>
          <p class="text-xl tracking-wide text-center font-semibold dark:text-slate-950">
            Latihan soal yang efektif dalam meningkatkan kemampuan siswa
          </p>
        </div>
      </div>
    </div>

    <!-- LINK TO HOME -->
    <div class="max-w-screen-xl mx-auto my-20">
      <div class="flex flex-col items-center gap-5">
        <h1 class="text-3xl text-center font-semibold leading-relaxed">Edge up your <br><span class="font-bold text-gradient-light dark:text-gradient-dark">Math Skills!</span></h1>
        <a href="{{ $isHomePage ? '#daftarbab' : url('/#daftarbab') }}" class="px-5 py-4 border-2 border-slate-900 text-slate-900 dark:border-slate-50 dark:text-slate-50 rounded-2xl text-xl text-center font-bold w-fit hover:border-slate-600 hover:text-slate-600 dark:hover:border-slate-400 dark:hover:text-slate-400">Start for free <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>

    <!-- MATHEDGE VISION -->
    <div class="rounded-t-3xl bg-gradient-to-br from-blue-300 via-cyan-200 to-teal-500 dark:from-indigo-950 dark:via-violet-900 dark:to-purple-900">
      <div class="px-8 py-12 max-w-screen-xl mx-auto">
        <div class="flex flex-col md:pb-10">
          <div class="text-center">
            <h1 class="text-2xl font-semibold leading-relaxed">Empowering High School Math Learning <br>With <span class="font-bold text-gradient-light dark:text-gradient-dark">MathEdge</span></h1>
          </div>
          <div class="flex flex-col md:flex-row-reverse md:gap-10 md:items-center md:justify-center">
            <div>
              <lottie-player alt="lottie-animation player" src="https://lottie.host/c78cfe5e-62dc-4460-8f4a-3d3e0936a2ff/nfJjW5sWCc.json" background="##FFFFFF" speed="1" style="max-width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
            </div>
            <div class="flex flex-col md:w-1/2">
              <h1 class="text-lg text-blue-500 mt-12 font-semibold">OUR SHARED VISION</h1>
              <h3 class="text-2xl font-bold py-3">Transforming Mathematical Learning for the Future</h3>
              <p class="leading-loose tracking-wide">Kami membayangkan masa depan di mana setiap siswa dapat menguasai matematika dan mencapai keberhasilan akademis. Visi kami adalah menciptakan platform yang memudahkan pemahaman matematika sambil membuat belajar menjadi pengalaman yang menyenangkan dan memotivasi.</p>
            </div>
          </div>

          <div class="flex flex-col md:flex-row md:gap-10 md:items-center md:justify-center">
            <div>
              <lottie-player alt="lottie-animation player" src="https://lottie.host/4ebd32d4-1447-4f7a-b882-86f1dd323e25/9A3Jxrk5a4.json" background="##FFFFFF" speed="1" style="max-width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
            </div>
            <div class="flex flex-col md:w-1/2">
              <h1 class="text-lg text-blue-500 mt-12 font-semibold">OUR COMMITMENT</h1>
              <h3 class="text-2xl font-bold py-3">Dedication to Quality Education and Student Success</h3>
              <p class="leading-loose tracking-wide">Kami berkomitmen menyediakan materi pembelajaran yang berkualitas tinggi dan relevan dengan kurikulum terbaru. Kami juga siap mendukung setiap siswa dalam perjalanan mereka menguasai matematika, menciptakan lingkungan belajar yang inklusif dan memberdayakan.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <x-footer></x-footer>
  </div>
</x-layout>



<!-- 

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/4ebd32d4-1447-4f7a-b882-86f1dd323e25/9A3Jxrk5a4.json" background="##FFFFFF" speed="1" style="max-width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>



<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/c78cfe5e-62dc-4460-8f4a-3d3e0936a2ff/nfJjW5sWCc.json" background="##FFFFFF" speed="1" style="max-width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>



-->