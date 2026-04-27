@extends($layout ?? 'layouts.app')

@section('title', __('Profile'))

@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div class="flex items-center justify-between mb-2">
            <h2 class="text-3xl font-bold text-accent dark:text-soft tracking-tight">
                {{ __('Profile Settings') }}
            </h2>
        </div>

        <div class="bg-white dark:bg-black/20 border border-primary/20 rounded-2xl p-6 sm:p-10 shadow-sm transition">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="bg-white dark:bg-black/20 border border-primary/20 rounded-2xl p-6 sm:p-10 shadow-sm transition">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="bg-red-50 dark:bg-red-900/10 border border-red-200 dark:border-red-900/30 rounded-2xl p-6 sm:p-10 shadow-sm transition">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        
    </div>
@endsection
