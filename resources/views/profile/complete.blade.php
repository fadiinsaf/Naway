@extends('layouts.auth', ['heroImage' => 'uploads/violin.jpg'])

@section('title', 'Complete Profile')

@section('form')
    <div class="mb-10">
        <h1 class="text-4xl md:text-5xl font-bold text-accent dark:text-soft mb-3 tracking-tight">
            Complete Profile
        </h1>
        <p class="font-serif text-accent/60 dark:text-soft/60 text-lg">
            Please tell us a bit more about yourself to continue.
        </p>
    </div>

    <form method="POST" action="{{ route('profile.complete.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PATCH')

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Profile Picture
            </label>
            <input type="file" name="profile_image" accept="image/*"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('profile_image')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Speciality
            </label>
            <input type="text" name="speciality" value="{{ auth()->user()->role === 'admin' ? 'admin' : old('speciality', auth()->user()->speciality) }}" 
                {{ auth()->user()->role === 'admin' ? 'disabled' : '' }}
                placeholder="E.g. Oud Player, Listener, Composer"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base disabled:opacity-50">
            
            @if(auth()->user()->role === 'admin')
                <input type="hidden" name="speciality" value="admin">
                <p class="text-xs text-primary mt-1">Admin speciality cannot be changed.</p>
            @endif
            <x-input-error :messages="$errors->get('speciality')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                Country
            </label>
            <input type="text" name="country" value="{{ old('country', auth()->user()->country) }}" placeholder="Your country"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('country')" class="mt-2 text-red-600" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-accent dark:text-soft mb-3">
                City
            </label>
            <input type="text" name="city" value="{{ old('city', auth()->user()->city) }}" placeholder="Your city"
                class="w-full px-5 py-3 border border-primary/30 rounded-lg bg-soft dark:bg-darkbg text-accent dark:text-soft placeholder-primary/40 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/20 transition text-base">
            <x-input-error :messages="$errors->get('city')" class="mt-2 text-red-600" />
        </div>

        <button type="submit"
            class="w-full bg-primary hover:bg-accent text-soft py-3 rounded-lg font-bold transition mt-8 text-base shadow-lg shadow-primary/20 tracking-wide">
            Save & Continue
        </button>
    </form>
@endsection

@section('hero_badge')
    Profile Setup
@endsection

@section('hero_title')
    Welcome to <span class="text-primary">Naway</span>
@endsection

@section('hero_description')
    Set up your profile to connect with other Arabic music enthusiasts and personalize your experience.
@endsection
