<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: localStorage.getItem('darkMode') === 'true', profileOpen: false }" x-init="$watch('dark', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Naway</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/naway-fav.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        .sidebar-scroll {
            overflow-y: scroll;
        }
        .sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #C08552;
            border-radius: 3px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: #8C5A3C;
        }
        .content-scroll {
            overflow-y: scroll;
        }
        .content-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .content-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .content-scroll::-webkit-scrollbar-thumb {
            background: #C08552;
            border-radius: 3px;
        }
        .content-scroll::-webkit-scrollbar-thumb:hover {
            background: #8C5A3C;
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

<body class="bg-soft dark:bg-darkbg text-accent dark:text-soft overflow-hidden h-screen font-sans antialiased">

<div class="h-screen flex flex-col bg-soft dark:bg-darkbg" x-data="{ sidebarOpen: false, activeItem: '@yield('default_active', '1')' }">

    @include('components.header')

    @include('components.navigation')

    <div class="flex-1 flex overflow-hidden min-h-0 relative">

        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black/50 z-40 md:hidden" @click="sidebarOpen = false" style="display: none;"></div>

        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
             class="fixed inset-y-0 left-0 z-50 w-80 bg-darkbg dark:bg-[#3a2220] border-r border-primary/20 flex flex-col shrink-0 transition-transform duration-300 md:relative md:translate-x-0">
            <div class="p-6 bg-primary/80 text-soft font-bold text-lg shrink-0 flex justify-between items-center">
                <span>@yield('sidebar_title')</span>
                <button @click="sidebarOpen = false" class="md:hidden text-soft hover:text-white transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="sidebar-scroll flex-1 overflow-y-auto min-h-0">
                @yield('sidebar_nav')
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto content-scroll min-h-0 bg-soft dark:bg-darkbg relative w-full">
            <!-- Mobile Toggle Button -->
            <div class="md:hidden fixed bottom-8 left-1/2 -translate-x-1/2 z-40">
                <button @click="sidebarOpen = true" class="flex items-center gap-2 px-6 py-3 bg-primary text-soft rounded-full shadow-lg shadow-primary/40 hover:bg-accent transition-transform hover:scale-105 active:scale-95 font-semibold text-sm">
                    <i class="fa-solid fa-bars"></i>
                    Library Menu
                </button>
            </div>

            <div class="p-4 md:p-8 max-w-4xl mx-auto">
                @yield('content')
            </div>
        </div>

    </div>
</div>

</body>

</html>
