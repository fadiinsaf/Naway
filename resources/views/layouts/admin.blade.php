<!DOCTYPE html>
<html lang="en" x-data="{ dark: false, sidebarOpen: false }" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Naway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/naway-fav.png') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap"
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
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'IBM Plex Sans', 'IBM Plex Sans Arabic', sans-serif;
        }

        /* Custom subtle scrollbar to match the Naway theme */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(192, 133, 82, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(192, 133, 82, 0.8);
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body
    class="bg-soft dark:bg-[#432926] text-accent dark:text-soft h-screen w-full flex overflow-hidden m-0 p-0 transition-colors duration-200">

    @include('components.admin.sidebar')

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">

        <div
            class="absolute inset-0 opacity-[0.03] dark:opacity-5 pointer-events-none bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNDMDg1NTIiIGZpbGwtb3BhY2l0eT0iMSIvPjwvc3ZnPg==')] z-0">
        </div>

        @include('components.admin.header')

        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 relative z-10">
            <div class="max-w-7xl mx-auto w-full">

                @yield('content')

            </div>
        </main>

    </div>

</body>

</html>
