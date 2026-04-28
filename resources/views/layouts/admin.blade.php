<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: localStorage.getItem('darkMode') === 'true', sidebarOpen: false }" x-init="$watch('dark', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Naway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/naway-fav.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap" rel="stylesheet">

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

<body class="bg-soft dark:bg-[#432926] text-accent dark:text-soft h-screen w-full flex overflow-hidden m-0 p-0 transition-colors duration-200 font-sans antialiased">

    @include('components.admin.sidebar')

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">

        <div class="absolute inset-0 opacity-[0.03] dark:opacity-5 pointer-events-none bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNDMDg1NTIiIGZpbGwtb3BhY2l0eT0iMSIvPjwvc3ZnPg==')] z-0">
        </div>

        @include('components.admin.header')

        @if(session('error') || session('success'))
        <div x-data="{ show: true }" class="z-50"
             x-show="show"
             x-init="setTimeout(() => show = false, 5000)"
             x-cloak
             class="fixed top-4 right-4 sm:top-6 sm:right-6 z-[9999] p-4 rounded-xl shadow-2xl flex items-center gap-3 border max-w-sm {{ session('error') ? 'bg-red-50 dark:bg-red-900/30 border-red-500/30 text-red-600 dark:text-red-400' : 'bg-green-50 dark:bg-green-900/30 border-green-500/30 text-green-600 dark:text-green-400' }}"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-8 scale-95"
             x-transition:enter-end="opacity-100 translate-x-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-x-0 scale-100"
             x-transition:leave-end="opacity-0 translate-x-8 scale-95">

            <i class="fa-solid {{ session('error') ? 'fa-circle-exclamation' : 'fa-circle-check' }} text-xl flex-shrink-0"></i>

            <span class="font-bold text-sm flex-1 leading-relaxed">
                {{ session('error') ?? session('success') }}
            </span>

            <button @click="show = false" class="ml-4 opacity-50 hover:opacity-100 transition flex-shrink-0 hover:scale-110 duration-200">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        @endif

        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 relative z-10">
            <div class="max-w-7xl mx-auto w-full">
                @yield('content')
            </div>
        </main>

    </div>

</body>

</html>
