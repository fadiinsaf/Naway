<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('dark', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': dark }">
<head>
    <meta charset="UTF-8">
    <title>503 - Oud Tuning | Naway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="flex flex-col min-h-screen bg-soft dark:bg-darkbg text-accent dark:text-soft antialiased font-sans">
    <div class="flex-1 flex flex-col items-center justify-center px-4 text-center relative overflow-hidden">
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary/20 dark:bg-primary/10 rounded-full blur-3xl pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-md w-full">
            <div class="mb-6 text-primary">
                <i class="fa-solid fa-sliders text-8xl animate-pulse"></i>
            </div>
            
            <h1 class="text-9xl font-bold text-accent dark:text-soft opacity-20 mb-4 tracking-widest">503</h1>
            
            <h2 class="text-3xl font-bold text-accent dark:text-soft mb-3">Oud Tuning</h2>
            <p class="text-accent/70 dark:text-soft/70 leading-relaxed mb-8">
                We are currently tuning the platform to perfection. Please take a short breath while we finish maintenance.
            </p>

            <div class="flex justify-center">
                <button onclick="window.location.reload()" class="px-6 py-3 bg-primary text-soft font-semibold rounded-xl shadow-lg shadow-primary/30 hover:bg-primary/80 transition transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-arrows-rotate mr-2"></i> Check Status
                </button>
            </div>
        </div>
    </div>
</body>
</html>
