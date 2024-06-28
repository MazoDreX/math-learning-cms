<x-layout>
    <title>Belajar Matematika - {{ $subbab->subbabJudul }}</title>
    <script id="MathJax-script" async src="{{asset('js/mathjax/tex-chtml.js')}}"></script>

    <x-navbar />
    <div class="min-h-screen bg-gradient-to-b from-neutral-200 to-neutral-300 dark:from-neutral-950 dark:to-indigo-950 py-20">
        <div class="container mx-auto p-6 bg-neutral-100 dark:bg-neutral-900">

            <div class="flex justify-between items-center mb-6">
                <a href="{{ url('/bab/' . $subbab->bab->slug) }}" class="text-neutral-500 text-base lg:text-lg font-semibold p-2 rounded-lg hover:text-neutral-800 hover:bg-neutral-300 dark:text-neutral-400 dark:hover:text-neutral-200"><i class="fa-solid fa-circle-arrow-left mr-3"></i>Kembali</a>

                @if ($nextSubbab)
                <a href="{{ url('/subbab/' . $nextSubbab->slug) }}" class="text-neutral-500 text-base lg:text-lg font-semibold p-2 rounded-lg hover:text-neutral-800 hover:bg-neutral-300 dark:text-neutral-400 dark:hover:text-neutral-200">Selanjutnya<i class="fa-solid fa-circle-arrow-right ml-3"></i></i></a>
                @else
                <p class="text-neutral-600 dark:text-neutral-400">Tidak ada subbab selanjutnya</p>
                @endif
            </div>



            <div class="content bg-white shadow-md rounded-lg p-6 mb-6 dark:text-white dark:bg-zinc-700">
                <h1 class="text-3xl font-bold text-center dark:text-neutral-100 mb-6">{{ $subbab->subbabJudul }}</h1>
                <div class="flex justify-between items-center mb-6">
                    @if ($tags)
                    <div class="flex flex-wrap mb-4 items-center">
                        @foreach ($tags as $tag)
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- BAGIAN ISI SUBBAB -->
                 <div class="max-w-screen-xl overflow-auto text-wrap">
                {!! $subbab->subbabIsi !!}
                </div>


                <!-- BAGIAN PEMBUAT DAN TANGGAL PEMBUATAN-->
                <div class="flex justify-between items-center space-x-4 bg-white dark:bg-neutral-700 p-4 rounded-lg mt-8">
                    <div></div>
                    <div class="flex justify-between items-center space-x-4 bg-white dark:bg-neutral-700 p-4 rounded-lg shadow-md">
                        <p class="text-lg italic font-medium text-neutral-900 dark:text-neutral-100">{{ $subbab->creator }}</p>
                        <p class="text-neutral-600 dark:text-neutral-400">Dibuat {{ $subbab->created_at->translatedFormat('d F Y') }}</p>
                        <p class="text-neutral-600 dark:text-neutral-400">{{ $subbab->created_at->diffForHumans() }}</p>
                    </div>
                </div>


            </div>
            <h2 class="text-2xl font-semibold mb-4 text-center dark:text-neutral-100">Soal Latihan</h2>
            @if ($soals && count($soals) > 0)
            <div class="space-y-4 ">
                @foreach ($soals as $soal)
                <div class="soal bg-white shadow-md rounded-lg p-6 dark:text-white dark:bg-neutral-700">
                    <p class="mb-4">{!! $soal->soal !!}</p>
                    <form id="form-{{ $soal->id }}">
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <input type="radio" name="option" value="a" id="option_a_{{ $soal->id }}">
                                <label for="option_a_{{ $soal->id }}" class="ml-2">{!! $soal->option_a !!}</label>
                            </li>
                            <li class="flex items-center">
                                <input type="radio" name="option" value="b" id="option_b_{{ $soal->id }}">
                                <label for="option_b_{{ $soal->id }}" class="ml-2">{!! $soal->option_b !!}</label>
                            </li>
                            <li class="flex items-center">
                                <input type="radio" name="option" value="c" id="option_c_{{ $soal->id }}">
                                <label for="option_c_{{ $soal->id }}" class="ml-2">{!! $soal->option_c !!}</label>
                            </li>
                            <li class="flex items-center">
                                <input type="radio" name="option" value="d" id="option_d_{{ $soal->id }}">
                                <label for="option_d_{{ $soal->id }}" class="ml-2">{!! $soal->option_d !!}</label>
                            </li>
                        </ul>
                        <input type="hidden" name="correct_answer" value="{{ $soal->jawaban }}">
                        <button type="button" onclick="checkAnswer({{ $soal->id }});" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                    </form>
                    <div id="result-{{ $soal->id }}" class="mt-2 p-4 rounded"></div>
                </div>
                @endforeach
            </div>
            @else
            <p class="mt-6 text-center text-gray-600">Tidak ada Soal Latihan yang tersedia</p>
            @endif
        </div>
    </div>

    <script>
        MathJax = {
            tex: {
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ]
            }
        };

        function checkAnswer(soalId) {
            const form = document.getElementById(`form-${soalId}`);
            const formData = new FormData(form);
            const selectedOption = formData.get('option');
            const correctAnswer = form.querySelector('input[name="correct_answer"]').value;

            const resultDiv = document.getElementById(`result-${soalId}`);
            if (selectedOption) {
                if (selectedOption === correctAnswer) {
                    resultDiv.innerHTML = `<p class="correct text-green-500">Jawaban Anda benar!</p>`;
                } else {
                    resultDiv.innerHTML = `<p class="incorrect text-red-500">Jawaban Anda salah. Jawaban yang benar adalah ${correctAnswer.toUpperCase()}.</p>`;
                }
            } else {
                resultDiv.innerHTML = `<p class="incorrect text-red-500">Anda belum memilih jawaban.</p>`;
            }


            // Menonaktifkan semua input radio setelah submit
            const radioButtons = form.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(button => {
                button.disabled = true;
            });

            // Menonaktifkan tombol submit setelah submit
            const submitButton = form.querySelector('button[type="button"]');
            submitButton.disabled = true;
        }
    </script>

</x-layout>