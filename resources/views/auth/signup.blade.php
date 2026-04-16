<!DOCTYPE html>
<html lang="en" x-data="{ dark: false }" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Naway</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.svg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'IBM Plex Sans', 'IBM Plex Sans Arabic', sans-serif;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-soft dark:bg-darkbg text-accent dark:text-soft">

    <div class="min-h-screen flex flex-col bg-soft dark:bg-darkbg">

        <div class="absolute top-6 left-6 z-10">
            <a href="/home"
                class="inline-flex items-center gap-2 px-4 py-2 bg-primary/20 hover:bg-primary/30 text-primary rounded-lg transition font-semibold text-sm">
                <i class="fa-solid fa-arrow-left"></i> Back to Home
            </a>
        </div>

        <div class="flex-1 grid grid-cols-1 lg:grid-cols-2 gap-0">

            <div class="flex items-center justify-center px-6 py-12 lg:py-0">
                <div class="w-full max-w-md">

                    <div class="mb-10">
                        <h1 class="text-4xl md:text-5xl font-bold text-accent dark:text-soft mb-3">
                            Join Naway
                        </h1>
                        <p class="text-accent/60 dark:text-soft/60 text-lg">
                            Explore the spirit of Arabic music
                        </p>
                    </div>

                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                                Full name
                            </label>
                            <input type="text" placeholder="Enter your full name"
                                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                                Email address
                            </label>
                            <input type="email" placeholder="Enter your email"
                                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                                Password
                            </label>
                            <input type="password" placeholder="Create a password"
                                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                                Confirm password
                            </label>
                            <input type="password" placeholder="Confirm your password"
                                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
                        </div>

                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 rounded accent-primary mt-1">
                            <span class="text-sm text-accent dark:text-soft leading-relaxed">
                                I agree to the
                                <a href="#" class="text-primary hover:text-accent font-semibold transition">Terms of
                                    Service</a>
                                and
                                <a href="#" class="text-primary hover:text-accent font-semibold transition">Privacy
                                    Policy</a>
                            </span>
                        </label>

                        <button type="submit"
                            class="w-full bg-primary hover:bg-accent text-soft py-3 rounded-lg font-bold transition mt-8 text-base">
                            Create account
                        </button>

                        <div class="relative my-8">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-primary/20"></div>
                            </div>
                            <div class="relative flex justify-center text-xs">
                                <span class="px-3 bg-soft dark:bg-darkbg text-accent/50">Or sign up with</span>
                            </div>
                        </div>

                        <button type="button"
                            class="w-full flex items-center justify-center gap-3 px-5 py-3 border border-primary/30 rounded-lg hover:bg-primary/5 transition text-accent dark:text-soft font-semibold">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path fill="currentColor"
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path fill="currentColor"
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                <path fill="currentColor"
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                            </svg>
                            Sign up with Google
                        </button>
                    </form>

                    <p class="text-center mt-8 text-accent dark:text-soft">
                        Already have an account?
                        <a href="/signin" class="text-primary hover:text-accent font-bold transition">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>

            <div class="hidden lg:flex items-center justify-center relative overflow-hidden p-8 bg-no-repeat bg-cover bg-center"
                style="background-image: url('{{ asset('uploads/violin.jpg') }}');">
            </div>

        </div>
    </div>

</body>

</html>
