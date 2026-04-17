@extends('layouts.app')

@section('content')

    <div class="grid md:grid-cols-[280px_1fr] gap-8 mb-12">
        <img src="https://images.unsplash.com/photo-1493225457124-a1a2a5f5f4f7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
            class="w-full h-80 object-cover rounded-xl">
        <div>
            <span class="inline-block bg-primary text-soft text-xs px-3 py-1 rounded-full mb-3">Moroccan</span>
            <h1 class="text-3xl font-semibold text-accent dark:text-soft mb-1">Amal Bakkali</h1>
            <p class="text-sm opacity-60 mb-4">1985 – Present · Casablanca, Morocco</p>
            <p class="text-sm leading-relaxed mb-5">Amal is a contemporary artist known for blending traditional Andalusian
                music with modern jazz. With a career spanning over two decades, she has performed in major venues across
                the world.</p>

            <div class="flex flex-wrap gap-2 mb-6">
                {{-- @foreach($artist->genres as $genre) --}}
                <span
                    class="text-xs px-3 py-1 rounded-full border border-primary/40 text-accent dark:text-soft">Andalusian</span>
                <span class="text-xs px-3 py-1 rounded-full border border-primary/40 text-accent dark:text-soft">Jazz
                    Fusion</span>
                {{-- @endforeach --}}
            </div>

            <div class="grid grid-cols-3 gap-3 mb-6">
                <div class="bg-primary/10 rounded-xl p-3 text-center">
                    <div class="text-xl font-semibold text-primary">124</div>
                    <div class="text-xs opacity-60 mt-1">Songs</div>
                </div>
                <div class="bg-primary/10 rounded-xl p-3 text-center">
                    <div class="text-xl font-semibold text-primary">22</div>
                    <div class="text-xs opacity-60 mt-1">Years active</div>
                </div>
                <div class="bg-primary/10 rounded-xl p-3 text-center">
                    <div class="text-xl font-semibold text-primary">3</div>
                    <div class="text-xs opacity-60 mt-1">Films</div>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <button
                    class="bg-primary text-soft px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                    Listen on Spotify
                </button>
                <button
                    class="border border-primary text-primary dark:text-soft dark:border-soft px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-primary/10 transition">
                    Add to Favorites
                </button>

                <button x-data="{ liked: false, likes: 1205 }" @click="liked = !liked; liked ? likes++ : likes--"
                    :class="liked ? 'bg-primary/20 text-primary border-primary' : 'border-primary/40 text-accent dark:text-soft hover:bg-primary/10 hover:border-primary'"
                    class="flex items-center gap-2 border px-4 py-2.5 rounded-lg text-sm font-medium transition ml-auto sm:ml-0">
                    <svg class="w-5 h-5 transition-transform" :class="liked ? 'fill-primary scale-110' : 'fill-none'"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                    <span x-text="likes">1205</span>
                </button>
            </div>
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-base font-semibold border-b border-primary/25 pb-2 mb-4">Discography highlights</h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
            {{-- @foreach($artist->albums as $album) --}}
            <div
                class="bg-primary/10 border border-primary/25 rounded-xl p-3 hover:bg-primary/20 transition cursor-pointer">
                <div class="text-sm font-medium">Desert Echoes</div>
                <div class="text-xs opacity-60 mt-1">2021</div>
            </div>
            <div
                class="bg-primary/10 border border-primary/25 rounded-xl p-3 hover:bg-primary/20 transition cursor-pointer">
                <div class="text-sm font-medium">Midnight in Medina</div>
                <div class="text-xs opacity-60 mt-1">2018</div>
            </div>
            <div
                class="bg-primary/10 border border-primary/25 rounded-xl p-3 hover:bg-primary/20 transition cursor-pointer">
                <div class="text-sm font-medium">Roots</div>
                <div class="text-xs opacity-60 mt-1">2015</div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>

    <div class="mb-12 bg-primary/5 border border-primary/10 rounded-2xl p-6">
        <h3 class="text-base font-semibold flex items-center gap-2 mb-6">
            Comments
            <span class="bg-primary text-soft text-xs px-2 py-0.5 rounded-full">2</span>
        </h3>

        <div class="flex gap-4 mb-8">
            <div class="w-10 h-10 rounded-full bg-primary/20 shrink-0 overflow-hidden">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Fadi" alt="Current User"
                    class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
                <textarea rows="2" placeholder="Share your thoughts or ask a question..."
                    class="w-full bg-white dark:bg-black/20 border border-primary/20 rounded-xl p-3 text-[15px] resize-none focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/50 text-accent dark:text-soft placeholder-accent/40 transition"></textarea>
                <div class="flex justify-end mt-2">
                    <button
                        class="bg-primary text-soft px-5 py-2 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                        Post Comment
                    </button>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            {{-- @foreach($artist->comments as $comment) --}}

            <div class="flex gap-4">
                <div class="w-10 h-10 rounded-full bg-primary/20 shrink-0 overflow-hidden">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Moussa" alt="Moussa"
                        class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <div class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl rounded-tl-none p-4">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-bold text-sm text-accent dark:text-soft">Moussa Mohammed</span>
                            <span class="text-xs opacity-50">3 days ago</span>
                        </div>
                        <p class="text-sm text-accent/80 dark:text-soft/80 leading-relaxed">Her vocal control on the
                            'Midnight in Medina' album is absolutely incredible. The way she transitions between traditional
                            scales and jazz chords is mind-blowing!</p>
                    </div>
                    <div class="flex items-center gap-4 mt-2 ml-2">
                        <button class="text-xs font-medium text-accent/60 hover:text-primary transition">Reply</button>
                        <button
                            class="text-xs font-medium text-accent/60 hover:text-primary transition flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                </path>
                            </svg>
                            24
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <div class="w-10 h-10 rounded-full bg-primary/20 shrink-0 overflow-hidden">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Mariam" alt="Mariam"
                        class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <div class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl rounded-tl-none p-4">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-bold text-sm text-accent dark:text-soft">Mariam</span>
                            <span class="text-xs opacity-50">1 week ago</span>
                        </div>
                        <p class="text-sm text-accent/80 dark:text-soft/80 leading-relaxed">Does anyone know if she's
                            planning a tour anytime soon? I would love to see her perform live in Europe.</p>
                    </div>
                    <div class="flex items-center gap-4 mt-2 ml-2">
                        <button class="text-xs font-medium text-accent/60 hover:text-primary transition">Reply</button>
                        <button
                            class="text-xs font-medium text-accent/60 hover:text-primary transition flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                </path>
                            </svg>
                            8
                        </button>
                    </div>
                </div>
            </div>

            {{-- @endforeach --}}
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-base font-semibold border-b border-primary/25 pb-2 mb-4">Related Artists</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            {{-- @foreach($related as $r) --}}
            <a href="#"
                class="bg-primary/10 border border-primary/25 rounded-xl overflow-hidden hover:opacity-80 transition block">
                <img src="https://images.unsplash.com/photo-1516280440502-861c8a14b18c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                    class="w-full h-24 object-cover">
                <div class="p-2">
                    <div class="text-sm font-medium">Tariq Fassi</div>
                    <div class="text-xs opacity-60 mt-1">Moroccan</div>
                </div>
            </a>
            <a href="#"
                class="bg-primary/10 border border-primary/25 rounded-xl overflow-hidden hover:opacity-80 transition block">
                <img src="https://images.unsplash.com/photo-1520692795893-68d7124976a4?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                    class="w-full h-24 object-cover">
                <div class="p-2">
                    <div class="text-sm font-medium">Yasmine Ali</div>
                    <div class="text-xs opacity-60 mt-1">Egyptian</div>
                </div>
            </a>
            {{-- @endforeach --}}
        </div>
    </div>

@endsection
