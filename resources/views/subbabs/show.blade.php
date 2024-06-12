<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $subbab->subbabJudul }}</title> 
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/math-icon.png') }}">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    @vite('resources/css/app.css')
</head>
<body>
<div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
    <header class="bg-white dark:bg-gray-800 shadow-md px-4 py-5 flex justify-between items-center">
      <a href="/" class="text-xl font-bold text-gray-800 dark:text-gray-100">Belajar Matematika</a>
      <nav class="space-x-4">
        <button id="toggleDarkMode" class="text-gray-600 hover:text-gray-800 dark:text-gray-200 dark:hover:text-gray-100">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 0 1-9 9m-9-9a9 9 0 0 0 9-9" />
          </svg>
        </button>
        <a href="/admin" class="text-gray-600 hover:text-gray-800 dark:text-gray-200 dark:hover:text-gray-100">Admin</a>
      </nav>
    </header>
    

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">{{ $subbab->subbabJudul }}</h1>
        <div class="content bg-white shadow-md rounded-lg p-6 mb-6">
            {!! $subbab->subbabIsi !!}
        </div>
        <h2 class="text-2xl font-semibold mb-4 text-center">Soal Latihan</h2>
        @if ($soals && count($soals) > 0)
            <div class="space-y-4">
                @foreach ($soals as $soal)
                    <div class="soal bg-white shadow-md rounded-lg p-6">
                        <p class="mb-4">{!! $soal->soal !!}</p>
                        <form id="form-{{ $soal->id }}">
                            <ul class="space-y-2">
                                <li class="flex items-center">
                                    <input type="radio" name="option" value="a" id="option_a_{{ $soal->id }}">
                                    <label for="option_a_{{ $soal->id }}" class="ml-2">A. {{ $soal->option_a }}</label>
                                </li>
                                <li class="flex items-center">
                                    <input type="radio" name="option" value="b" id="option_b_{{ $soal->id }}">
                                    <label for="option_b_{{ $soal->id }}" class="ml-2">B. {{ $soal->option_b }}</label>
                                </li>
                                <li class="flex items-center">
                                    <input type="radio" name="option" value="c" id="option_c_{{ $soal->id }}">
                                    <label for="option_c_{{ $soal->id }}" class="ml-2">C. {{ $soal->option_c }}</label>
                                </li>
                                <li class="flex items-center">
                                    <input type="radio" name="option" value="d" id="option_d_{{ $soal->id }}">
                                    <label for="option_d_{{ $soal->id }}" class="ml-2">D. {{ $soal->option_d }}</label>
                                </li>
                            </ul>
                            <input type="hidden" name="correct_answer" value="{{ $soal->jawaban }}">
                            <button type="button" onclick="checkAnswer({{ $soal->id }});" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                        </form>
                        <div id="result-{{ $soal->id }}" class="mt-2 p-4 border rounded"></div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-6 text-gray-600">Tidak ada Soal Latihan yang tersedia</p>
        @endif
    </div>
    <script>
        MathJax = {
        tex: {inlineMath: [['$', '$'], ['\\(', '\\)']]}
        };

        function checkAnswer(soalId) {
        const form = document.getElementById(`form-${soalId}`);
        const formData = new FormData(form);
        const selectedOption = formData.get('option');
        const correctAnswer = form.querySelector('input[name="correct_answer"]').value;

        const resultDiv = document.getElementById(`result-${soalId}`);
        if (selectedOption){
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
</body>
</html>
