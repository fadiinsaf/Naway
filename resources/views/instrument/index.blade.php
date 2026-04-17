@extends('layouts.app')

@section('content')

    <h2 class="text-4xl text-center font-bold mb-16 text-accent dark:text-soft">Instruments</h2>

    <div class="grid md:grid-cols-3 gap-6">

        <div x-data="{ liked: false }"
            class="relative bg-soft dark:bg-darkbg rounded-xl shadow border border-primary/30 overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4c/Oud.jpg" class="w-full h-48 object-cover">

            <button @click="liked = !liked"
                class="absolute top-3 right-3 p-2 bg-white/70 dark:bg-black/50 backdrop-blur-sm rounded-full transition-transform hover:scale-110"
                :class="liked ? 'text-red-500' : 'text-gray-600 dark:text-white'">
                <svg class="w-5 h-5 transition-colors" :fill="liked ? 'currentColor' : 'none'" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </button>

            <div class="p-4">
                <h3 class="font-semibold text-accent">Oud</h3>
                <p class="text-sm text-accent/70 dark:text-soft/70 mt-2">
                    Traditional Arabic string instrument.
                </p>

                <button class="mt-4 w-full bg-primary text-soft py-2 rounded hover:bg-accent transition">
                    View Instrument
                </button>
            </div>
        </div>

        <div x-data="{ liked: false }"
            class="relative bg-soft dark:bg-darkbg rounded-xl shadow border border-primary/30 overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2d/Qanun.jpg" class="w-full h-48 object-cover">

            <button @click="liked = !liked"
                class="absolute top-3 right-3 p-2 bg-white/70 dark:bg-black/50 backdrop-blur-sm rounded-full transition-transform hover:scale-110"
                :class="liked ? 'text-red-500' : 'text-gray-600 dark:text-white'">
                <svg class="w-5 h-5 transition-colors" :fill="liked ? 'currentColor' : 'none'" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </button>

            <div class="p-4">
                <h3 class="font-semibold text-accent">Qanun</h3>
                <p class="text-sm text-accent/70 dark:text-soft/70 mt-2">
                    A string instrument played in Middle Eastern music.
                </p>

                <button class="mt-4 w-full bg-primary text-soft py-2 rounded hover:bg-accent transition">
                    View Instrument
                </button>
            </div>
        </div>

        <div x-data="{ liked: false }"
            class="relative bg-soft dark:bg-darkbg rounded-xl shadow border border-primary/30 overflow-hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Ney.jpg" class="w-full h-48 object-cover">

            <button @click="liked = !liked"
                class="absolute top-3 right-3 p-2 bg-white/70 dark:bg-black/50 backdrop-blur-sm rounded-full transition-transform hover:scale-110"
                :class="liked ? 'text-red-500' : 'text-gray-600 dark:text-white'">
                <svg class="w-5 h-5 transition-colors" :fill="liked ? 'currentColor' : 'none'" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </button>

            <div class="p-4">
                <h3 class="font-semibold text-accent">Ney</h3>
                <p class="text-sm text-accent/70 dark:text-soft/70 mt-2">
                    End-blown flute used in Arabic music.
                </p>

                <button class="mt-4 w-full bg-primary text-soft py-2 rounded hover:bg-accent transition">
                    View Instrument
                </button>
            </div>
        </div>

    </div>

@endsection
