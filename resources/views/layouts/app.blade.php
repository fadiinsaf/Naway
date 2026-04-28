<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: localStorage.getItem('darkMode') === 'true', profileOpen: false }" x-init="$watch('dark', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <title>Naway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/naway-fav.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    <style>
        ::-webkit-scrollbar {
            display: none !important;
        }
        * {
            -ms-overflow-style: none !important;
            scrollbar-width: none !important;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-soft dark:bg-darkbg text-accent dark:text-soft antialiased font-sans">

    @include('components.header')

    @include('components.navigation')

    @isset($header)
        <header class="bg-soft dark:bg-darkbg shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="flex-1 w-full max-w-7xl mx-auto px-4 mt-4">
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    @include('components.footer')

    @if(session('success'))
        <div x-data="{ show: true }" 
             x-show="show" 
             style="display: none;"
             class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm"
             x-transition.opacity>
            <div @click.away="show = false" 
                 class="bg-soft dark:bg-darkbg border border-primary/30 rounded-2xl shadow-2xl p-6 max-w-md w-full mx-4 transform transition-all"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center gap-3 text-green-600 dark:text-green-400">
                        <i class="fa-solid fa-circle-check text-2xl"></i>
                        <h3 class="text-lg font-bold text-accent dark:text-soft">Success</h3>
                    </div>
                    <button @click="show = false" class="text-gray-400 hover:text-primary dark:hover:text-white transition">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>
                
                <p class="text-accent/80 dark:text-soft/80 mb-6 font-medium">
                    {{ session('success') }}
                </p>
                
                <div class="flex justify-end">
                    <button @click="show = false" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition font-medium">
                        OK
                    </button>
                </div>
            </div>
        </div>
    @endif

</body>

</html>
