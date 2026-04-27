@extends('layouts.sidebar-layout')

@section('title', 'Genres')
@section('default_active', count($genres) > 0 ? $genres[0]->id : '')

@section('sidebar_title')
    <i class="fa-solid fa-bars"></i> Genre Index
@endsection

@section('sidebar_nav')
    <nav class="p-4 space-y-1 h-full overflow-y-auto">
        @forelse($genres as $genre)
            <button @click="activeItem = '{{ $genre->id }}'; sidebarOpen = false" :class="activeItem == '{{ $genre->id }}' || (activeItem === '' && {{ $loop->first ? 'true' : 'false' }}) ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
                class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
                <i class="fa-solid fa-music"></i> {{ $genre->name }}
            </button>
        @empty
            <p class="text-sm opacity-50 px-4">No genres for a moment we will add genres soon</p>
        @endforelse
    </nav>
@endsection

@section('content')
    <div class="h-full overflow-y-auto pb-8 pr-2">
        @foreach($genres as $genre)
            <div x-show="activeItem == '{{ $genre->id }}' || (activeItem === '' && {{ $loop->first ? 'true' : 'false' }})" x-transition class="space-y-6" style="display: none;">
                
                @if($genre->cover_image)
                    <div class="w-full h-48 md:h-64 rounded-xl overflow-hidden mb-6 relative">
                        <img src="{{ asset($genre->cover_image) }}" alt="{{ $genre->name }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-darkbg/90 to-transparent flex items-end p-6">
                            <h1 class="text-4xl font-bold text-soft drop-shadow-md">{{ $genre->name }}</h1>
                        </div>
                    </div>
                @else
                    <h1 class="text-4xl font-bold text-accent dark:text-soft mb-2">{{ $genre->name }}</h1>
                @endif
                
                @if($genre->description)
                <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                    <p class="text-accent/70 dark:text-soft/70 leading-relaxed whitespace-pre-wrap">{{ $genre->description }}</p>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @if($genre->characteristics)
                    <div class="bg-accent/10 border border-accent/30 rounded-lg p-4">
                        <h4 class="font-bold text-accent dark:text-soft mb-3">Characteristics</h4>
                        <div class="space-y-2 text-sm text-accent/70 dark:text-soft/70 whitespace-pre-wrap">{{ $genre->characteristics }}</div>
                    </div>
                    @endif
                    
                    @if($genre->legendary_artists)
                    <div class="bg-primary/10 border border-primary/30 rounded-lg p-4">
                        <h4 class="font-bold text-accent dark:text-soft mb-3">Legendary Artists</h4>
                        <div class="space-y-2 text-sm text-accent/70 dark:text-soft/70 whitespace-pre-wrap">{{ $genre->legendary_artists }}</div>
                    </div>
                    @endif
                    
                    @if($genre->examples)
                    <div class="bg-primary/5 border border-primary/20 rounded-lg p-4 md:col-span-2">
                        <h4 class="font-bold text-accent dark:text-soft mb-3">Notable Examples</h4>
                        <div class="space-y-2 text-sm text-accent/70 dark:text-soft/70 whitespace-pre-wrap">{{ $genre->examples }}</div>
                    </div>
                    @endif
                </div>

                @if($genre->examples_audio_url && is_array($genre->examples_audio_url) && count($genre->examples_audio_url) > 0)
                <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                    <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to {{ $genre->name }}</h3>
                    <div class="space-y-4">
                        @foreach($genre->examples_audio_url as $index => $audio)
                        <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                            <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Example {{ $index + 1 }}</p>
                            <audio controls class="w-full" style="accent-color: #C08552;">
                                <source src="{{ asset($audio) }}" type="audio/mpeg">
                            </audio>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        @endforeach
        
        @if(count($genres) === 0)
            <div class="flex flex-col items-center justify-center h-64 text-accent/50 dark:text-soft/50">
                <i class="fa-solid fa-masks-theater text-4xl mb-4"></i>
                <p>No genres for a moment we will add genres soon</p>
            </div>
        @endif
    </div>
@endsection
