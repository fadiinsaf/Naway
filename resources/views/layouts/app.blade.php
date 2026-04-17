<!DOCTYPE html>
<html lang="en" x-data="{ dark: false, profileOpen: false, isLoggedIn: false }" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <title>Naway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/naway-fav.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap"
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
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-soft dark:bg-darkbg text-accent dark:text-soft">


    @include('components.header')

    @include('components.navigation')

    <main class="max-w-7xl mx-auto px-4 mt-4">
        @yield('content')
    </main>

    @include('components.footer')

</body>

</html>
