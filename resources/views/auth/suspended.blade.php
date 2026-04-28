@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-soft dark:bg-darkbg border border-primary/20 rounded-2xl p-8 text-center shadow-xl">
        <svg class="w-16 h-16 mx-auto text-red-500 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
        <h2 class="text-2xl font-bold text-accent dark:text-soft mb-4">Account Suspended</h2>
        <p class="text-accent/70 dark:text-soft/70 mb-8 leading-relaxed">
            You have broken the rules. Your account has been temporarily suspended. Please be respectful next time. If you believe we made a mistake, please contact a moderator. Repeated violations will result in a permanent ban.
        </p>
        <a href="mailto:fadiinsafff@gmail.com" class="inline-block px-6 py-3 bg-primary text-soft font-bold rounded-xl hover:bg-accent transition w-full shadow-md">
            Contact Moderator
        </a>
        <a href="/" class="inline-block mt-4 text-sm font-medium text-primary hover:underline">
            Return to Home
        </a>
    </div>
</div>
@endsection
