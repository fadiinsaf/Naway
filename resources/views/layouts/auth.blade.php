<!DOCTYPE html>
<html lang="en" x-data="{ dark: false }" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Naway</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/naway-fav.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&family=Lora:ital,wght@0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#C08552',
                        accent: '#8C5A3C',
                        darkbg: '#4B2E2B',
                        soft: '#FFF8F0'
                    },
                    fontFamily: {
                        sans: ['Outfit', 'Cairo', 'sans-serif'],
                        serif: ['Lora', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', 'Cairo', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-soft dark:bg-darkbg text-accent dark:text-soft">

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
