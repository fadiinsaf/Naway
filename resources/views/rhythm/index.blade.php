@extends('layouts.sidebar-layout')

@section('title', 'Rhythms')

@section('sidebar_title')
    <i class="fa-solid fa-bars"></i> Rhythm Index
@endsection

@section('sidebar_nav')
    <nav class="p-4 space-y-1" x-data>
        <button @click="$parent.activeItem = 'doum'" :class="$parent.activeItem === 'doum' || $parent.activeItem === '' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            <i class="fa-solid fa-drum"></i> Doum
        </button>
        <button @click="$parent.activeItem = 'tak'" :class="$parent.activeItem === 'tak' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            <i class="fa-solid fa-drum"></i> Tak
        </button>
        <button @click="$parent.activeItem = 'maqsum'" :class="$parent.activeItem === 'maqsum' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            <i class="fa-solid fa-drum"></i> Maqsum
        </button>
        <button @click="$parent.activeItem = 'ayub'" :class="$parent.activeItem === 'ayub' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            <i class="fa-solid fa-drum"></i> Ayub
        </button>
        <button @click="$parent.activeItem = 'baladi'" :class="$parent.activeItem === 'baladi' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            <i class="fa-solid fa-drum"></i> Baladi
        </button>
        <button @click="$parent.activeItem = 'saidi'" :class="$parent.activeItem === 'saidi' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            <i class="fa-solid fa-drum"></i> Saidi
        </button>
        <button @click="$parent.activeItem = 'wahhadi'" :class="$parent.activeItem === 'wahhadi' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            <i class="fa-solid fa-drum"></i> Wahhadi
        </button>
    </nav>
@endsection

@section('content')
    <div x-data="{ activeItem: 'doum' }">
        <div x-show="activeItem === 'doum'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft"><i class="fa-solid fa-drum"></i> Doum</h1>
            <p class="text-lg text-primary font-semibold">The Deep Bass Sound</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Doum is the deep bass sound produced by striking the center of a drum head. It is one of the fundamental drum sounds in Arabic music, providing the rhythmic foundation and deep grounding.
                </p>
            </div>

            <div class="bg-soft dark:bg-darkbg border border-primary/30 rounded-lg p-4">
                <h3 class="font-bold text-accent dark:text-soft mb-4">Rhythm Notation</h3>
                <svg class="w-full" viewBox="0 0 800 200" xmlns="http://www.w3.org/2000/svg">
                    <text x="50" y="40" font-size="16" font-weight="bold" fill="#8C5A3C">Doum Pattern (Basic)</text>

                    <rect x="80" y="60" width="60" height="60" fill="#C08552" rx="4"/>
                    <text x="110" y="100" font-size="24" text-anchor="middle" fill="white" font-weight="bold">D</text>

                    <rect x="180" y="100" width="60" height="20" fill="#E0E0E0" rx="4"/>
                    <text x="210" y="117" font-size="12" text-anchor="middle" fill="#666">Rest</text>

                    <rect x="280" y="60" width="60" height="60" fill="#C08552" rx="4"/>
                    <text x="310" y="100" font-size="24" text-anchor="middle" fill="white" font-weight="bold">D</text>

                    <rect x="380" y="100" width="60" height="20" fill="#E0E0E0" rx="4"/>
                    <text x="410" y="117" font-size="12" text-anchor="middle" fill="#666">Rest</text>

                    <text x="50" y="170" font-size="14" fill="#8C5A3C">D = Doum (Deep Bass)</text>
                </svg>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to Doum</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Doum Sound Sample</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'tak'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft"><i class="fa-solid fa-drum"></i> Tak</h1>
            <p class="text-lg text-primary font-semibold">The Sharp Strike Sound</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Tak is the sharp, high-pitched sound produced by striking the rim of the drum. It complements the Doum and adds brightness and definition to rhythm patterns.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to Tak</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Tak Sound Sample</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'maqsum'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft"><i class="fa-solid fa-drum"></i> Maqsum</h1>
            <p class="text-lg text-primary font-semibold">The Classic Rhythm Pattern</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Maqsum is one of the most popular rhythm patterns in Arabic music. It has a 4/4 time signature and is instantly recognizable and widely used.
                </p>
            </div>

            <div class="bg-soft dark:bg-darkbg border border-primary/30 rounded-lg p-4">
                <h3 class="font-bold text-accent dark:text-soft mb-4">Maqsum Pattern (4/4)</h3>
                <svg class="w-full" viewBox="0 0 800 200" xmlns="http://www.w3.org/2000/svg">
                    <text x="50" y="40" font-size="16" font-weight="bold" fill="#8C5A3C">Maqsum Rhythm Cycle</text>

                    <rect x="80" y="60" width="50" height="50" fill="#C08552" rx="3"/>
                    <text x="105" y="92" font-size="18" text-anchor="middle" fill="white" font-weight="bold">D</text>

                    <rect x="150" y="100" width="30" height="10" fill="#8C5A3C" rx="2"/>
                    <text x="165" y="108" font-size="10" text-anchor="middle" fill="white">T</text>

                    <rect x="200" y="100" width="30" height="10" fill="#8C5A3C" rx="2"/>
                    <text x="215" y="108" font-size="10" text-anchor="middle" fill="white">T</text>

                    <rect x="260" y="60" width="50" height="50" fill="#C08552" rx="3"/>
                    <text x="285" y="92" font-size="18" text-anchor="middle" fill="white" font-weight="bold">D</text>

                    <text x="50" y="170" font-size="12" fill="#8C5A3C">D = Doum | T = Tak | This pattern repeats throughout</text>
                </svg>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to Maqsum</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Maqsum Full Rhythm</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>

            <div class="bg-accent/10 border border-accent/30 rounded-lg p-4">
                <h4 class="font-bold text-accent dark:text-soft mb-3">Usage</h4>
                <p class="text-sm text-accent/70 dark:text-soft/70">
                    Used extensively in weddings, celebrations, and popular music. Perfect for belly dancing and folk performances.
                </p>
            </div>
        </div>

        <div x-show="activeItem === 'ayub'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft"><i class="fa-solid fa-drum"></i> Ayub</h1>
            <p class="text-lg text-primary font-semibold">The Energetic Rhythm</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Ayub is a fast, energetic rhythm pattern used primarily in folk music and celebratory occasions. It has a driving and infectious quality.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to Ayub</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Ayub Fast Rhythm</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'baladi'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft"><i class="fa-solid fa-drum"></i> Baladi</h1>
            <p class="text-lg text-primary font-semibold">The Folk Rhythm</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Baladi means "local" or "folk" in Arabic. This rhythm pattern is deeply rooted in Egyptian folk traditions and widely recognized.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to Baladi</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Baladi Folk Rhythm</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'saidi'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft"><i class="fa-solid fa-drum"></i> Saidi</h1>
            <p class="text-lg text-primary font-semibold">The Upper Egyptian Rhythm</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Saidi originates from Upper Egypt and features a distinctive rhythmic pattern. It's faster and more complex than Baladi.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to Saidi</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Saidi Upper Egyptian</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'wahhadi'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft"><i class="fa-solid fa-drum"></i> Wahhadi</h1>
            <p class="text-lg text-primary font-semibold">The Bedouin Desert Rhythm</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Wahhadi originates from desert Bedouin traditions. It features a distinctive double-beat pattern reflecting nomadic lifestyle and culture.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4"><i class="fa-solid fa-music"></i> Listen to Wahhadi</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Wahhadi Bedouin Rhythm</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
