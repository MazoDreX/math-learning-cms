MathJax = {
    tex: {
        inlineMath: [
            ["$", "$"],
            ["\\(", "\\)"],
        ],
    },
};

document.addEventListener("DOMContentLoaded", function () {
    const totalSoal = document.querySelector('meta[name="jumlahSoal"]').content;
    let jawabanBenar = 0;
    let jawabanSalah = 0;
    let soalTerjawab = 0;

    window.checkAnswer = function (soalId) {
        console.log("TOTAL SOAL = ", totalSoal);
        const form = document.getElementById(`form-${soalId}`);
        const formData = new FormData(form);
        const selectedOption = formData.get("option");
        const correctAnswer = form.querySelector(
            'input[name="correct_answer"]'
        ).value;
        const result = document.getElementById(`result-${soalId}`);
        const right_answer = result.getAttribute("data-Right_Answer");

        const resultDiv = document.getElementById(`result-${soalId}`);
        const resultDivText = document.getElementById(`result-${soalId}-text`);
        if (selectedOption) {
            if (selectedOption === correctAnswer) {
                resultDiv.innerHTML = `
            <dotlottie-player  src="${right_answer}" background="transparent" speed="1" style="width: 45px; height: auto;" null autoplay></dotlottie-player>
            `;
                resultDivText.innerHTML = `
            <p class="correct relative text-green-500">Jawaban Anda benar!</p>`;
                jawabanBenar++;
                console.log("JAWABAN BENAR = ", jawabanBenar);
            } else {
                resultDiv.innerHTML = `
            <dotlottie-player src="https://lottie.host/824332f6-45ee-4c10-bbfe-4cafa0613444/3a9xcCoeJ6.json" background="transparent" speed="1" style="width: 45px; height: auto;" null autoplay></dotlottie-player>
            `;
                resultDivText.innerHTML = `<p class="incorrect relative text-red-500">Jawaban Anda salah. Jawaban yang benar adalah ${correctAnswer.toUpperCase()}.</p>`;
                jawabanSalah++;
                console.log("JAWABAN SALAH = ", jawabanSalah);
            }
            soalTerjawab++;
            console.log("SOAL TERJAWAB = ", soalTerjawab);
        } else {
            resultDiv.innerHTML = `<p class="incorrect text-red-500">Anda belum memilih jawaban.</p>`;
        }

        // Menonaktifkan semua input radio setelah submit
        const radioButtons = form.querySelectorAll('input[type="radio"]');
        if (selectedOption) {
            radioButtons.forEach((button) => {
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
    };

    function showScore() {
        const scoreDiv = document.getElementById("score");
        const scorePercentage = (jawabanBenar / totalSoal) * 100;
        const scoreText = document.querySelectorAll(".score-text");
        const modal = document.getElementById("modal");
        const body = document.querySelector("body");
        const lottieURL_SAD = modal.getAttribute("data-sad_emoji");
        const lottieURL_HAPPY = modal.getAttribute("data-happy_emoji");
        const lottieURL_STRONG = modal.getAttribute("data-strong_emoji");

        if (jawabanBenar == totalSoal && scoreText.length > 0) {
            body.style.overflow = "hidden";
            scoreText.forEach((element) => {
                element.classList.add("text-green-500");
            });
            modal.innerHTML = `
            <div id="overlay" class="overlay"></div>
            <div  class="modal-container modal-center">
                <div class="lottie-container relative">
                    <dotlottie-player class="icon"  src="${lottieURL_HAPPY}" background="transparent" speed="1" style="width: 200px; height: auto;" loop autoplay></dotlottie-player>
                    <dotlottie-player class="icon-2" src="https://lottie.host/05675fb7-79f7-4dd8-b889-68ffe22ae0ef/vw8IWV2nT6.json" background="transparent" speed="1"  loop autoplay></dotlottie-player>
                </div>
                <div class="title">
                    Selamat!
                </div>
                <div class="text">
                    Anda telah menyelesaikan subbab ini<br>
                    Nilai anda sempurna
                    <div class="flex-popup place-content-center">
                        <div class="">Skor Anda : </div>
                        <div id="score" class="ml-2 font-semibold text-green-500">${jawabanBenar}/${totalSoal} (${scorePercentage.toFixed(
                2
            )})</div>
                    </div>
                </div>
                <div class="dismiss-btn">
                    <button id="dismiss-popup-btn">OK</button>
                </div>
            </div>

        `;
            modal.classList.add("active");
            const dismissBtn = document.getElementById("dismiss-popup-btn");

            dismissBtn.addEventListener("click", function () {
                modal.classList.remove("active");
                modal.classList.add("exit");
                document.documentElement.classList.remove("modal-active");
                document.body.classList.remove("modal-active");
                modal.addEventListener(
                    "transitioned",
                    function () {
                        modal.innerHTML = ``;
                        modal.classList.remove("exit");
                    },
                    { once: true }
                );
                body.style.overflow = "auto";
                document.getElementById("overlay").style.display = "none";
            });
        } else if (scorePercentage >= 50 && scorePercentage < 100) {
            modal.innerHTML = `
            <div id="overlay" class="overlay"></div>
            <div  class="modal-container modal-center">
                <div class="lottie-container relative">
                    <dotlottie-player class="icon"  src="${lottieURL_STRONG}" background="transparent" speed="1" style="width: 200px; height: auto;" loop autoplay></dotlottie-player>
                    
                </div>
                <div class="title">
                    Selamat!
                </div>
                <div class="text">
                    Anda telah menyelesaikan subbab ini<br>
                    Anda masih bisa berkembang dengan belajar lebih banyak
                    <div class="flex-popup place-content-center">
                        <div class="">Skor Anda : </div>
                        <div id="score" class="ml-2 font-semibold ">${jawabanBenar}/${totalSoal} (${scorePercentage.toFixed(
                2
            )})</div>   
                    </div>
                </div>
                <div class="dismiss-btn">
                    <button id="dismiss-popup-btn">OK</button>
                </div>
            </div>
        `;
            modal.classList.add("active");
            const dismissBtn = document.getElementById("dismiss-popup-btn");

            dismissBtn.addEventListener("click", function () {
                modal.classList.remove("active");
                modal.classList.add("exit");
                document.documentElement.classList.remove("modal-active");
                document.body.classList.remove("modal-active");
                modal.addEventListener(
                    "transitioned",
                    function () {
                        modal.innerHTML = ``;
                        modal.classList.remove("exit");
                    },
                    { once: true }
                );
                body.style.overflow = "auto";
                document.getElementById("overlay").style.display = "none";
            });
        } else if (
            scorePercentage == 0 ||
            (scorePercentage < 50 && scoreText.length > 0)
        ) {
            scoreText.forEach((element) => {
                element.classList.add("text-red-500");
            });
            body.style.overflow = "hidden";
            modal.innerHTML = `
            <div id="overlay" class="overlay"></div>s
            <div  class="modal-container modal-center">
                <div class="lottie-container relative">
                <dotlottie-player src="${lottieURL_SAD}" background="transparent" speed="1"   loop autoplay></dotlottie-player>
                </div>
                <div class="title">
                    Yah...
                </div>
                <div class="text">
                    Anda telah menyelesaikan subbab ini, <br>tapi nilai kamu tidak memuaskan<br>
                    Belajar lebih semangat lagi....
                    <div class="flex-popup place-content-center">
                        <div class="">Skor Anda : </div>
                        <div id="score" class="ml-2 font-semibold text-red-500">${jawabanBenar}/${totalSoal} (${scorePercentage.toFixed(
                2
            )})</div>
                    </div>
                </div>
                <div class="dismiss-btn">
                    <button id="dismiss-popup-btn">OK</button>
                </div>
            </div>
        `;
            modal.classList.add("active");
            const dismissBtn = document.getElementById("dismiss-popup-btn");

            dismissBtn.addEventListener("click", function () {
                modal.classList.remove("active");
                modal.classList.add("exit");
                document.documentElement.classList.remove("modal-active");
                document.body.classList.remove("modal-active");
                modal.addEventListener(
                    "transitioned",
                    function () {
                        modal.innerHTML = ``;
                        modal.classList.remove("exit");
                    },
                    { once: true }
                );
                body.style.overflow = "auto";
                document.getElementById("overlay").style.display = "none";
            });
        }

        scoreDiv.innerHTML = `${jawabanBenar}/${totalSoal} (${scorePercentage.toFixed(
            2
        )})`;
    }
});
