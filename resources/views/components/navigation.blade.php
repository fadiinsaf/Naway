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

        <div class="flex items-center gap-1">
            <button
                class="text-xs px-2.5 py-1 border border-primary/50 text-primary rounded hover:bg-primary hover:text-soft transition font-semibold">
                EN <i class="fa-solid fa-caret-down"></i>
            </button>

            <button @click="dark = !dark" class="p-2 rounded hover:bg-primary/25 transition text-soft/80 hover:text-soft">
                <span x-show="!dark"><i class="fa-solid fa-moon"></i></span>
                <span x-show="dark"><i class="fa-solid fa-sun"></i></span>
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
                    <i class="fa-solid fa-bell"></i>
                    <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-primary rounded-full"></span>
                </button>

                <div class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center p-1">
                        <img src="https://i.pravatar.cc/40" class="w-7 h-7 rounded-full ring-2 ring-primary/50">
                        <span
                            class="absolute top-1.5 right-1.5 w-2 h-2 bg-primary rounded-full border border-darkbg"></span>
                    </button>

                    <div x-show="profileOpen" @click.outside="profileOpen = false"
                        class="absolute right-0 mt-2 w-48 bg-soft dark:bg-darkbg shadow-lg border border-primary/30 rounded z-50 py-1"
                        x-transition>

                        <a href="#"
                            class="flex items-center px-4 py-2 text-accent dark:text-soft hover:bg-primary/20 transition group">
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
                            class="flex items-center px-4 py-2 text-accent dark:text-soft hover:bg-primary/20 transition group">
                            <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100 transition-opacity" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                </path>
                            </svg>
                            Messages
                        </a>

                        <a href="/game"
                            class="flex items-center px-4 py-2 text-accent dark:text-soft hover:bg-primary/20 transition group">
                            <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100 transition-opacity" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                                </path>
                            </svg>
                            Memory Game
                        </a>

                        <hr class="border-primary/30 my-1">

                        <a href="#"
                            class="flex items-center px-4 py-2 text-red-500 hover:bg-red-100 dark:hover:bg-red-900/40 transition">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Logout
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
