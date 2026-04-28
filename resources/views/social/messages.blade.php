@extends('layouts.app')

@section('content')
    <div class="py-8 h-[calc(100vh-6rem)] flex flex-col max-w-5xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-extrabold text-accent dark:text-soft">Messages</h1>
            <button class="p-2 bg-primary text-soft rounded-full hover:bg-accent transition shadow-md" title="New Message">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </button>
        </div>

        <div
            class="bg-white dark:bg-black/20 border border-accent/10 rounded-2xl flex-1 flex flex-col overflow-hidden shadow-lg">

            <div class="p-4 border-b border-accent/10 bg-soft/30 dark:bg-darkbg/30 flex gap-3">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-accent/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search conversations..."
                        class="w-full pl-10 pr-4 py-2 rounded-lg bg-white dark:bg-black/40 border border-accent/20 focus:border-primary text-sm text-accent dark:text-soft focus:outline-none focus:ring-1 focus:ring-primary">
                </div>
                <button
                    class="px-4 py-2 bg-primary/10 text-primary text-sm font-semibold rounded-lg hover:bg-primary/20 transition">Filter</button>
            </div>

            <div class="flex-1 overflow-y-auto hide-scrollbar divide-y divide-accent/5">

                <div
                    class="px-5 py-2 text-xs font-bold text-accent/50 dark:text-soft/50 uppercase tracking-wider bg-black/5 dark:bg-white/5">
                    Pinned
                </div>

                <div
                    class="relative group block p-4 hover:bg-primary/5 transition bg-primary/5 dark:bg-primary/10 cursor-pointer">
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity"
                        x-data="{ open: false }">
                        <button @click.stop="open = !open" @click.away="open = false"
                            class="p-2 text-accent/50 hover:text-primary rounded-full hover:bg-white dark:hover:bg-darkbg shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-darkbg border border-accent/10 rounded-xl shadow-xl z-20 py-1">
                            <button
                                class="w-full text-left px-4 py-2 text-sm text-accent dark:text-soft hover:bg-primary/10">Unpin</button>
                            <button
                                class="w-full text-left px-4 py-2 text-sm text-accent dark:text-soft hover:bg-primary/10">Mark
                                as Read</button>
                            <button
                                class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20">Delete
                                Chat</button>
                        </div>
                    </div>

                    <a href="/conversation" class="flex items-center gap-4 pr-10">
                        <div class="relative shrink-0">
                            <div class="w-14 h-14 rounded-full bg-primary/20 overflow-hidden border-2 border-primary/30">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ahmad" alt="Ahmad"
                                    class="w-full h-full object-cover">
                            </div>
                            <div
                                class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-500 rounded-full border-2 border-white dark:border-darkbg">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-baseline mb-1">
                                <h3 class="font-bold text-accent dark:text-soft text-lg flex items-center gap-2">
                                    Ahmad Yassine
                                    <svg class="w-3.5 h-3.5 text-accent/40" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                                    </svg>
                                </h3>
                                <span class="text-xs text-primary font-bold">10:42 AM</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-semibold text-accent dark:text-soft truncate pr-4">
                                    Did you get a chance to listen to that Bayati recording? Look at min 2:00.
                                </p>
                                <span
                                    class="bg-primary text-soft text-[10px] font-bold px-2 py-0.5 rounded-full shrink-0 shadow-sm">3</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div
                    class="px-5 py-2 text-xs font-bold text-accent/50 dark:text-soft/50 uppercase tracking-wider bg-black/5 dark:bg-white/5">
                    Recent
                </div>

                <a href="/conversation" class="block p-4 hover:bg-primary/5 transition group relative">
                    <div class="flex items-center gap-4 pr-10">
                        <div class="relative shrink-0">
                            <div class="w-14 h-14 rounded-full bg-primary/20 overflow-hidden">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah" alt="Sarah"
                                    class="w-full h-full object-cover grayscale-[20%] group-hover:grayscale-0 transition">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-baseline mb-1">
                                <h3 class="font-semibold text-accent dark:text-soft text-lg">Sarah Al-Fayed</h3>
                                <span class="text-xs text-accent/50 dark:text-soft/50">Yesterday</span>
                            </div>
                            <p class="text-sm text-accent/60 dark:text-soft/60 truncate flex items-center gap-1">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <svg class="w-4 h-4 shrink-0 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Voice message (0:45)
                            </p>
                        </div>
                    </div>
                </a>

                <a href="/conversation" class="block p-4 hover:bg-primary/5 transition group relative">
                    <div class="flex items-center gap-4 pr-10">
                        <div class="relative shrink-0">
                            <div class="w-14 h-14 rounded-full bg-primary/20 overflow-hidden">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Omar" alt="Omar"
                                    class="w-full h-full object-cover grayscale-[20%] group-hover:grayscale-0 transition">
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-baseline mb-1">
                                <h3 class="font-semibold text-accent dark:text-soft text-lg">Omar K.</h3>
                                <span class="text-xs text-accent/50 dark:text-soft/50">Oct 12</span>
                            </div>
                            <p class="text-sm text-accent/60 dark:text-soft/60 truncate flex items-center gap-1">
                                Thanks for the resources on Maqam Rast. I'll review them before our session.
                            </p>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
@endsection
