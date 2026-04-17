@extends('layouts.sidebar-layout')

@section('title', 'Genres')

@section('sidebar_title')
    ≡ Genre Index
@endsection

@section('sidebar_nav')
    <nav class="p-4 space-y-1" x-data>
        <button @click="$parent.activeItem = 'classical'" :class="$parent.activeItem === 'classical' || $parent.activeItem === '' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎭 Classical
        </button>
        <button @click="$parent.activeItem = 'pop'" :class="$parent.activeItem === 'pop' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎤 Pop
        </button>
        <button @click="$parent.activeItem = 'folk'" :class="$parent.activeItem === 'folk' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎸 Folk
        </button>
        <button @click="$parent.activeItem = 'jazz'" :class="$parent.activeItem === 'jazz' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎺 Jazz
        </button>
        <button @click="$parent.activeItem = 'sufi'" :class="$parent.activeItem === 'sufi' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🕯️ Sufi
        </button>
        <button @click="$parent.activeItem = 'fusion'" :class="$parent.activeItem === 'fusion' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🔗 Fusion
        </button>
        <button @click="$parent.activeItem = 'bellydance'" :class="$parent.activeItem === 'bellydance' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            💃 Belly Dance
        </button>
    </nav>
@endsection

@section('content')
    <div x-data="{ activeItem: 'classical' }">
        <!-- Classical -->
        <div x-show="activeItem === 'classical'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Classical Arabic Music</h1>
            <p class="text-lg text-primary font-semibold">The Foundation of Arabic Music Heritage</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Classical Arabic music represents the pinnacle of musical sophistication. Rooted in centuries of tradition, it combines complex maqams, intricate rhythms, and masterful instrumentation.
                </p>
            </div>

            <!-- Audio Player -->
            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Classical Masterpieces</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Umm Kulthum - "Enta Omri"</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Sabah Fakhri - Classical Masterpiece</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="bg-accent/10 border border-accent/30 rounded-lg p-4">
                    <h4 class="font-bold text-accent dark:text-soft mb-3">Characteristics</h4>
                    <ul class="space-y-2 text-sm text-accent/70 dark:text-soft/70">
                        <li>• Complex maqam system</li>
                        <li>• Intricate improvisation</li>
                        <li>• Rich orchestrations</li>
                        <li>• Long-form compositions</li>
                    </ul>
                </div>
                <div class="bg-primary/10 border border-primary/30 rounded-lg p-4">
                    <h4 class="font-bold text-accent dark:text-soft mb-3">Legendary Artists</h4>
                    <ul class="space-y-2 text-sm text-accent/70 dark:text-soft/70">
                        <li>• Umm Kulthum</li>
                        <li>• Sabah Fakhri</li>
                        <li>• Abdel Halim Hafez</li>
                        <li>• Fairuz</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pop -->
        <div x-show="activeItem === 'pop'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Arabic Pop Music</h1>
            <p class="text-lg text-primary font-semibold">Modern Rhythms, Timeless Emotions</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Arabic pop music blends contemporary production with traditional melodies and emotional depth.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Pop Hits</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Nancy Ajram - Modern Pop</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <!-- Folk -->
        <div x-show="activeItem === 'folk'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Arabic Folk Music</h1>
            <p class="text-lg text-primary font-semibold">Voices of the People</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Folk music represents the authentic voice of Arabic communities, passed down through generations.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Folk Traditions</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Egyptian Baladi - Urban Folk</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jazz -->
        <div x-show="activeItem === 'jazz'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Arabic Jazz Fusion</h1>
            <p class="text-lg text-primary font-semibold">East Meets West</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Arabic jazz fusion combines the improvisational spirit of jazz with the melodic richness of Arabic music.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Jazz Fusion</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Anouar Brahem - Oud Jazz</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sufi -->
        <div x-show="activeItem === 'sufi'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Sufi Music</h1>
            <p class="text-lg text-primary font-semibold">Spiritual Devotion and Mystical Expression</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Sufi music is deeply spiritual and mystical, seeking connection with the divine through sound.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Sufi Chants</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Qawwali - Divine Chanting</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fusion -->
        <div x-show="activeItem === 'fusion'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Contemporary Fusion</h1>
            <p class="text-lg text-primary font-semibold">Breaking Boundaries, Creating New Sounds</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Contemporary fusion blends traditional elements with electronic production and experimental sounds.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Fusion Sounds</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Dina El Wedidi - Electronic Fusion</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <!-- Belly Dance -->
        <div x-show="activeItem === 'bellydance'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Belly Dance Music</h1>
            <p class="text-lg text-primary font-semibold">Movement and Rhythm United</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Belly dance music combines rhythmic percussion, melodic instruments, and pulsating beats for artistic expression.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">💃 Belly Dance Rhythms</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Maqsum Belly Dance</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
