<nav class="bg-darkbg dark:bg-[#3a2220] border-b border-primary/20">
    <div class="px-4 flex items-center justify-between">
        <ul class="flex items-center text-[13px] font-semibold uppercase tracking-wide text-soft/85">
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
            <li><a href="/about" class="px-4 h-11 flex items-center hover:bg-primary/25 transition">About</a></li>
        </ul>

        <div class="flex items-center gap-1" x-data="{ dark: false, profileOpen: false, isLoggedIn: false }" :class="{ 'dark': dark }">
            <button
                class="text-xs px-2.5 py-1 border border-primary/50 text-primary rounded hover:bg-primary hover:text-soft transition font-semibold">
                EN ▾
            </button>

            <button
                class="p-2 rounded hover:bg-primary/25 transition text-soft/80 hover:text-soft">
                <span x-show="!dark">🌙</span>
                <span x-show="dark">☀️</span>
            </button>

            <div x-show="!isLoggedIn" class="flex items-center gap-2 mr-2 ml-2">
                <a href="/signin"
                    class="text-xs px-4 py-1.5 border border-primary/50 text-primary rounded hover:bg-primary/20 transition font-semibold">
                    Sign In
                </a>
                <a href="/signup"
                    class="text-xs px-4 py-1.5 bg-primary text-soft rounded hover:bg-accent transition font-semibold">
                    Sign Up
                </a>
            </div>

            <div x-show="isLoggedIn" class="flex items-center gap-1">
                <button class="relative p-2 rounded hover:bg-primary/25 transition text-soft/80 hover:text-soft">
                    🔔
                    <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-primary rounded-full"></span>
                </button>

                <div class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center p-1">
                        <img src="https://i.pravatar.cc/40" class="w-7 h-7 rounded-full ring-2 ring-primary/50">
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-primary rounded-full border border-darkbg"></span>
                    </button>
                    <div x-show="profileOpen" @click.outside="profileOpen = false"
                        class="absolute right-0 mt-2 w-48 bg-soft dark:bg-darkbg shadow-lg border border-primary/30 rounded z-50"
                        x-transition>
                        <a href="#"
                            class="block px-4 py-2 text-accent dark:text-soft hover:bg-primary/20 transition">⚙
                            Settings</a>
                        <a href="#"
                            class="block px-4 py-2 text-accent dark:text-soft hover:bg-primary/20 transition">💬
                            Messages</a>
                        <hr class="border-primary/30">
                        <a href="#"
                            class="block px-4 py-2 text-red-500 hover:bg-red-100 dark:hover:bg-red-900/40 transition">🚪
                            Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
