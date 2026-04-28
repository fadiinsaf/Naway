@extends('layouts.app')

@section('content')
    @if (session('welcome_popup'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-4"
             class="fixed bottom-6 right-6 bg-primary text-soft px-6 py-4 rounded-xl shadow-2xl z-50 flex items-center gap-3 border border-primary/30">
            <svg class="w-6 h-6 text-soft" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div class="font-semibold text-sm">Welcome to Naway! Enjoy our special features.</div>
            <button @click="show = false" class="ml-4 opacity-70 hover:opacity-100 transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
    @endif

    <div class="space-y-24 pb-12 overflow-hidden">

        <div class="relative pt-12 lg:pt-24 max-w-7xl mx-auto px-4">

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-8 items-center">

                <div class="text-center lg:text-left relative z-10">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 border border-primary/20 text-primary font-semibold text-sm mb-8 shadow-sm backdrop-blur-md cursor-default">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-primary absolute"></span>
                        A New Era of Music
                    </div>

                    <h1
                        class="text-5xl md:text-7xl lg:text-[5.5rem] font-bold text-accent dark:text-soft tracking-tight leading-[1.1] mb-6">
                        Welcome to <br class="hidden lg:block">
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent font-black">Naway</span>
                    </h1>

                    <h2 class="text-2xl md:text-3xl font-medium text-accent/80 dark:text-soft/90 mb-6 tracking-wide">
                        The Soul of Arabic Music Decoded
                    </h2>

                    <p class="text-lg text-accent/70 dark:text-soft/70 leading-relaxed mb-10 max-w-lg mx-auto lg:mx-0">
                        Explore the microtonal beauty of traditional melodies. Learn, practice, and connect with a global
                        community of musicians dedicated to the art of the Maqam.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="/maqams"
                            class="px-8 py-4 bg-primary text-soft font-semibold rounded-2xl shadow-lg shadow-primary/30 hover:bg-accent transition transform hover:-translate-y-1 text-lg flex items-center justify-center gap-2 group">
                            Explore the Index
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="/social"
                            class="px-8 py-4 bg-primary/5 dark:bg-accent/10 border-2 border-primary/30 text-primary font-semibold rounded-2xl hover:bg-primary/10 transition transform hover:-translate-y-1 text-lg flex items-center justify-center">
                            Join the Network
                        </a>
                    </div>
                </div>

                <a href="https://badr-rami.com/en/home/"
                    class="relative block w-full h-[400px] md:h-[500px] lg:h-[700px] rounded-[2.5rem] overflow-hidden shadow-2xl group border border-primary/20">
                    <div class="absolute -inset-4 bg-gradient-to-tr from-primary/30 to-accent/30 blur-3xl opacity-40 z-0">

                    </div>

                    <img src="{{ asset('uploads/badr.jpeg') }}" alt="Badr Rami"
                        class="absolute inset-0 w-full h-full object-cover z-10 transition-transform duration-1000 group-hover:scale-105"
                        style="object-position: center 20%;">

                    <div class="absolute inset-0 bg-gradient-to-t from-darkbg/90 via-darkbg/10 to-transparent z-20"></div>

                    <div
                        class="absolute bottom-8 left-8 md:bottom-12 md:left-12 z-30 bg-black/40 backdrop-blur-xl border border-white/10 pl-5 pr-8 py-4 rounded-2xl shadow-2xl transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700 ease-out flex items-center gap-4">
                        <div class="w-1 h-12 bg-primary rounded-full shadow-[0_0_10px_rgba(192,133,82,0.5)]"></div>
                        <div>
                            <p class="text-soft font-semibold text-2xl tracking-tight drop-shadow-md leading-none">Badr Rami
                            </p>
                            <p class="text-primary font-medium text-[11px] tracking-[0.25em] uppercase mt-2 drop-shadow-md">
                                Classical Syrian Singer</p>
                        </div>
                    </div>
                </a>

            </div>

            <div class="mt-16 md:mt-24 pt-8 border-t border-accent/10 w-full flex flex-wrap justify-center gap-8 md:gap-16">
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-black text-accent dark:text-soft">45+</span>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest mt-1">Maqams</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-black text-accent dark:text-soft">12k</span>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest mt-1">Musicians</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-black text-accent dark:text-soft">3.4k</span>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest mt-1">Recordings</span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-accent dark:text-soft tracking-tight">Everything you
                    need</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[280px]">

                <div
                    class="md:col-span-2 bg-primary/5 dark:bg-accent/5 border border-primary/20 rounded-3xl p-8 relative overflow-hidden group hover:border-primary/40 transition">
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
                    </div>
                    <div class="relative z-10 h-full flex flex-col justify-between">
                        <div>
                            <span
                                class="px-3 py-1 bg-primary/20 text-primary rounded-lg text-xs font-bold uppercase tracking-wider mb-4 inline-block">Interactive
                                Learning</span>
                            <h3 class="text-2xl font-bold text-accent dark:text-soft mb-2">Audio Player</h3>
                            <p class="text-accent/70 dark:text-soft/70 max-w-md">See the notes as you hear them. Our custom
                                visualizer highlights quarter-tones and characteristic modulations in real-time</p>
                        </div>

                        <div class="w-full h-16 flex items-center gap-1 mt-6 opacity-80 group-hover:opacity-100 transition">
                            @for ($i = 0; $i < 40; $i++)
                                <div
                                    class="flex-1 bg-primary/40 rounded-full {{ ['h-2', 'h-4', 'h-8', 'h-12', 'h-6', 'h-10'][rand(0, 5)] }} group-hover:bg-primary transition-colors duration-500 delay-[{{ $i * 10 }}ms]">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div
                    class="bg-primary border border-accent/20 rounded-3xl p-8 flex flex-col justify-between relative overflow-hidden shadow-xl">
                    <div class="absolute -right-4 -bottom-4 w-32 h-32 bg-soft/10 rounded-full blur-2xl"></div>
                    <div class="relative z-10">
                        <svg class="w-10 h-10 text-soft mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <h3 class="text-xl font-bold text-soft mb-2">Find Your Band</h3>
                        <p class="text-soft/80 text-sm leading-relaxed">Connect with Oud players, Qanun masters, and
                            Vocalists from Cairo to London.</p>
                    </div>
                    <a href="/social"
                        class="inline-flex items-center text-soft font-bold text-sm hover:underline mt-4 relative z-10">
                        Explore Network →
                    </a>
                </div>

                <div
                    class="bg-white dark:bg-black/20 border border-accent/10 rounded-3xl p-8 flex flex-col justify-between hover:shadow-lg transition">
                    <div>
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-accent dark:text-soft mb-2">Deep Theory</h3>
                        <p class="text-accent/70 dark:text-soft/70 text-sm leading-relaxed">Understand Jins, Sayr, and
                            complex transpositions with beautiful notation.</p>
                    </div>
                </div>

                <div
                    class="md:col-span-2 bg-white dark:bg-black/20 border border-accent/10 rounded-3xl p-8 flex flex-col sm:flex-row items-center gap-8 hover:shadow-lg transition">
                    <div class="flex-1">
                        <span
                            class="px-3 py-1 bg-accent/10 dark:bg-soft/10 text-accent dark:text-soft rounded-lg text-xs font-bold uppercase tracking-wider mb-4 inline-block">Real-time</span>
                        <h3 class="text-2xl font-bold text-accent dark:text-soft mb-2">Built-in Messaging</h3>
                        <p class="text-accent/70 dark:text-soft/70 leading-relaxed">Share audio clips, exchange sheet music,
                            and schedule remote jam sessions seamlessly within the platform.</p>
                    </div>
                    <div
                        class="w-full sm:w-64 bg-soft dark:bg-darkbg border border-accent/10 rounded-2xl p-4 shadow-inner space-y-3 shrink-0">
                        <div class="flex gap-2">
                            <div class="w-6 h-6 rounded-full bg-primary/20 shrink-0"></div>
                            <div
                                class="bg-white dark:bg-black/30 h-6 w-3/4 rounded-xl rounded-tl-sm border border-accent/5">
                            </div>
                        </div>
                        <div class="flex gap-2 justify-end">
                            <div class="bg-primary h-6 w-2/3 rounded-xl rounded-tr-sm"></div>
                        </div>
                        <div class="flex gap-2 justify-end">
                            <div class="bg-primary/80 h-8 w-1/2 rounded-xl rounded-tr-sm flex items-center px-2 gap-1">
                                <div class="w-2 h-2 rounded-full bg-soft"></div>
                                <div class="h-1 w-full bg-soft/50 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="max-w-5xl mx-auto px-4 pt-12">
            <div
                class="bg-gradient-to-br from-primary to-accent rounded-[3rem] p-10 md:p-16 text-center relative overflow-hidden shadow-2xl">
                <div
                    class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNGRkY4RjAiIGZpbGwtb3BhY2l0eT0iMSIvPjwvc3ZnPg==')]">
                </div>

                <div class="relative z-10">
                    <h2 class="text-3xl md:text-5xl font-black text-soft mb-6">Ready to tune your ear?</h2>
                    <p class="text-soft/80 text-lg md:text-xl max-w-2xl mx-auto mb-10 font-medium leading-relaxed">
                        Create a free account today to play our interactive Maqam Memory Game, save your favorite scales,
                        follow master musicians, and unlock the messaging portal
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        @auth
                            <a href="/game"
                                class="px-8 py-4 bg-soft text-primary font-bold rounded-2xl hover:bg-white transition transform hover:-translate-y-1 shadow-lg text-lg">
                                Play Memory Game
                            </a>
                        @else
                            <a href="/signup"
                                class="px-8 py-4 bg-soft text-primary font-bold rounded-2xl hover:bg-white transition transform hover:-translate-y-1 shadow-lg text-lg">
                                Create Free Account
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
