MathJax = {
    tex: {
        inlineMath: [
            ['$', '$'],
            ['\\(', '\\)']
        ]
    }
};


document.addEventListener("DOMContentLoaded", function() {


const totalSoal = document.querySelector('meta[name="jumlahSoal"]').content;
let jawabanBenar = 0;
let jawabanSalah = 0;
let soalTerjawab = 0;

window.checkAnswer = function(soalId) {
    console.log("TOTAL SOAL = " ,totalSoal);
    const form = document.getElementById(`form-${soalId}`);
    const formData = new FormData(form);
    const selectedOption = formData.get('option');
    const correctAnswer = form.querySelector('input[name="correct_answer"]').value;

    const resultDiv = document.getElementById(`result-${soalId}`);
    const resultDivText = document.getElementById(`result-${soalId}-text`);
    if (selectedOption) {
        if (selectedOption === correctAnswer) {
            resultDiv.innerHTML = `
            <dotlottie-player src="https://lottie.host/4534dc28-67aa-4b3c-ac13-6084a4616b44/tUuRDS7CA1.json" background="transparent" speed="1" style="width: 100px; height: auto;" loop autoplay></dotlottie-player>
            `;
            resultDivText.innerHTML = '<p class="correct relative text-green-500">Jawaban Anda benar!</p>';
            jawabanBenar++;
            console.log("JAWABAN BENAR = " ,jawabanBenar);
        } else {
            resultDiv.innerHTML = `
            <dotlottie-player src="https://lottie.host/922162ff-92fc-4428-9034-680ebff8347f/M0GBi9Zx4k.json" background="transparent" speed="0.75" style="width: 100px; height: auto;" loop autoplay></dotlottie-player>
            `;
            resultDivText.innerHTML = `<p class="incorrect relative text-red-500">Jawaban Anda salah. Jawaban yang benar adalah ${correctAnswer.toUpperCase()}.</p>`;
            jawabanSalah++;
            console.log("JAWABAN SALAH = " ,jawabanSalah);
        }
        soalTerjawab++;
        console.log( "SOAL TERJAWAB = " ,soalTerjawab);
    } else {
        resultDiv.innerHTML = `<p class="incorrect text-red-500">Anda belum memilih jawaban.</p>`;
    }


    // Menonaktifkan semua input radio setelah submit
    const radioButtons = form.querySelectorAll('input[type="radio"]');
    if (selectedOption) {
        radioButtons.forEach(button => {
            button.disabled = true;
        });
    }

    // Menonaktifkan tombol submit setelah submit
    const submitButton = form.querySelector('button[type="button"]');
    if (selectedOption) {
        submitButton.disabled = true;
    }

    if (soalTerjawab == totalSoal) {
        console.log("SELESAI, KODE MENCAPAI BLOK AKHIR");
        showScore();
    }
    
}

function showScore() {
    const scoreDiv = document.getElementById('score');
    const scorePercentage = (jawabanBenar / totalSoal) * 100;
    scoreDiv.innerHTML = `${jawabanBenar}/${totalSoal} (${scorePercentage.toFixed(2)})`;
}

});

