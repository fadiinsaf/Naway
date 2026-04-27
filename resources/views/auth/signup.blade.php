@extends('layouts.auth', ['heroImage' => 'uploads/violin.jpg'])

@section('title', 'Sign Up')

@section('form')
    <div class="mb-10">
        <h1 class="text-4xl md:text-5xl font-bold text-accent dark:text-soft mb-3 tracking-tight">
            Join Naway
        </h1>
        <p class="font-serif text-accent/60 dark:text-soft/60 text-lg">
            Explore the spirit of Arabic music
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Full name
            </label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your full name"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Email address
            </label>
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Enter your email"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Password
            </label>
            <input type="password" name="password" required autocomplete="new-password" placeholder="Create a password"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Confirm password
            </label>
            <input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" name="terms" value="1" required class="w-4 h-4 rounded accent-primary mt-1">
                <span class="text-sm font-medium text-accent dark:text-soft leading-relaxed">
                    I agree to the
                    <a href="#" class="text-primary hover:text-accent font-semibold transition">Terms of
                        Service</a>
                    and
                    <a href="#" class="text-primary hover:text-accent font-semibold transition">Privacy
                        Policy</a>
                </span>
            </label>
            <x-input-error :messages="$errors->get('terms')" class="mt-2 text-red-600" />
        </div>

        <button type="submit"
            class="w-full bg-primary hover:bg-accent text-soft py-3 rounded-lg font-bold transition mt-8 text-base shadow-lg shadow-primary/20 tracking-wide">
            Create account
        </button>

        <div class="relative my-8">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-primary/20"></div>
            </div>
            <div class="relative flex justify-center text-xs">
                <span
                    class="px-3 bg-soft dark:bg-darkbg font-medium text-accent/50 uppercase tracking-wider">Or
                    sign up with</span>
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

    <p class="font-serif text-center mt-8 text-accent dark:text-soft text-lg">
        Already have an account?
        <a href="{{ route('login') }}" class="font-sans text-primary hover:text-accent font-bold transition">
            Sign in
        </a>
    </p>
@endsection

@section('hero_badge')
    Authentic Sounds
@endsection

@section('hero_title')
    Discover the <span class="text-primary">Instruments</span>
@endsection

@section('hero_description')
    From the deep resonance of the Oud to the soul-stirring vibrato of the Violin. Explore the
    traditional instruments that bring classical Arabic music to life
@endsection