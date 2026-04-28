@extends('layouts.app')

@section('content')

    @if($artists->isEmpty())
        <div class="flex flex-col items-center justify-center h-64 text-accent/50 dark:text-soft/50">
            <i class="fa-solid fa-user-group text-4xl mb-4"></i>
            <p>No artists for a moment we will add artists soon</p>
        </div>
    @else
        <h2 class="text-4xl text-center font-bold mb-16 text-accent dark:text-soft">Artists</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($artists as $artist)
                <div x-data="{ liked: {{ auth()->check() && $artist->likes()->where('user_id', auth()->id())->exists() ? 'true' : 'false' }} }"
                    class="relative bg-soft dark:bg-darkbg rounded-xl shadow border border-primary/30 overflow-hidden flex flex-col">

                    @if($artist->image)
                        <img src="{{ asset($artist->image) }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-primary/20 flex items-center justify-center">
                            <i class="fa-solid fa-user text-4xl text-primary/50"></i>
                        </div>
                    @endif

                    @auth
                    <button
                        @click="
                            liked = !liked;
                            fetch('{{ route('likes.toggle') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    likeable_id: {{ $artist->id }},
                                    likeable_type: 'App\\Models\\Artist'
                                })
                            });
                        "
                        class="absolute top-3 right-3 p-2 bg-white/70 dark:bg-black/50 backdrop-blur-sm rounded-full transition-transform hover:scale-110"
                        :class="liked ? 'text-primary' : 'text-gray-600 dark:text-white'">
                        <svg class="w-5 h-5 transition-colors" :fill="liked ? 'currentColor' : 'none'" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </button>
                    @else
                    <a href="/signup"
                        class="absolute top-3 right-3 p-2 bg-white/70 dark:bg-black/50 backdrop-blur-sm rounded-full transition-transform hover:scale-110 text-gray-600 dark:text-white">
                        <svg class="w-5 h-5 transition-colors" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </a>
                    @endauth

                    <div class="p-4 flex flex-col flex-grow">
                        <div class="flex-grow flex flex-col">
                            <h3 class="font-bold text-xl text-accent dark:text-soft mb-1">{{ $artist->name }}</h3>

                            @if($artist->nationality || $artist->city || $artist->years_active)
                                <div class="flex flex-wrap gap-2 mb-3">
                                    @if($artist->years_active)
                                        <span class="px-2 py-1 text-xs font-semibold rounded bg-primary/20 text-primary dark:text-soft"><i class="fa-regular fa-clock mr-1"></i>Active {{ $artist->years_active }} yrs</span>
                                    @endif
                                    @if($artist->nationality || $artist->city)
                                        <span class="px-2 py-1 text-xs font-semibold rounded bg-accent/10 text-accent/80 dark:text-soft/80"><i class="fa-solid fa-globe mr-1"></i>{{ $artist->city ? $artist->city . ', ' : '' }}{{ $artist->nationality }}</span>
                                    @endif
                                </div>
                            @endif

                            <p class="text-sm text-accent/70 dark:text-soft/70 mb-4 line-clamp-3">
                                {{ $artist->biography ?? 'No biography available.' }}
                            </p>
                        </div>

                        <div class="mt-auto pt-4 border-t border-primary/10">
                            <a href="{{ route('artists.show', $artist->id) }}" class="block w-full text-center bg-primary text-soft py-2 rounded hover:bg-accent transition font-semibold">
                                View Artist
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if(!$artists->isEmpty())
        <div class="mt-8 mb-12 flex justify-center">
            {{ $artists->links() }}
        </div>
    @endif

@endsection
