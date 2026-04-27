<nav x-data="{ mobileMenuOpen: false }" class="bg-darkbg dark:bg-[#3a2220] border-b border-primary/20">
    <div class="px-4 flex items-center justify-between h-14">

        <!-- Mobile Menu Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-primary dark:text-soft/80 hover:text-accent dark:hover:text-soft transition">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>

        <ul class="hidden lg:flex items-center text-[13px] font-semibold uppercase tracking-wide text-soft/85">
            <li>
                <a href="/home"
                    class="flex items-center justify-center w-11 h-11 hover:bg-primary/25 transition border-r border-primary/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L2 9h2v9h5v-5h2v5h5V9h2L10 2z" />
                    </svg>
                </a>
            </li>
            <li><a href="/artists"
                    class="px-4 h-11 flex items-center hover:bg-primary/25 transition border-r border-primary/20">Artists</a>
            </li>
            <li><a href="/instruments"
                    class="px-4 h-11 flex items-center hover:bg-primary/25 transition border-r border-primary/20">Instruments</a>
            </li>
            <li><a href="/maqams"
                    class="px-4 h-11 flex items-center hover:bg-primary/25 transition border-r border-primary/20">Maqams</a>
            </li>
            <li><a href="/rhythms"
                    class="px-4 h-11 flex items-center hover:bg-primary/25 transition border-r border-primary/20">Rhythms</a>
            </li>
            <li><a href="/genres"
                    class="px-4 h-11 flex items-center hover:bg-primary/25 transition border-r border-primary/20">Genres</a>
            </li>
            <li><a href="/social"
                    class="px-4 h-11 flex items-center hover:bg-primary/25 transition border-r border-primary/20">Social</a>
            </li>
            <li><a href="/about" class="px-4 h-11 flex items-center border-r border-primary/20 hover:bg-primary/25 transition">About</a></li>
            @if(Auth::check() && Auth::user()->role === 'admin')
            <li><a href="/admin/dashboard"
                    class="px-4 h-11 flex items-center text-primary dark:text-primary hover:bg-primary/25 transition border-r border-primary/20">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    Admin
                </a>
            </li>
            @endif
        </ul>

        <div class="flex items-center gap-2">
            <button
                class="hidden md:block text-xs px-3 py-1.5 border border-primary/50 text-primary rounded-md hover:bg-primary hover:text-soft transition font-semibold">
                EN <i class="fa-solid fa-caret-down ml-1.5"></i>
            </button>

            <button @click="dark = !dark; @auth fetch('{{ route('profile.theme.update') }}', { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content') }, body: JSON.stringify({ theme_mode: dark ? 'DARK' : 'LIGHT' }) }) @endauth" class="p-2.5 rounded-md hover:bg-primary/20 dark:hover:bg-primary/25 transition text-primary dark:text-soft/80 dark:hover:text-soft">
                <span x-show="!dark"><i class="fa-solid fa-moon text-base"></i></span>
                <span x-show="dark"><i class="fa-solid fa-sun text-base"></i></span>
            </button>

            @guest
            <div class="flex items-center gap-2 ml-2">
                <a href="/signin"
                    class="text-xs px-4 py-1.5 border border-primary/50 text-primary rounded-md hover:bg-primary/20 transition font-semibold">
                    Sign In
                </a>
                <a href="/signup"
                    class="text-xs px-4 py-1.5 bg-primary text-soft rounded-md hover:bg-primary/90 transition font-semibold">
                    Sign Up
                </a>
            </div>
            @endguest

            @auth
            <div class="flex items-center gap-2 ml-2">
                <button class="relative p-2.5 rounded-md hover:bg-primary/20 dark:hover:bg-primary/25 transition text-primary dark:text-soft/80 dark:hover:text-soft">
                    <i class="fa-solid fa-bell text-base"></i>
                    <span class="absolute top-2 right-2 w-1.5 h-1.5 bg-primary rounded-full"></span>
                </button>

                <div class="relative pl-3" x-data="{ profileOpen: false }">
                    <button @click="profileOpen = !profileOpen" class="flex items-center p-1 rounded-md hover:bg-primary/20 dark:hover:bg-primary/25 transition">
                        <img class="w-11 h-11 rounded-full object-cover border border-primary/30 shadow-sm"
                            src="{{ Auth::check() && Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://ui-avatars.com/api/?name=' . (Auth::check() ? urlencode(Auth::user()->name) : 'User') . '&background=6B7280&color=ffffff&size=36' }}"
                            alt="Profile">
                    </button>

                    <div x-show="profileOpen" @click.outside="profileOpen = false"
                        class="absolute right-0 mt-2 w-52 bg-soft dark:bg-darkbg shadow-xl border border-primary/30 rounded-lg z-50 py-2 overflow-hidden"
                        x-transition>

                        <!-- Profile Header -->
                        <div class="px-4 py-3 border-b border-primary/20">
                            <p class="text-xs font-semibold text-accent dark:text-soft uppercase tracking-wide">{{ Auth::user()->name ?? 'Profile' }}</p>
                            <p class="text-xs text-primary/70 dark:text-soft/60 mt-1">{{ Auth::user()->email ?? '' }}</p>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center px-4 py-2.5 text-accent dark:text-soft hover:bg-primary/15 dark:hover:bg-primary/20 transition group text-xs">
                            <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100 transition-opacity" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>

                        <a href="/messages"
                            class="flex items-center px-4 py-2.5 text-accent dark:text-soft hover:bg-primary/15 dark:hover:bg-primary/20 transition group text-xs">
                            <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100 transition-opacity" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                </path>
                            </svg>
                            Messages
                        </a>

                        <a href="/game"
                            class="flex items-center px-4 py-2.5 text-accent dark:text-soft hover:bg-primary/15 dark:hover:bg-primary/20 transition group text-xs">
                            <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100 transition-opacity" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                                </path>
                            </svg>
                            Memory Game
                        </a>

                        @if(Auth::check() && Auth::user()->role === 'admin')
                        <a href="/admin/dashboard"
                            class="flex items-center px-4 py-2.5 text-accent dark:text-soft hover:bg-primary/15 dark:hover:bg-primary/20 transition group text-xs border-t border-primary/20">
                            <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100 transition-opacity" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                            Admin Dashboard
                        </a>
                        @endif

                        <hr class="border-primary/20 my-1.5">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center px-4 py-2.5 text-red-600 dark:text-red-500 hover:bg-red-100 dark:hover:bg-red-900/30 transition text-xs">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Logout
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            @endauth
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition class="lg:hidden border-t border-primary/20 bg-darkbg dark:bg-[#3a2220]">
        <ul class="flex flex-col text-sm font-semibold uppercase tracking-wide text-soft/85 py-2">
            <li><a href="/home" class="block px-4 py-3 hover:bg-primary/25 transition">Home</a></li>
            <li><a href="/artists" class="block px-4 py-3 hover:bg-primary/25 transition">Artists</a></li>
            <li><a href="/instruments" class="block px-4 py-3 hover:bg-primary/25 transition">Instruments</a></li>
            <li><a href="/maqams" class="block px-4 py-3 hover:bg-primary/25 transition">Maqams</a></li>
            <li><a href="/rhythms" class="block px-4 py-3 hover:bg-primary/25 transition">Rhythms</a></li>
            <li><a href="/genres" class="block px-4 py-3 hover:bg-primary/25 transition">Genres</a></li>
            <li><a href="/social" class="block px-4 py-3 hover:bg-primary/25 transition">Social</a></li>
            <li><a href="/about" class="block px-4 py-3 hover:bg-primary/25 transition">About</a></li>
            @if(Auth::check() && Auth::user()->role === 'admin')
            <li><a href="/admin/dashboard" class="block px-4 py-3 text-primary hover:bg-primary/25 transition">Admin Dashboard</a></li>
            @endif
        </ul>
    </div>
</nav>
