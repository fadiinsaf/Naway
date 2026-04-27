<div x-data="{ searchModalOpen: false }" class="my-1 bg-soft dark:bg-darkbg border-primary/30 relative">
    <div class="px-4 sm:px-6 h-16 flex items-center justify-between gap-4 sm:gap-6">
        <a href="/home" class="flex items-center gap-2 sm:gap-3">
            <img src="{{ asset('images/naway-icon.png') }}" alt="Naway Logo" class="h-16 sm:h-16" title="Naway">
            <div class="flex flex-col leading-tight shrink-0">
                <span class="text-xl sm:text-xl font-semibold tracking-tight text-accent dark:text-soft">
                    نۆآيَ &nbsp;<span>Naway</span>
                </span>
                <span class="text-[9px] sm:text-[11px] mt-1 tracking-widest dark:text-soft uppercase text-primary">
                    The Spirit of Arabic Music
                </span>
            </div>
        </a>

        <!-- Desktop Search Bar -->
        <div class="hidden sm:block flex-1 max-w-sm relative" x-data="searchComponent()" @click.outside="query = ''">
            <div class="flex items-center border border-primary/100 dark:border-white rounded bg-soft dark:bg-darkbg overflow-hidden focus-within:border-primary transition">
                <input type="text" placeholder="Search…" x-model="query" @input.debounce.300ms="performSearch"
                    class="flex-1 text-sm px-3 py-1.5 border-none focus:ring-0 bg-transparent focus:outline-none placeholder-primary/100 dark:placeholder-white text-accent dark:text-soft">
                <button class="px-3 py-1.5 text-primary hover:bg-primary/10 transition dark:text-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                </button>
            </div>
            
            <!-- Desktop Results Dropdown -->
            <div x-show="query.length >= 1" style="display: none;" class="absolute top-full left-0 right-0 mt-2 bg-white dark:bg-[#1a1a1a] border border-primary/30 rounded-xl shadow-xl z-50 max-h-96 overflow-y-auto">
                <template x-if="loading">
                    <div class="p-4 text-center text-sm opacity-50"><i class="fa-solid fa-spinner fa-spin mr-2"></i>Searching...</div>
                </template>
                <template x-if="!loading && results.length === 0">
                    <div class="p-4 text-center text-sm opacity-50">No results found for "<span x-text="query"></span>"</div>
                </template>
                <template x-for="result in results" :key="result.url + result.name">
                    <a :href="result.url" class="flex items-center gap-3 px-4 py-3 hover:bg-primary/10 border-b border-primary/10 last:border-0 transition">
                        <template x-if="result.image">
                            <img :src="result.image" class="w-10 h-10 rounded-full object-cover border border-primary/20 shrink-0">
                        </template>
                        <template x-if="!result.image">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center shrink-0 border border-primary/10">
                                <i class="fa-solid" :class="{
                                    'fa-user': result.type === 'Artist' || result.type === 'User',
                                    'fa-guitar': result.type === 'Instrument',
                                    'fa-music': result.type === 'Maqam' || result.type === 'Genre',
                                    'fa-drum': result.type === 'Rhythm'
                                }"></i>
                            </div>
                        </template>
                        <div class="flex-1 min-w-0">
                            <div class="text-[10px] text-primary font-bold uppercase mb-0.5 tracking-wider" x-text="result.type"></div>
                            <div class="text-sm font-semibold text-accent dark:text-soft truncate" x-text="result.name"></div>
                        </div>
                    </a>
                </template>
            </div>
        </div>

        <!-- Mobile Search Button -->
        <div class="sm:hidden flex items-center">
            <button @click="searchModalOpen = true" class="p-2 text-primary hover:bg-primary/10 rounded-full transition dark:text-soft">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Search Modal -->
    <div x-show="searchModalOpen" style="display: none;" class="absolute inset-x-0 top-full mt-1 p-4 bg-soft dark:bg-darkbg border-b border-primary/30 z-50 shadow-lg sm:hidden"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        @click.outside="searchModalOpen = false"
        x-data="searchComponent()">

        <div class="flex items-center border border-primary/100 dark:border-white rounded bg-white dark:bg-black/20 overflow-hidden focus-within:border-primary transition w-full">
            <input type="text" placeholder="Search Naway..." x-ref="mobileSearchInput" x-model="query" @input.debounce.300ms="performSearch"
                class="flex-1 text-sm px-4 py-3 border-none focus:ring-0 bg-transparent focus:outline-none placeholder-primary/70 dark:placeholder-white/70 text-accent dark:text-soft">
            <button class="px-4 py-3 text-primary hover:bg-primary/10 transition dark:text-soft bg-primary/5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.35-4.35" />
                </svg>
            </button>
        </div>
        
        <!-- Mobile Results Dropdown -->
        <div x-show="query.length >= 1" style="display: none;" class="mt-2 bg-white dark:bg-[#1a1a1a] border border-primary/30 rounded-xl shadow-xl max-h-64 overflow-y-auto w-full">
            <template x-if="loading">
                <div class="p-4 text-center text-sm opacity-50"><i class="fa-solid fa-spinner fa-spin mr-2"></i>Searching...</div>
            </template>
            <template x-if="!loading && results.length === 0">
                <div class="p-4 text-center text-sm opacity-50">No results found for "<span x-text="query"></span>"</div>
            </template>
            <template x-for="result in results" :key="result.url + result.name">
                <a :href="result.url" class="flex items-center gap-3 px-4 py-3 hover:bg-primary/10 border-b border-primary/10 last:border-0 transition">
                    <template x-if="result.image">
                        <img :src="result.image" class="w-10 h-10 rounded-full object-cover border border-primary/20 shrink-0">
                    </template>
                    <template x-if="!result.image">
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center shrink-0 border border-primary/10">
                            <i class="fa-solid" :class="{
                                'fa-user': result.type === 'Artist' || result.type === 'User',
                                'fa-guitar': result.type === 'Instrument',
                                'fa-music': result.type === 'Maqam' || result.type === 'Genre',
                                'fa-drum': result.type === 'Rhythm'
                            }"></i>
                        </div>
                    </template>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10px] text-primary font-bold uppercase mb-0.5 tracking-wider" x-text="result.type"></div>
                        <div class="text-sm font-semibold text-accent dark:text-soft truncate" x-text="result.name"></div>
                    </div>
                </a>
            </template>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('searchComponent', () => ({
        query: '',
        results: [],
        loading: false,
        async performSearch() {
            if (this.query.length < 1) {
                this.results = [];
                return;
            }
            this.loading = true;
            try {
                let response = await fetch('/search?q=' + encodeURIComponent(this.query));
                this.results = await response.json();
            } catch (e) {
                console.error('Search error:', e);
            }
            this.loading = false;
        }
    }));
});
</script>
