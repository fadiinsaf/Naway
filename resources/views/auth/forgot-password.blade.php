@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('form')
    <div class="mb-10">
        <h1 class="text-4xl md:text-5xl font-bold text-accent dark:text-soft mb-3 tracking-tight">
            Forgot Password
        </h1>
        <p class="font-serif text-accent/60 dark:text-soft/60 text-lg">
            No problem. Just let us know your email address and we will email you a password reset link.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Email address
            </label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter your email"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <button type="submit"
            class="w-full bg-primary hover:bg-accent text-soft py-3 rounded-lg font-bold transition mt-8 text-base shadow-lg shadow-primary/20 tracking-wide">
            Email Password Reset Link
        </button>
    </form>

    <p class="font-serif text-center mt-8 text-accent dark:text-soft text-lg">
        Remembered it?
        <a href="{{ route('login') }}" class="font-sans text-primary hover:text-accent font-bold transition">
            Sign in
        </a>
    </p>
@endsection

@section('hero_badge')
    Secure Account
@endsection

@section('hero_title')
    Reset your <span class="text-primary">Password.</span>
@endsection

@section('hero_description')
    We will get you back to discovering the greatest artists and the intricacies of the Maqam in no time.
@endsection
