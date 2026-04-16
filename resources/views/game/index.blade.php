@extends('layouts.app')

@section('content')
    {{-- Game Container managed by Alpine.js for UI simulation --}}
    <div class="max-w-3xl mx-auto py-8" x-data="{
                    isPlaying: false,
                    hasGuessed: false,
                    isCorrect: false,
                    selectedOption: null,
                    level: 1,
                    score: 0,
                    correctAnswer: 'Bayati',
                    options: ['Rast', 'Bayati', 'Sikah', 'Hijaz']
                 }">

        <div class="flex justify-between items-center border-b border-primary/25 pb-4 mb-8">
            <div>
                <h1 class="text-3xl font-semibold text-accent dark:text-soft">Maqam Memory</h1>
                <p class="text-sm opacity-70 mt-1">Listen carefully and identify the correct scale.</p>
            </div>
            <div class="flex gap-4 text-center">
                <div class="bg-primary/10 rounded-lg px-4 py-2 border border-primary/20">
                    <div class="text-xs opacity-60">Level</div>
                    <div class="text-lg font-bold text-primary" x-text="level">1</div>
                </div>
                <div class="bg-primary/10 rounded-lg px-4 py-2 border border-primary/20">
                    <div class="text-xs opacity-60">Score</div>
                    <div class="text-lg font-bold text-primary" x-text="score">0</div>
                </div>
            </div>
        </div>

        <div
            class="bg-soft dark:bg-darkbg border border-primary/30 rounded-2xl p-8 shadow-sm text-center relative overflow-hidden">

            <div class="mb-10">
                <div class="w-24 h-24 mx-auto bg-primary/10 rounded-full flex items-center justify-center border-4 border-primary/20 mb-4 transition duration-300"
                    :class="isPlaying ? 'animate-pulse border-primary' : ''">

                    {{-- Play/Replay Button --}}
                    <button @click="isPlaying = true; setTimeout(() => isPlaying = false, 2000)"
                        class="w-16 h-16 bg-primary text-soft rounded-full flex items-center justify-center hover:bg-accent hover:scale-105 transition shadow-md">

                        {{-- Fixed: Clean Solid Play Triangle --}}
                        <svg x-show="!isPlaying" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 ml-1" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path d="M8 5v14l11-7z" />
                        </svg>

                        {{-- Playing State (Music Note) --}}
                        <svg x-show="isPlaying" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 19V6l12-3v13M9 19c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm12-3c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zM9 10l12-3" />
                        </svg>
                    </button>
                </div>
                <p class="text-sm font-medium" x-text="isPlaying ? 'Playing audio...' : 'Click to listen'"></p>
            </div>

            <div class="grid grid-cols-2 gap-4 max-w-lg mx-auto mb-6">
                <template x-for="option in options" :key="option">
                    <button @click="hasGuessed = true; selectedOption = option; isCorrect = (option === correctAnswer);"
                        :disabled="hasGuessed" :class="{
                                    'bg-primary text-soft border-primary': !hasGuessed || (hasGuessed && option !== selectedOption && option !== correctAnswer),
                                    'bg-accent text-soft border-accent scale-95': hasGuessed && option === selectedOption && !isCorrect,
                                    'bg-[#8C5A3C] text-soft border-[#4B2E2B] ring-4 ring-primary/50': hasGuessed && option === correctAnswer
                                }"
                        class="py-4 px-6 rounded-xl border-2 text-lg font-medium transition duration-200 hover:bg-accent hover:text-soft disabled:opacity-50 disabled:cursor-not-allowed">
                        <span x-text="option"></span>
                    </button>
                </template>
            </div>

            <div x-show="hasGuessed" x-transition.opacity x-cloak
                class="mt-8 p-6 bg-primary/10 rounded-xl border border-primary/25">

                <div x-show="isCorrect">
                    <h3 class="text-xl font-bold text-accent dark:text-soft mb-2">Spot on! 🎵</h3>
                    <p class="text-sm opacity-80 mb-4">Excellent ear. That was indeed <span class="font-semibold"
                            x-text="correctAnswer"></span>.</p>
                    <button @click="level++; score += 100; hasGuessed = false; selectedOption = null"
                        class="bg-primary text-soft px-8 py-2.5 rounded-lg font-medium hover:bg-accent transition shadow-sm">
                        Next Level
                    </button>
                </div>

                <div x-show="!isCorrect">
                    <h3 class="text-xl font-bold text-darkbg dark:text-primary mb-2">Not quite!</h3>
                    <p class="text-sm opacity-80 mb-4">You selected <span class="font-semibold"
                            x-text="selectedOption"></span>, but the correct answer was <span class="font-semibold"
                            x-text="correctAnswer"></span>.</p>
                    <div class="flex justify-center gap-3">
                        <button @click="hasGuessed = false; selectedOption = null"
                            class="border border-primary text-primary dark:text-soft dark:border-soft px-6 py-2.5 rounded-lg font-medium hover:bg-primary/10 transition">
                            Try Again
                        </button>
                        <button
                            class="bg-primary text-soft px-6 py-2.5 rounded-lg font-medium hover:bg-accent transition shadow-sm">
                            View Explanation
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
