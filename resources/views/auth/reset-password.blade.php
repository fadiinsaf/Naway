@extends('layouts.auth')

@section('title', 'Reset Password')

@section('form')
    <div class="mb-10">
        <h1 class="text-4xl md:text-5xl font-bold text-accent dark:text-soft mb-3 tracking-tight">
            Reset Password
        </h1>
        <p class="font-serif text-accent/60 dark:text-soft/60 text-lg">
            Please choose a new password.
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Email address
            </label>
            <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" placeholder="Enter your email"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                New Password
            </label>
            <input type="password" name="password" required autocomplete="new-password" placeholder="Create a new password"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Confirm New Password
            </label>
            <input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your new password"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <button type="submit"
            class="w-full bg-primary hover:bg-accent text-soft py-3 rounded-lg font-bold transition mt-8 text-base shadow-lg shadow-primary/20 tracking-wide">
            Reset Password
        </button>
    </form>
@endsection

@section('hero_badge')
    Secure Account
@endsection

@section('hero_title')
    Reset your <span class="text-primary">Password.</span>
@endsection

@section('hero_description')
    Set up your new password so you can return to discovering the great music and artists on Naway.
@endsection
