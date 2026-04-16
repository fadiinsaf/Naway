<!DOCTYPE html>
<html lang="en" x-data="{ dark: false }" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <title>Messages - Naway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.svg') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#C08552',
                        accent: '#8C5A3C',
                        darkbg: '#4B2E2B',
                        soft: '#FFF8F0'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'IBM Plex Sans', 'IBM Plex Sans Arabic', sans-serif;
        }

        /* Custom subtle scrollbar to match the theme */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(192, 133, 82, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(192, 133, 82, 0.8);
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body
    class="bg-soft dark:bg-[#432926] text-accent dark:text-soft h-screen w-full flex flex-col overflow-hidden m-0 p-0">

    <div
        class="bg-white dark:bg-darkbg/90 backdrop-blur-md border-b border-accent/10 p-4 flex items-center justify-between shrink-0 z-20 shadow-sm">
        <div class="flex items-center gap-4">
            <a href="/messages"
                class="text-accent/50 hover:text-primary transition p-2 -ml-2 rounded-xl hover:bg-primary/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div class="relative">
                <div class="w-12 h-12 rounded-full bg-primary/20 overflow-hidden cursor-pointer">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ahmad" alt="Ahmad"
                        class="w-full h-full object-cover">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white dark:border-darkbg">
                </div>
            </div>
            <div>
                <h2 class="font-bold text-accent dark:text-soft text-lg leading-tight cursor-pointer hover:underline">
                    Ahmad Yassine</h2>
                <p class="text-xs text-primary font-medium flex items-center gap-1">typing...</p>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <button class="p-2.5 text-accent/60 hover:text-primary rounded-full hover:bg-primary/10 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <div
        class="flex-1 overflow-y-auto p-4 sm:p-6 lg:px-24 space-y-6 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNDMDg1NTIiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] relative z-10">

        <div class="flex justify-center my-4">
            <span
                class="text-xs font-bold text-accent/60 dark:text-soft/60 bg-white/60 dark:bg-black/30 backdrop-blur-sm rounded-full px-4 py-1.5 shadow-sm uppercase tracking-wide">Yesterday</span>
        </div>

        <div class="flex gap-3 max-w-[85%] sm:max-w-[70%]">
            <div class="w-8 h-8 rounded-full bg-primary/20 shrink-0 mt-auto overflow-hidden hidden sm:block shadow-sm">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ahmad" alt="Ahmad">
            </div>
            <div>
                <div
                    class="bg-white dark:bg-[#5C3A36] border border-accent/5 text-accent dark:text-soft p-3.5 rounded-2xl rounded-bl-sm shadow-sm text-[15px] leading-relaxed">
                    Hey! How is your practice with Maqam Kurd going? Did you check out the notes I sent?
                </div>
                <span class="text-[11px] font-medium text-accent/50 dark:text-soft/50 mt-1.5 ml-1 block">10:30 AM</span>
            </div>
        </div>

        <div class="flex gap-3 max-w-[85%] sm:max-w-[70%] ml-auto justify-end">
            <div class="items-end flex flex-col">
                <div class="bg-primary text-soft p-3.5 rounded-2xl rounded-br-sm shadow-md text-[15px] leading-relaxed">
                    It's going well! I'm still trying to get the phrasing right on the descent, but it's such a
                    beautiful scale. Thanks for the notes!
                </div>
                <div class="flex items-center gap-1 mt-1.5 mr-1">
                    <span class="text-[11px] font-medium text-accent/50 dark:text-soft/50">10:35 AM</span>
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex justify-center my-4">
            <span
                class="text-xs font-bold text-accent/60 dark:text-soft/60 bg-white/60 dark:bg-black/30 backdrop-blur-sm rounded-full px-4 py-1.5 shadow-sm uppercase tracking-wide">Today</span>
        </div>

        <div class="flex gap-3 max-w-[85%] sm:max-w-[70%]">
            <div class="w-8 h-8 rounded-full bg-primary/20 shrink-0 mt-auto overflow-hidden hidden sm:block shadow-sm">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ahmad" alt="Ahmad">
            </div>
            <div>
                <div
                    class="bg-white dark:bg-[#5C3A36] border border-accent/5 p-3.5 rounded-2xl rounded-bl-sm shadow-sm flex flex-col gap-2 min-w-[250px]">
                    <p class="text-[14px] text-accent dark:text-soft">Check out this sheet music for the Kurd descent we
                        talked about. Notice the phrasing on the B half-flat.</p>
                    <div class="mt-1 rounded-xl overflow-hidden border border-accent/10">
                        <img src="https://images.unsplash.com/photo-1507838153428-9d983cbc9f41?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Sheet music"
                            class="w-full h-auto object-cover hover:opacity-90 transition cursor-pointer">
                    </div>
                </div>
                <span class="text-[11px] font-medium text-accent/50 dark:text-soft/50 mt-1.5 ml-1 block">10:42 AM</span>
            </div>
        </div>

        <div class="flex gap-3 max-w-[85%] sm:max-w-[70%]">
            <div class="w-8 h-8 rounded-full bg-primary/20 shrink-0 mt-auto overflow-hidden hidden sm:block shadow-sm">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ahmad" alt="Ahmad">
            </div>
            <div>
                <div
                    class="bg-white dark:bg-[#5C3A36] border border-accent/5 p-3.5 rounded-2xl rounded-bl-sm shadow-sm flex items-center gap-1 w-16 h-10">
                    <div class="w-2 h-2 bg-primary/60 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-primary/60 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-primary/60 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                </div>
            </div>
        </div>

        <div class="h-4"></div>
    </div>

    <div class="bg-white dark:bg-darkbg/90 backdrop-blur-md border-t border-accent/10 p-3 sm:p-5 shrink-0 z-20">
        <div
            class="flex items-center bg-soft dark:bg-black/30 border border-accent/20 focus-within:border-primary/50 focus-within:ring-2 focus-within:ring-primary/20 rounded-full pl-2 pr-2 py-1.5 transition-all max-w-5xl mx-auto shadow-sm">

            <div class="flex items-center gap-1 shrink-0">
                <button
                    class="p-2.5 text-accent/50 hover:text-primary transition rounded-full hover:bg-black/5 dark:hover:bg-white/5"
                    title="Attach Image or File">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                        </path>
                    </svg>
                </button>
            </div>

            <textarea rows="1" placeholder="Write a message..."
                class="flex-1 bg-transparent py-2.5 px-3 text-[15px] resize-none focus:outline-none text-accent dark:text-soft placeholder-accent/40 max-h-32 hide-scrollbar self-center"></textarea>

            <div class="flex items-center shrink-0 ml-1">
                <button
                    class="w-10 h-10 flex items-center justify-center bg-primary text-white rounded-full hover:bg-accent hover:scale-105 active:scale-95 transition-all shadow-md"
                    title="Send Message">
                    <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

</body>

</html>
