<x-layout>
    <title>Belajar Matematika - {{ $subbab->subbabJudul }}</title>
    <script id="MathJax-script" async src="{{asset('js/mathjax/tex-chtml.js')}}"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script src="{{ asset('js/subbabScript.js') }} "></script>

    <!-- SANGAT TERPAKSA MENGGUNAKAN CDN KARENA HARUS BUILD SETIAP KALI MUNCUL DARI JAVASCRIPT :'(-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            content: ["./resources/**/*.blade.php"],
            theme: {
                extend: {
                    fontFamily: {
                        inter: ["Inter"],
                    },
                },
            },
            plugins: [],
            darkMode: "class",
        }
    </script>

    <link rel="stylesheet" href="{{ asset('css/filament/popup.css') }} ">
    </link>
    <meta name="jumlahSoal" content="{{ $subbab->soals->count() }}">


    <div type="hidden" id="modal" data-sad_emoji="{{ url('lottie/sad_emoji.lottie') }}" data-happy_emoji="{{ url('lottie/happy_emoji.lottie') }}" data-strong_emoji="{{ url('lottie/strong_emoji.lottie') }}">
    </div>

    <x-navbar />
    <div id="main" class=" min-h-screen bg-gradient-to-b from-neutral-200 to-neutral-300 dark:from-neutral-950 dark:to-indigo-950 py-20">
        <div class="container mx-auto p-6 bg-neutral-100 dark:bg-neutral-900">

            <div class="flex justify-between items-center mb-6">
                <a href="{{ url('/bab/' . $subbab->bab->slug) }}" class="text-neutral-500 text-base lg:text-lg font-semibold p-2 rounded-lg hover:text-neutral-800 hover:bg-neutral-300 dark:text-neutral-400 dark:hover:text-neutral-200 dark:hover:bg-zinc-800"><i class="fa-solid fa-circle-arrow-left mr-3"></i>Kembali</a>

                @if ($nextSubbab)
                <a href="{{ url('/subbab/' . $nextSubbab->slug) }}" class="text-neutral-500 text-base lg:text-lg font-semibold p-2 rounded-lg hover:text-neutral-800 hover:bg-neutral-300 dark:text-neutral-400 dark:hover:text-neutral-200 dark:hover:bg-zinc-800">Selanjutnya<i class="fa-solid fa-circle-arrow-right ml-3"></i></i></a>
                @else
                <p class="justify-self-end text-center text-neutral-600 dark:text-neutral-400">Tidak ada subbab selanjutnya</p>
                @endif
            </div>



            <div class="content bg-white shadow-md rounded-lg p-6 mb-6 dark:text-white dark:bg-zinc-700">
                <h1 class="text-3xl font-bold text-center dark:text-neutral-100 mb-6">{{ $subbab->subbabJudul }}</h1>
                <div class="flex justify-between items-center mb-6">
                    @if ($tags)
                    <div class="flex flex-wrap mb-4 items-center md:px-7 lg:px-12 xl:px-20">
                        @foreach ($tags as $tag)
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- BAGIAN ISI SUBBAB, BISA DIISI DENGAN TAILWINDCSS YANG BELUM DIBUILD -->
                <div class="w-full overflow-hidden text-wrap md:text-lg md:px-7 lg:text-xl lg:px-12 xl:px-20 text-zinc-700 dark:text-zinc-200">
                    {!! $subbab->subbabIsi !!}
                </div>

                <!-- BAGIAN PEMBUAT DAN TANGGAL PEMBUATAN-->
                <div class="flex justify-end items-center bg-white dark:bg-zinc-700 p-4 rounded-lg mt-8">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-x-0 sm:space-x-4 bg-white dark:bg-zinc-700 p-4 rounded-lg shadow-md text-center">
                        <p class="text-lg italic font-medium text-neutral-900 dark:text-neutral-100">{{ $subbab->creator }}</p>
                        <p class="text-neutral-600 dark:text-neutral-400">Dibuat {{ $subbab->created_at->translatedFormat('d F Y') }}</p>
                        <p class="text-neutral-600 dark:text-neutral-400">{{ $subbab->created_at->diffForHumans() }}</p>
                    </div>
                </div>



            </div>
            <h2 class="text-2xl font-semibold mb-4 text-center dark:text-neutral-100">Soal Latihan</h2>
            <!-- BAGIAN SKOR -->
            <div class="flex mb-5">
                <div class="flex space-x-4 bg-white dark:bg-zinc-700 p-4 rounded-lg shadow-md">
                    <div class="font-semibold dark:text-neutral-50">Skor Anda : </div>
                    <div id="score" class="score-text ml-2 font-semibold dark:text-neutral-50">0</div>
                </div>
            </div>

            @if ($soals && count($soals) > 0)
            <div class="space-y-4 md:text-lg lg:text-xl">
                @foreach ($soals as $soal)
                <div class="soal bg-white flex shadow-md rounded-lg p-6 dark:text-white dark:bg-zinc-700 justify-between">
                    <div class="ml-0 lg:mx-20 text-wrap overflow-hidden">
                        <p class="mb-4">{!! $soal->soal !!}</p>
                        <form id="form-{{ $soal->id }}">
                            <ul class="space-y-2 text-zinc-700 dark:text-zinc-200">
                                <li class="flex items-center">
                                    <input type="radio" name="option" value="a" id="option_a_{{ $soal->id }}">
                                    <label id="label-a-{{ $soal->id }}" for="option_a_{{ $soal->id }}" class="ml-2 px-1">{!! $soal->option_a !!}</label>
                                </li>
                                <li class="flex items-center">
                                    <input type="radio" name="option" value="b" id="option_b_{{ $soal->id }}">
                                    <label id="label-b-{{ $soal->id }}" for="option_b_{{ $soal->id }}" class="ml-2 px-1">{!! $soal->option_b !!}</label>
                                </li>
                                <li class="flex items-center ">
                                    <input type="radio" name="option" value="c" id="option_c_{{ $soal->id }}">
                                    <label id="label-c-{{ $soal->id }}" for="option_c_{{ $soal->id }}" class="ml-2 px-1">{!! $soal->option_c !!}</label>
                                </li>
                                <li class="flex items-center">
                                    <input type="radio" name="option" value="d" id="option_d_{{ $soal->id }}">
                                    <label id="label-d-{{ $soal->id }}" for="option_d_{{ $soal->id }}" class="ml-2 px-1">{!! $soal->option_d !!}</label>
                                </li>
                            </ul>
                            <input type="hidden" name="correct_answer" value="{{ $soal->jawaban }}">
                            <div class="relative mt-5">
                                <button type="button" onclick="checkAnswer({{ $soal->id }});" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                            </div>
                        </form>
                        <div id="result-{{ $soal->id }}-text"></div>
                    </div>
                    <div class="self-start lg:absolute lg:justify-self-start">
                        <div id="result-{{ $soal->id }}" data-Right_Answer="{{ url('lottie/Right_Answer.lottie') }} " data-Wrong_Answer="{{ url('lottie/Wrong_Answer.lottie') }}" class="rounded"></div>
                    </div>
                </div>
                @endforeach

            </div>
            @else
            <p class="mt-6 text-center text-gray-600">Tidak ada Soal Latihan yang tersedia</p>
            @endif
        </div>
    </div>
</x-layout>