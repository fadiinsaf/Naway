@extends('layouts.app')

@section('content')
    <div class="py-8">
        <div class="mb-10 space-y-6">
            <div>
                <h1 class="text-4xl font-extrabold text-accent dark:text-soft">Musician Network</h1>
                <p class="text-lg text-accent/70 dark:text-soft/70 mt-2">Find collaborators, teachers, and enthusiasts globally.</p>
            </div>

            <div class="flex overflow-x-auto pb-2 gap-2 border-b border-accent/10 hide-scrollbar">
                <a href="?tab=all" class="{{ $tab === 'all' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft' }} px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition">All Members</a>
                <a href="?tab=oud" class="{{ $tab === 'oud' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft' }} px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition">Oud</a>
                <a href="?tab=singer" class="{{ $tab === 'singer' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft' }} px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition">Singer</a>
                <a href="?tab=admin" class="{{ $tab === 'admin' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft' }} px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition">Admin</a>
            </div>
        </div>

        @if($users->isEmpty())
            <div class="flex flex-col items-center justify-center h-64 text-accent/50 dark:text-soft/50">
                <i class="fa-solid fa-users text-4xl mb-4"></i>
                <p>No members found in this category.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($users as $user)
                <div class="bg-white dark:bg-black/20 rounded-2xl overflow-hidden border border-accent/10 shadow-sm hover:shadow-xl hover:border-primary/40 transition-all group flex flex-col">
                    <div class="h-24 bg-gradient-to-r from-primary/80 to-accent relative">
                        @if($user->role === 'admin')
                        <div class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded shadow-sm uppercase">ADMIN</div>
                        @endif
                    </div>
                    
                    <div class="px-6 pb-6 flex-1 flex flex-col relative">
                        <div class="flex justify-between items-end mb-4">
                            <div class="w-20 h-20 rounded-2xl bg-white dark:bg-darkbg p-1 -mt-10 relative z-10 shadow-lg">
                                @if($user->profile_image)
                                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}" class="w-full h-full rounded-xl object-cover bg-primary/10">
                                @else
                                    <div class="w-full h-full rounded-xl bg-primary/20 flex items-center justify-center text-primary text-2xl font-bold">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="/messages/{{ $user->id }}" class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition shadow-sm border border-primary/20" title="Send Message">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="mb-2">
                            <h3 class="text-xl font-bold text-accent dark:text-soft">{{ $user->name }}</h3>
                        </div>

                        @if($user->country || $user->city)
                        <p class="text-sm text-accent/60 dark:text-soft/60 mb-3 flex items-center gap-1 font-medium">
                            <i class="fa-solid fa-location-dot text-primary/70"></i>
                            {{ $user->city ? $user->city . ', ' : '' }}{{ $user->country }}
                        </p>
                        @endif

                        @if($user->speciality)
                        <div class="flex flex-wrap gap-2 mb-2 mt-auto">
                            <span class="px-3 py-1.5 bg-primary/10 text-primary text-xs font-bold rounded-lg border border-primary/20 uppercase tracking-wide">{{ $user->speciality }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-12 flex justify-center">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection
