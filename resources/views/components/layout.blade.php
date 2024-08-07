<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/math-icon.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/c45569dd38.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body x-data="{ darkMode: localStorage.getItem('dark_mode') === 'true' }" :class="{ 'dark': darkMode }">
    <div class="bg-gradient-to-b from-cyan-300 to-blue-700 font-inter dark:bg-white dark:from-indigo-900 dark:to-violet-800">
        {{$slot}}
    </div>

    <script>
        // navbar
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('bg-gradient-to-r', 'from-cyan-100', 'to-blue-100', 'shadow-lg', 'dark:from-neutral-900', 'dark:to-indigo-950');
            } else {
                navbar.classList.remove('bg-gradient-to-r', 'from-cyan-100', 'to-blue-100', 'shadow-lg', 'dark:from-neutral-900', 'dark:to-indigo-950');
            }
        });
    </script>
</body>

</html>