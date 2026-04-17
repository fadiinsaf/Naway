<div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity class="fixed inset-0 bg-darkbg/80 z-30 lg:hidden" x-cloak></div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed lg:static inset-y-0 left-0 w-64 bg-soft dark:bg-darkbg border-r border-primary/20 transform lg:translate-x-0 transition-transform duration-300 ease-in-out z-40 flex flex-col">

    <div class="h-16 flex items-center px-6 border-b border-primary/20 shrink-0">
        <span class="text-2xl font-bold text-primary">Naway <span class="text-accent dark:text-soft text-sm">Admin</span></span>
    </div>

    <div class="flex-1 overflow-y-auto py-6 px-4 flex flex-col justify-between">

        <div class="space-y-6">
            <div>
                <nav class="space-y-1">
                    <a href="/admin/dashboard" class="flex items-center gap-3 px-3 py-2 text-accent dark:text-soft hover:bg-primary hover:text-soft rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span class="font-medium text-sm">Home</span>
                    </a>
                </nav>
            </div>

            <div>
                <div class="text-[10px] font-bold text-primary uppercase tracking-widest mb-2 px-3">Music Library</div>
                <nav class="space-y-1">
                    <a href="/admin/artists" class="flex items-center gap-3 px-3 py-2 text-accent dark:text-soft hover:bg-primary hover:text-soft rounded-lg transition">
                        <span class="font-medium text-sm">Artists</span>
                    </a>
                    <a href="/admin/instruments" class="flex items-center gap-3 px-3 py-2 text-accent dark:text-soft hover:bg-primary hover:text-soft rounded-lg transition">
                        <span class="font-medium text-sm">Instruments</span>
                    </a>
                    <a href="/admin/rhythms" class="flex items-center gap-3 px-3 py-2 text-accent dark:text-soft hover:bg-primary hover:text-soft rounded-lg transition">
                        <span class="font-medium text-sm">Rhythms (Iqa'at)</span>
                    </a>
                    <a href="/admin/maqams" class="flex items-center gap-3 px-3 py-2 text-accent dark:text-soft hover:bg-primary hover:text-soft rounded-lg transition">
                        <span class="font-medium text-sm">Maqams</span>
                    </a>
                    <a href="/admin/genres" class="flex items-center gap-3 px-3 py-2 text-accent dark:text-soft hover:bg-primary hover:text-soft rounded-lg transition">
                        <span class="font-medium text-sm">Genres</span>
                    </a>
                </nav>
            </div>

            <div>
                <div class="text-[10px] font-bold text-primary uppercase tracking-widest mb-2 px-3">Moderation</div>
                <nav class="space-y-1">
                    <a href="/admin/comments" class="flex items-center gap-3 px-3 py-2 text-accent dark:text-soft hover:bg-primary hover:text-soft rounded-lg transition">
                        <span class="font-medium text-sm">Comments</span>
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3 px-3 py-2 text-accent dark:text-soft hover:bg-primary hover:text-soft rounded-lg transition">
                        <span class="font-medium text-sm">Users</span>
                    </a>
                </nav>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-primary/20">
            <form method="POST" action="">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="font-medium text-sm">Logout</span>
                </button>
            </form>
        </div>

    </div>
</aside>
