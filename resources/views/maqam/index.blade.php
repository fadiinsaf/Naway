@extends('layouts.sidebar-layout')

@section('title', 'Maqams')
@section('default_active', count($maqams) > 0 ? $maqams[0]->id : '')

@section('sidebar_title')
    <i class="fa-solid fa-bars"></i> Maqam Index
@endsection

@section('sidebar_nav')
    <nav class="p-4 space-y-1 h-full overflow-y-auto">
        @forelse($maqams as $maqam)
            <button @click="activeItem = '{{ $maqam->id }}'; sidebarOpen = false" :class="activeItem == '{{ $maqam->id }}' || (activeItem === '' && {{ $loop->first ? 'true' : 'false' }}) ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
                class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
                <i class="fa-solid fa-music"></i> {{ $maqam->name }}
            </button>
        @empty
            <p class="text-sm opacity-50 px-4">No maqams for a moment we will add maqams soon</p>
        @endforelse
    </nav>
@endsection

@section('content')
    <div class="h-full overflow-y-auto pb-8 pr-2">
        @foreach($maqams as $maqam)
            <div x-show="activeItem == '{{ $maqam->id }}' || (activeItem === '' && {{ $loop->first ? 'true' : 'false' }})" x-transition class="space-y-6" style="display: none;">
                <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam {{ $maqam->name }}</h1>
                
                @if($maqam->description)
                <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                    <p class="text-accent/70 dark:text-soft/70 leading-relaxed whitespace-pre-wrap">{{ $maqam->description }}</p>
                </div>
                @endif

                @if($maqam->score_url)
                <div class="bg-soft dark:bg-darkbg border border-primary/30 rounded-lg p-4">
                    <h3 class="font-bold text-accent dark:text-soft mb-4">Musical Scale Notation</h3>
                    <img src="{{ asset($maqam->score_url) }}" alt="Scale for {{ $maqam->name }}" class="w-full max-w-2xl mx-auto rounded bg-white p-4">
                </div>
                @endif

                @if($maqam->audio_url)
                <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                    <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to {{ $maqam->name }}</h3>
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Example Audio</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="{{ asset($maqam->audio_url) }}" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
                @endif
            </div>
        @endforeach
        
        @if(count($maqams) === 0)
            <div class="flex flex-col items-center justify-center h-64 text-accent/50 dark:text-soft/50">
                <i class="fa-solid fa-music text-4xl mb-4"></i>
                <p>No maqams for a moment we will add maqams soon</p>
            </div>
        @endif
    </div>
@endsection
