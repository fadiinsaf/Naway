<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('dark', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Naway</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/naway-fav.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

    <script>
        @auth
            if (!sessionStorage.getItem('themeSynced')) {
                localStorage.setItem('darkMode', '{{ auth()->user()->theme_mode === 'DARK' ? 'true' : 'false' }}');
                sessionStorage.setItem('themeSynced', 'true');
            }
        @endauth
        if (localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-soft dark:bg-darkbg text-accent dark:text-soft font-sans antialiased">

    <div class="min-h-screen flex flex-col bg-soft dark:bg-darkbg">

        <div class="absolute top-6 left-6 z-50">
            <a href="/home"
                class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 dark:bg-soft/10 hover:bg-primary/20 dark:hover:bg-soft/20 text-primary dark:text-soft rounded-lg transition font-semibold text-sm backdrop-blur-md border border-primary/20 dark:border-soft/20">
                <i class="fa-solid fa-arrow-left"></i> Back to Home
            </a>
        </div>

        <div class="absolute top-6 right-6 z-50">
            <button @click="dark = !dark"
                class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 dark:bg-soft/10 hover:bg-primary/20 dark:hover:bg-soft/20 text-primary dark:text-soft rounded-lg transition font-semibold text-sm backdrop-blur-md border border-primary/20 dark:border-soft/20">
                <i x-show="!dark" x-cloak class="fa-solid fa-moon"></i>
                <i x-show="dark" x-cloak class="fa-solid fa-sun"></i>
                <span x-text="dark ? 'Light Mode' : 'Dark Mode'"></span>
            </button>
        </div>

        <div class="flex-1 grid grid-cols-1 lg:grid-cols-2 gap-0">

            <div class="flex items-center justify-center px-6 py-12 lg:py-0">
                <div class="w-full max-w-md">
                    @yield('form')
                </div>
            </div>

            <div class="hidden lg:flex flex-col justify-end relative overflow-hidden p-12 xl:p-16 bg-no-repeat bg-cover bg-center"
                style="background-image: url('{{ asset($heroImage ?? 'uploads/sabah-fakhri.jpeg') }}');">

                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent z-10"></div>

                <div class="relative z-20 text-soft max-w-xl">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-bold uppercase tracking-widest mb-4 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        @yield('hero_badge')
                    </div>

                    <h2
                        class="text-4xl xl:text-5xl font-bold mb-4 leading-tight text-white tracking-tight">
                        @yield('hero_title')
                    </h2>

                    <p class="font-serif text-xl text-white/90 leading-relaxed">
                        @yield('hero_description')
                    </p>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
