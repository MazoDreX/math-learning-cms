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
            resultDiv.innerHTML = `
            <style>
                .animation  {
                    transform: rotate(-25deg);
                    bottom: 300px;
                }
                .correct {
                    bottom: 300px;
                }
            </style>

            <div class="absolute left-1/4">
            <div class="animation relative pto-1/4">
                    <dotlottie-player src="https://lottie.host/4534dc28-67aa-4b3c-ac13-6084a4616b44/tUuRDS7CA1.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
            </div>
            <p class="correct relative text-green-500 text-center">Jawaban Anda benar!</p>
                
            </div>`;
        } else {
            resultDiv.innerHTML = `
            <style>
                .animation  {
                    transform: rotate(-25deg);
                    bottom: 300px;
                }
                .incorrect {
                    bottom: 300px;
                }
            </style>
            
            <div class="absolute left-1/4">
            <div class="animation relative pto-1/4">
                    <dotlottie-player src="https://lottie.host/81af2645-0383-45b4-9a02-403e911699e2/SA4uDlaJh7.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
            </div>
            
            <p class="incorrect relative text-red-500">Jawaban Anda salah. Jawaban yang benar adalah ${correctAnswer.toUpperCase()}.</p>
            </div>
            `;
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