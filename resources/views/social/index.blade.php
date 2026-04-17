@extends('layouts.app')

@section('content')
    <div class="py-8" x-data="{ tab: 'all' }">
        <div class="mb-10 space-y-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-extrabold text-accent dark:text-soft">Musician Network</h1>
                    <p class="text-lg text-accent/70 dark:text-soft/70 mt-2">Find collaborators, teachers, and enthusiasts
                        globally.</p>
                </div>

                <div class="relative w-full md:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-accent/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search by name, city, or instrument..."
                        class="w-full pl-10 pr-4 py-3 rounded-xl bg-white dark:bg-black/20 border border-primary/30 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-accent dark:text-soft placeholder-accent/40 shadow-sm transition">
                </div>
            </div>

            <div class="flex overflow-x-auto pb-2 gap-2 border-b border-accent/10 hide-scrollbar">
                <button @click="tab = 'all'"
                    :class="tab === 'all' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft'"
                    class="px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition">All Members</button>
                <button @click="tab = 'oud'"
                    :class="tab === 'oud' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft'"
                    class="px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition">Oud Players</button>
                <button @click="tab = 'vocalists'"
                    :class="tab === 'vocalists' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft'"
                    class="px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition">Vocalists</button>
                <button @click="tab = 'qanun'"
                    :class="tab === 'qanun' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft'"
                    class="px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition">Qanun</button>
                <button @click="tab = 'teachers'"
                    :class="tab === 'teachers' ? 'border-primary text-primary' : 'border-transparent text-accent/60 dark:text-soft/60 hover:text-accent dark:hover:text-soft'"
                    class="px-4 py-2 border-b-2 font-semibold whitespace-nowrap transition flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L5.237 7.58l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 014 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L8 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L5 10.274zm10 0l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L15 10.274z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Teachers
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

            <div
                class="bg-white dark:bg-black/20 rounded-2xl overflow-hidden border border-accent/10 shadow-sm hover:shadow-xl hover:border-primary/40 transition-all group flex flex-col">
                <div class="h-24 bg-gradient-to-r from-primary/80 to-accent relative">
                    <div
                        class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded shadow-sm">
                        PRO</div>
                </div>
                <div class="px-6 pb-6 flex-1 flex flex-col relative">
                    <div class="flex justify-between items-end mb-4">
                        <div class="w-20 h-20 rounded-2xl bg-white dark:bg-darkbg p-1 -mt-10 relative z-10 shadow-lg">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ahmad" alt="Ahmad"
                                class="w-full h-full rounded-xl object-cover bg-primary/10">
                        </div>
                        <div class="flex gap-2">
                            <button
                                class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition"
                                title="Listen to Samples">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <a href="/messages/ahmad"
                                class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition"
                                title="Send Message">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="mb-1 flex items-center gap-2">
                        <h3 class="text-xl font-bold text-accent dark:text-soft">Ahmad Yassine</h3>
                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <p class="text-sm text-accent/60 dark:text-soft/60 mb-3 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Cairo, Egypt
                    </p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="px-2.5 py-1 bg-primary/10 text-primary text-xs font-bold rounded-lg border border-primary/20">Oud</span>
                        <span
                            class="px-2.5 py-1 bg-accent/10 text-accent dark:text-soft/70 text-xs font-bold rounded-lg border border-accent/20">Composer</span>
                    </div>

                    <p class="text-sm text-accent/80 dark:text-soft/80 mb-6 line-clamp-3">
                        Master level Oud player specializing in classic Egyptian compositions. Currently exploring deep
                        modulations within the Nahawand and Kurd families. Available for remote sessions.
                    </p>

                    <div class="mt-auto grid grid-cols-2 gap-4 border-t border-accent/10 pt-4">
                        <div class="text-center">
                            <div class="text-lg font-bold text-accent dark:text-soft">1.2k</div>
                            <div class="text-xs text-accent/50 dark:text-soft/50 uppercase tracking-wider font-semibold">
                                Followers</div>
                        </div>
                        <div class="text-center border-l border-accent/10">
                            <div class="text-lg font-bold text-accent dark:text-soft">14</div>
                            <div class="text-xs text-accent/50 dark:text-soft/50 uppercase tracking-wider font-semibold">
                                Samples</div>
                        </div>
                    </div>
                </div>
                <button class="w-full py-3 bg-primary text-soft font-semibold hover:bg-accent transition text-sm">
                    Follow Profile
                </button>
            </div>

            <div
                class="bg-white dark:bg-black/20 rounded-2xl overflow-hidden border border-accent/10 shadow-sm hover:shadow-xl hover:border-primary/40 transition-all group flex flex-col">
                <div class="h-24 bg-gradient-to-r from-accent to-darkbg relative"></div>
                <div class="px-6 pb-6 flex-1 flex flex-col relative">
                    <div class="flex justify-between items-end mb-4">
                        <div class="w-20 h-20 rounded-2xl bg-white dark:bg-darkbg p-1 -mt-10 relative z-10 shadow-lg">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah" alt="Sarah"
                                class="w-full h-full rounded-xl object-cover bg-primary/10">
                        </div>
                        <div class="flex gap-2">
                            <a href="/messages/sarah"
                                class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition"
                                title="Send Message">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="mb-1 flex items-center gap-2">
                        <h3 class="text-xl font-bold text-accent dark:text-soft">Sarah Al-Fayed</h3>
                    </div>

                    <p class="text-sm text-accent/60 dark:text-soft/60 mb-3 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Beirut, Lebanon
                    </p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="px-2.5 py-1 bg-primary/10 text-primary text-xs font-bold rounded-lg border border-primary/20">Vocalist</span>
                        <span
                            class="px-2.5 py-1 bg-accent/10 text-accent dark:text-soft/70 text-xs font-bold rounded-lg border border-accent/20">Muwashshahat</span>
                    </div>

                    <p class="text-sm text-accent/80 dark:text-soft/80 mb-6 line-clamp-3">
                        Conservatory student deeply passionate about reviving Andalusian Muwashshahat. Looking for Qanun and
                        Nay players to collaborate on an upcoming EP project.
                    </p>

                    <div class="mt-auto grid grid-cols-2 gap-4 border-t border-accent/10 pt-4">
                        <div class="text-center">
                            <div class="text-lg font-bold text-accent dark:text-soft">450</div>
                            <div class="text-xs text-accent/50 dark:text-soft/50 uppercase tracking-wider font-semibold">
                                Followers</div>
                        </div>
                        <div class="text-center border-l border-accent/10">
                            <div class="text-lg font-bold text-accent dark:text-soft">3</div>
                            <div class="text-xs text-accent/50 dark:text-soft/50 uppercase tracking-wider font-semibold">
                                Samples</div>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full py-3 bg-primary/10 text-primary font-semibold hover:bg-primary hover:text-white transition text-sm">
                    Follow Profile
                </button>
            </div>

            <div
                class="bg-white dark:bg-black/20 rounded-2xl overflow-hidden border border-accent/10 shadow-sm hover:shadow-xl hover:border-primary/40 transition-all group flex flex-col">
                <div class="h-24 bg-gradient-to-r from-gray-700 to-gray-900 relative">
                    <div
                        class="absolute top-3 right-3 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded shadow-sm">
                        TEACHER</div>
                </div>
                <div class="px-6 pb-6 flex-1 flex flex-col relative">
                    <div class="flex justify-between items-end mb-4">
                        <div class="w-20 h-20 rounded-2xl bg-white dark:bg-darkbg p-1 -mt-10 relative z-10 shadow-lg">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Omar" alt="Omar"
                                class="w-full h-full rounded-xl object-cover bg-primary/10">
                        </div>
                        <div class="flex gap-2">
                            <a href="/messages/omar"
                                class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition"
                                title="Send Message">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="mb-1 flex items-center gap-2">
                        <h3 class="text-xl font-bold text-accent dark:text-soft">Omar K.</h3>
                    </div>

                    <p class="text-sm text-accent/60 dark:text-soft/60 mb-3 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Dubai, UAE
                    </p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="px-2.5 py-1 bg-primary/10 text-primary text-xs font-bold rounded-lg border border-primary/20">Qanun</span>
                        <span
                            class="px-2.5 py-1 bg-primary/10 text-primary text-xs font-bold rounded-lg border border-primary/20">Theory</span>
                    </div>

                    <p class="text-sm text-accent/80 dark:text-soft/80 mb-6 line-clamp-3">
                        Teaching classical theory and Qanun techniques. Check out my pinned posts for resources on Maqam
                        Rast. I offer 1-on-1 Zoom classes for beginners.
                    </p>

                    <div class="mt-auto grid grid-cols-2 gap-4 border-t border-accent/10 pt-4">
                        <div class="text-center">
                            <div class="text-lg font-bold text-accent dark:text-soft">3.4k</div>
                            <div class="text-xs text-accent/50 dark:text-soft/50 uppercase tracking-wider font-semibold">
                                Followers</div>
                        </div>
                        <div class="text-center border-l border-accent/10">
                            <div class="text-lg font-bold text-accent dark:text-soft">89</div>
                            <div class="text-xs text-accent/50 dark:text-soft/50 uppercase tracking-wider font-semibold">
                                Students</div>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full py-3 bg-primary/10 text-primary font-semibold hover:bg-primary hover:text-white transition text-sm">
                    Follow Profile
                </button>
            </div>

        </div>

        <div class="mt-12 flex justify-center">
            <button
                class="px-8 py-3 bg-white dark:bg-black/20 border border-primary/30 text-primary font-bold rounded-xl hover:bg-primary/5 transition shadow-sm">
                Load More Musicians
            </button>
        </div>
    </div>
@endsection
