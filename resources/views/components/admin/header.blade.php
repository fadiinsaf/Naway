<header
    class="bg-soft dark:bg-darkbg border-b border-primary/20 h-16 flex items-center justify-between px-4 sm:px-6 shrink-0 z-20">
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = true"
            class="lg:hidden p-2 -ml-2 text-primary hover:bg-primary/10 rounded-xl transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
        <h1 class="text-xl font-bold text-accent dark:text-soft hidden sm:block">Admin Portal</h1>
    </div>

    <div class="flex items-center gap-4">
        <button @click="dark = !dark; @auth fetch('{{ route('profile.theme.update') }}', { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content') }, body: JSON.stringify({ theme_mode: dark ? 'DARK' : 'LIGHT' }) }) @endauth" class="p-2 text-primary hover:bg-primary/10 rounded-xl transition">
            <svg x-show="!dark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <svg x-show="dark" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
        </button>

        <a href="/home" class="hidden md:flex items-center gap-2 text-xs px-3 py-1.5 border border-primary/50 text-primary rounded-md hover:bg-primary/10 transition font-semibold">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Member Site
        </a>

        <div class="h-6 w-px bg-primary/20"></div>

        <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-2 font-medium text-sm hover:bg-primary/10 p-1 pr-3 rounded-full transition cursor-pointer">
            <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center text-primary border border-primary/40 overflow-hidden">
                @if(Auth::check() && Auth::user()->profile_image)
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile" class="w-full h-full object-cover">
                @else
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                @endif
            </div>
            <span class="hidden md:block">{{ Auth::check() ? Auth::user()->name : 'Admin' }}</span>
        </a>
    </div>
</header>
