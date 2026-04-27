@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-soft dark:bg-darkbg border border-red-500/30 rounded-2xl p-8 text-center shadow-xl">
        <svg class="w-16 h-16 mx-auto text-red-600 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
        </svg>
        <h2 class="text-2xl font-bold text-red-600 dark:text-red-400 mb-4">Account Banned</h2>
        <p class="text-accent/70 dark:text-soft/70 mb-8 leading-relaxed">
            Your account has been permanently banned due to excessive violations. If you believe we made a mistake, please contact a moderator.
        </p>
        <a href="mailto:fadiinsafff@gmail.com" class="inline-block px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition w-full shadow-md">
            Contact Moderator
        </a>
        <a href="/" class="inline-block mt-4 text-sm font-medium text-red-500 hover:underline">
            Return to Home
        </a>
    </div>
</div>
@endsection
