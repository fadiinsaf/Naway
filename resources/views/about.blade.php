@extends('layouts.app')

@section('content')
    <div class="py-12 space-y-20 max-w-6xl mx-auto">
        <div class="text-center space-y-6 max-w-3xl mx-auto px-4">
            <div
                class="inline-block px-4 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary font-semibold text-sm mb-4">
                Preserving Musical Heritage
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-accent dark:text-soft tracking-tight">
                The Digital Home for <br> <span class="text-primary">Arabic Maqams</span>
            </h1>
            <p class="text-xl text-accent/70 dark:text-soft/70 leading-relaxed">
                Naway is a dedicated platform designed to document, teach, and celebrate the rich, complex world of Arabic
                music theory, bringing musicians from across the globe into one unified space.
            </p>
            <div class="flex justify-center gap-4 pt-4">
                <a href="/social"
                    class="px-8 py-3 bg-primary text-soft font-bold rounded-xl shadow-lg shadow-primary/30 hover:bg-accent transition transform hover:-translate-y-0.5">Join
                    Community</a>
                <a href="/maqams"
                    class="px-8 py-3 bg-white dark:bg-darkbg border-2 border-primary/30 text-primary font-bold rounded-xl hover:bg-primary/5 transition">Explore
                    Scales</a>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-4">
            <div class="bg-white dark:bg-black/20 p-6 rounded-2xl border border-accent/10 text-center shadow-sm">
                <div class="text-3xl font-black text-primary mb-1">45+</div>
                <div class="text-sm font-medium text-accent/70 dark:text-soft/70">Maqams Documented</div>
            </div>
            <div class="bg-white dark:bg-black/20 p-6 rounded-2xl border border-accent/10 text-center shadow-sm">
                <div class="text-3xl font-black text-primary mb-1">12k</div>
                <div class="text-sm font-medium text-accent/70 dark:text-soft/70">Active Musicians</div>
            </div>
            <div class="bg-white dark:bg-black/20 p-6 rounded-2xl border border-accent/10 text-center shadow-sm">
                <div class="text-3xl font-black text-primary mb-1">3,400</div>
                <div class="text-sm font-medium text-accent/70 dark:text-soft/70">Audio Samples</div>
            </div>
            <div class="bg-white dark:bg-black/20 p-6 rounded-2xl border border-accent/10 text-center shadow-sm">
                <div class="text-3xl font-black text-primary mb-1">100%</div>
                <div class="text-sm font-medium text-accent/70 dark:text-soft/70">Free to Learn</div>
            </div>
        </div>

        <div class="px-4">
            <h2 class="text-3xl font-bold text-accent dark:text-soft mb-8 text-center">Why Naway Exists</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-primary/5 border border-primary/20 rounded-2xl p-8 hover:bg-primary/10 transition">
                    <div class="w-12 h-12 bg-primary text-soft rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-accent dark:text-soft mb-3">Preservation</h3>
                    <p class="text-accent/70 dark:text-soft/70 leading-relaxed">We archive rare recordings and precise
                        notations to ensure traditional melodies survive the digital age.</p>
                </div>
                <div class="bg-primary/5 border border-primary/20 rounded-2xl p-8 hover:bg-primary/10 transition">
                    <div class="w-12 h-12 bg-primary text-soft rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-accent dark:text-soft mb-3">Community</h3>
                    <p class="text-accent/70 dark:text-soft/70 leading-relaxed">Connecting oud players in Cairo with
                        vocalists in London. Music is inherently collaborative.</p>
                </div>
                <div class="bg-primary/5 border border-primary/20 rounded-2xl p-8 hover:bg-primary/10 transition">
                    <div class="w-12 h-12 bg-primary text-soft rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-accent dark:text-soft mb-3">Education</h3>
                    <p class="text-accent/70 dark:text-soft/70 leading-relaxed">Breaking down complex microtonal structures
                        into visual, easy-to-understand interactive guides.</p>
                </div>
            </div>
        </div>

        <div class="px-4">
            <div
                class="bg-white dark:bg-black/20 rounded-3xl p-8 md:p-12 border border-accent/10 shadow-lg relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>

                <div class="relative z-10 flex flex-col md:flex-row gap-10 items-center">
                    <a href="https://www.instagram.com/fadi.insaf/" target="_blank"
                        class="w-48 h-48 shrink-0 rounded-2xl bg-primary/20 border-4 border-soft dark:border-darkbg shadow-2xl overflow-hidden relative group">
                        <img src="{{ asset("uploads/fadi.jpeg") }}" alt="Creator"
                            class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-accent/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-soft font-bold">Say Hi!</span>
                        </div>
                    </a>
                    <div class="flex-1 text-center md:text-left">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 bg-primary/10 text-primary rounded-lg text-sm font-bold mb-3">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            Lead Developer & Founder
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-accent dark:text-soft mb-4">Behind the Code</h2>
                        <p class="text-lg text-accent/80 dark:text-soft/80 mb-6 leading-relaxed">
                            I built Naway because I struggled to find a clean, modern resource to learn the subtle
                            differences between Maqam Bayati and Maqam Saba. What started as a personal index grew into a
                            passion project to bridge modern web development with ancient musical theory.
                        </p>
                        <div class="flex flex-wrap justify-center md:justify-start gap-3">
                            <a href="https://www.instagram.com/Naway/"
                                class="px-5 py-2.5 bg-primary text-soft font-semibold rounded-lg hover:bg-accent transition shadow-md">Follow
                                on Naway</a>
                            <a href="https://github.com/fadiinsaf"
                                class="px-5 py-2.5 bg-accent/10 dark:bg-soft/10 text-accent dark:text-soft font-semibold rounded-lg hover:bg-primary/20 transition flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                                GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-3xl mx-auto px-4 pb-12" x-data="{ selected: null }">
            <h2 class="text-3xl font-bold text-accent dark:text-soft mb-8 text-center">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div class="bg-white dark:bg-black/20 border border-accent/10 rounded-xl overflow-hidden shadow-sm">
                    <button @click="selected !== 1 ? selected = 1 : selected = null"
                        class="w-full text-left px-6 py-4 flex justify-between items-center focus:outline-none bg-primary/5 hover:bg-primary/10 transition">
                        <span class="font-bold text-lg text-accent dark:text-soft">Do I need to know how to read sheet
                            music?</span>
                        <svg class="w-5 h-5 transform transition-transform duration-200 text-primary"
                            :class="{ 'rotate-180': selected === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="selected === 1" x-collapse class="px-6 py-4 text-accent/70 dark:text-soft/70">
                        Not at all! While we provide sheet music notation for traditional learning, every maqam comes with
                        detailed audio examples and visual representations of the intervals to help you learn by ear.
                    </div>
                </div>
                <div class="bg-white dark:bg-black/20 border border-accent/10 rounded-xl overflow-hidden shadow-sm">
                    <button @click="selected !== 2 ? selected = 2 : selected = null"
                        class="w-full text-left px-6 py-4 flex justify-between items-center focus:outline-none bg-primary/5 hover:bg-primary/10 transition">
                        <span class="font-bold text-lg text-accent dark:text-soft">Is this platform free?</span>
                        <svg class="w-5 h-5 transform transition-transform duration-200 text-primary"
                            :class="{ 'rotate-180': selected === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="selected === 2" x-collapse class="px-6 py-4 text-accent/70 dark:text-soft/70">
                        Yes, core features like the Maqam Index, basic social networking, and public forums are 100% free.
                        We may introduce premium features later for advanced 1-on-1 tutoring.
                    </div>
                </div>
                <div class="bg-white dark:bg-black/20 border border-accent/10 rounded-xl overflow-hidden shadow-sm">
                    <button @click="selected !== 3 ? selected = 3 : selected = null"
                        class="w-full text-left px-6 py-4 flex justify-between items-center focus:outline-none bg-primary/5 hover:bg-primary/10 transition">
                        <span class="font-bold text-lg text-accent dark:text-soft">How can I contribute an audio
                            sample?</span>
                        <svg class="w-5 h-5 transform transition-transform duration-200 text-primary"
                            :class="{ 'rotate-180': selected === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="selected === 3" x-collapse class="px-6 py-4 text-accent/70 dark:text-soft/70">
                        If you are an instrumentalist or vocalist, you can upload samples directly through your profile.
                        They will be reviewed by our moderation team before being added to the main Maqam Index.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
