@extends('layouts.app')

@section('content')

    <div class="grid md:grid-cols-[280px_1fr] gap-8 mb-12">
        <img src="https://images.unsplash.com/photo-1605335198897-4061a58b5e9f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
            class="w-full h-80 object-cover rounded-xl">
        <div>
            <span class="inline-block bg-primary text-soft text-xs px-3 py-1 rounded-full mb-3">String Instrument</span>
            <h1 class="text-3xl font-semibold text-accent dark:text-soft mb-1">Oud</h1>
            <p class="text-sm opacity-60 mb-4">Lute Family · Middle East & North Africa</p>
            <p class="text-sm leading-relaxed mb-5">The oud is a short-neck lute-type, pear-shaped stringed instrument. It
                is considered one of the most ancient and central instruments in Arabic, Turkish, and Persian music
                traditions.</p>

            <div class="grid grid-cols-2 gap-3 mb-6">
                <div class="bg-primary/10 rounded-lg p-3">
                    <div class="text-xs opacity-60">Type</div>
                    <div class="text-sm font-medium mt-1">Chordophone</div>
                </div>
                <div class="bg-primary/10 rounded-lg p-3">
                    <div class="text-xs opacity-60">Strings</div>
                    <div class="text-sm font-medium mt-1">11 or 13 strings</div>
                </div>
                <div class="bg-primary/10 rounded-lg p-3">
                    <div class="text-xs opacity-60">Origin</div>
                    <div class="text-sm font-medium mt-1">Mesopotamia</div>
                </div>
                <div class="bg-primary/10 rounded-lg p-3">
                    <div class="text-xs opacity-60">Playing style</div>
                    <div class="text-sm font-medium mt-1">Plucked (Risha)</div>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <button
                    class="bg-primary text-soft px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                    Hear a Sample
                </button>
                <button
                    class="border border-primary text-primary dark:text-soft dark:border-soft px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-primary/10 transition">
                    Save Instrument
                </button>

                <button x-data="{ liked: false, likes: 245 }" @click="liked = !liked; liked ? likes++ : likes--"
                    :class="liked ? 'bg-primary/20 text-primary border-primary' : 'border-primary/40 text-accent dark:text-soft hover:bg-primary/10 hover:border-primary'"
                    class="flex items-center gap-2 border px-4 py-2.5 rounded-lg text-sm font-medium transition ml-auto sm:ml-0">
                    <svg class="w-5 h-5 transition-transform" :class="liked ? 'fill-primary scale-110' : 'fill-none'"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                    <span x-text="likes">245</span>
                </button>
            </div>
        </div>
    </div>

    <div class="mb-12" x-data="{ tab: 'history' }">
        <h3 class="text-base font-semibold border-b border-primary/25 pb-2 mb-4">About the Oud</h3>
        <div class="flex border border-primary/35 rounded-lg overflow-hidden w-fit mb-4">
            <button @click="tab='history'" :class="tab==='history' ? 'bg-primary text-soft' : 'opacity-60'"
                class="px-5 py-1.5 text-sm">History</button>
            <button @click="tab='technique'" :class="tab==='technique' ? 'bg-primary text-soft' : 'opacity-60'"
                class="px-5 py-1.5 text-sm">Technique</button>
            <button @click="tab='tuning'" :class="tab==='tuning' ? 'bg-primary text-soft' : 'opacity-60'"
                class="px-5 py-1.5 text-sm">Tuning</button>
        </div>
        <p x-show="tab==='history'" class="text-sm leading-relaxed">The oud has a rich history dating back thousands of
            years, with its ancestors originating in ancient Mesopotamia and ancient Egypt.</p>
        <p x-show="tab==='technique'" x-cloak style="display: none;" class="text-sm leading-relaxed">Unlike Western string
            instruments like the guitar, the oud is fretless, allowing musicians to play microtones and glide between notes
            seamlessly.</p>
        <p x-show="tab==='tuning'" x-cloak style="display: none;" class="text-sm leading-relaxed">Oud tuning varies
            significantly between Arabic, Turkish, and Persian styles. A common Arabic tuning from lowest to highest pitch
            is C, F, A, D, G, C.</p>
    </div>

    <div class="mb-12 bg-primary/5 border border-primary/10 rounded-2xl p-6">
        <h3 class="text-base font-semibold flex items-center gap-2 mb-6">
            Comments
            <span class="bg-primary text-soft text-xs px-2 py-0.5 rounded-full">3</span>
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
            {{-- @foreach($instrument->comments as $comment) --}}

            <div class="flex gap-4">
                <div class="w-10 h-10 rounded-full bg-primary/20 shrink-0 overflow-hidden">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ahmad" alt="Ahmad"
                        class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <div class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl rounded-tl-none p-4">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-bold text-sm text-accent dark:text-soft">Ahmad Yassine</span>
                            <span class="text-xs opacity-50">2 hours ago</span>
                        </div>
                        <p class="text-sm text-accent/80 dark:text-soft/80 leading-relaxed">The Iraqi Oud has a very
                            distinct, deep resonance compared to the Egyptian one. I'd love to see a section comparing the
                            different regional builds!</p>
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
                            12
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
                            <span class="text-xs opacity-50">Yesterday</span>
                        </div>
                        <p class="text-sm text-accent/80 dark:text-soft/80 leading-relaxed">Does anyone know of a good brand
                            for beginners? I want to start learning but I'm overwhelmed by the choices.</p>
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
                            4
                        </button>
                    </div>
                </div>
            </div>

            {{-- @endforeach --}}
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-base font-semibold border-b border-primary/25 pb-2 mb-4">Related Instruments</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            {{-- @foreach($related as $r) --}}
            <a href="#"
                class="bg-primary/10 border border-primary/25 rounded-xl overflow-hidden hover:opacity-80 transition">
                <img src="https://images.unsplash.com/photo-1542124021-3f1ff23b3eb1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                    class="w-full h-24 object-cover">
                <div class="p-2">
                    <div class="text-sm font-medium">Qanun</div>
                    <div class="text-xs opacity-60 mt-1">Zither Family</div>
                </div>
            </a>
            <a href="#"
                class="bg-primary/10 border border-primary/25 rounded-xl overflow-hidden hover:opacity-80 transition">
                <img src="https://images.unsplash.com/photo-1628131341065-27a37213d5b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                    class="w-full h-24 object-cover">
                <div class="p-2">
                    <div class="text-sm font-medium">Nay</div>
                    <div class="text-xs opacity-60 mt-1">Woodwind</div>
                </div>
            </a>
            {{-- @endforeach --}}
        </div>
    </div>

@endsection
