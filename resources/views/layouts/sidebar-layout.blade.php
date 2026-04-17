<!DOCTYPE html>
<html lang="en" x-data="{ dark: false, profileOpen: false, isLoggedIn: false }" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Naway</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/naway-fav.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap" rel="stylesheet">
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
            font-family: 'IBM Plex Sans', 'IBM Plex Sans Arabic', sans-serif;
        }
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
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-soft dark:bg-darkbg text-accent dark:text-soft">

<div class="min-h-screen flex flex-col bg-soft dark:bg-darkbg">

    @include('components.header')

    @include('components.navigation')

    <div class="flex-1 flex overflow-hidden">

        <div class="w-80 bg-darkbg dark:bg-[#3a2220] border-r border-primary/20 flex flex-col">
            <div class="p-6 bg-primary/80 text-soft font-bold text-lg">
                @yield('sidebar_title')
            </div>
            <div class="sidebar-scroll flex-1">
                @yield('sidebar_nav')
            </div>
        </div>

        <div class="flex-1 bg-soft dark:bg-darkbg content-scroll">
            <div class="p-8 max-w-4xl">
                @yield('content')
            </div>
        </div>

    </div>
</div>

</body>

</html>
