@extends('layouts.sidebar-layout')

@section('title', 'Maqams')

@section('sidebar_title')
    ≡ Maqam Index
@endsection

@section('sidebar_nav')
    <nav class="p-4 space-y-1 h-full overflow-y-auto" x-data>
        <button @click="$parent.activeItem = 'bayati'" :class="$parent.activeItem === 'bayati' || $parent.activeItem === '' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎵 Bayati
        </button>
        <button @click="$parent.activeItem = 'rast'" :class="$parent.activeItem === 'rast' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎵 Rast
        </button>
        <button @click="$parent.activeItem = 'hijaz'" :class="$parent.activeItem === 'hijaz' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎵 Hijaz
        </button>
        <button @click="$parent.activeItem = 'kurd'" :class="$parent.activeItem === 'kurd' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎵 Kurd
        </button>
        <button @click="$parent.activeItem = 'nahawand'" :class="$parent.activeItem === 'nahawand' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎵 Nahawand
        </button>
        <button @click="$parent.activeItem = 'saba'" :class="$parent.activeItem === 'saba' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎵 Saba
        </button>
        <button @click="$parent.activeItem = 'sikah'" :class="$parent.activeItem === 'sikah' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎵 Sikah
        </button>
        <button @click="$parent.activeItem = 'ajam'" :class="$parent.activeItem === 'ajam' ? 'bg-primary text-soft' : 'text-soft/70 hover:text-soft hover:bg-primary/20'"
            class="w-full text-left px-4 py-3 rounded-lg transition font-semibold text-sm">
            🎵 Ajam
        </button>
    </nav>
@endsection

@section('content')
    <div x-data="{ activeItem: 'bayati' }" class="h-full overflow-y-auto pb-8 pr-2">
        <div x-show="activeItem === 'bayati'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam Bayati</h1>
            <p class="text-lg text-primary font-semibold">The Most Popular Maqam</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Bayati is one of the most popular maqams in Arabic music. It is known for its melancholic and emotional character. The maqam begins and ends on the note Rast, and is constructed from the tonic note up an octave and back.
                </p>
            </div>

            <div class="bg-soft dark:bg-darkbg border border-primary/30 rounded-lg p-4">
                <h3 class="font-bold text-accent dark:text-soft mb-4">Musical Scale Notation</h3>
                <svg class="w-full" viewBox="0 0 800 300" xmlns="http://www.w3.org/2000/svg">
                    <line x1="50" y1="80" x2="750" y2="80" stroke="#8C5A3C" stroke-width="2"/>
                    <line x1="50" y1="100" x2="750" y2="100" stroke="#8C5A3C" stroke-width="2"/>
                    <line x1="50" y1="120" x2="750" y2="120" stroke="#8C5A3C" stroke-width="2"/>
                    <line x1="50" y1="140" x2="750" y2="140" stroke="#8C5A3C" stroke-width="2"/>
                    <line x1="50" y1="160" x2="750" y2="160" stroke="#8C5A3C" stroke-width="2"/>

                    <text x="30" y="130" font-size="40" fill="#8C5A3C">𝄞</text>

                    <circle cx="100" cy="140" r="6" fill="#C08552"/>
                    <rect x="100" y="120" width="2" height="20" fill="#C08552"/>

                    <circle cx="150" cy="130" r="6" fill="#C08552"/>
                    <rect x="150" y="110" width="2" height="20" fill="#C08552"/>

                    <circle cx="200" cy="120" r="6" fill="#C08552"/>
                    <rect x="200" y="100" width="2" height="20" fill="#C08552"/>

                    <circle cx="250" cy="140" r="6" fill="#C08552"/>
                    <rect x="250" y="120" width="2" height="20" fill="#C08552"/>

                    <circle cx="300" cy="160" r="6" fill="#C08552"/>
                    <rect x="300" y="140" width="2" height="20" fill="#C08552"/>

                    <text x="50" y="200" font-size="14" fill="#8C5A3C">Bayati Scale Progression</text>
                </svg>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Listen to Bayati</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Umm Kulthum - "Enta Omri"</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Fairuz - "Sabah Al-Khir"</p>
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
                        <li>• Descending melodic line</li>
                        <li>• Emotional and expressive</li>
                        <li>• Used in sad compositions</li>
                        <li>• Rich in modulations</li>
                    </ul>
                </div>
                <div class="bg-primary/10 border border-primary/30 rounded-lg p-4">
                    <h4 class="font-bold text-accent dark:text-soft mb-3">Famous Pieces</h4>
                    <ul class="space-y-2 text-sm text-accent/70 dark:text-soft/70">
                        <li>• "Enta Omri"</li>
                        <li>• "Al Atlal"</li>
                        <li>• "Sabah Al-Khir"</li>
                        <li>• "Habibi"</li>
                    </ul>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'rast'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam Rast</h1>
            <p class="text-lg text-primary font-semibold">The Ascending Maqam</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Rast is characterized by its bright and ascending melodic line. It is one of the most fundamental maqams and serves as the basis for many other maqams. The Rast family is the largest family of maqams.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Listen to Rast</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Sabah Fakhri - Rast Classical</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'hijaz'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam Hijaz</h1>
            <p class="text-lg text-primary font-semibold">The Ornamental Maqam</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Hijaz is known for its sharp intervals and ornamental character. It has a distinctive sound with augmented seconds that give it a unique and recognizable character.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Listen to Hijaz</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Fairuz - Hijaz Classic</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'kurd'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam Kurd</h1>
            <p class="text-lg text-primary font-semibold">The Minor Maqam</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Kurd is similar to the natural minor scale. It has a dark and introspective character, often used for dramatic and intense compositions.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Listen to Kurd</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Umm Kulthum - Kurd Classical</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'nahawand'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam Nahawand</h1>
            <p class="text-lg text-primary font-semibold">The Romantic Maqam</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Nahawand is known for its romantic and sentimental character. It shares similarities with the major scale but with characteristic Arabic ornamentations.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Listen to Nahawand</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Fairuz - Nahawand Romance</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'saba'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam Saba</h1>
            <p class="text-lg text-primary font-semibold">The Melancholic Maqam</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Saba is characterized by its melancholic and deeply introspective nature. It features distinctive interval patterns that create a unique emotional landscape.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Listen to Saba</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Umm Kulthum - Saba Masterpiece</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'sikah'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam Sikah</h1>
            <p class="text-lg text-primary font-semibold">The Majestic Maqam</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Sikah is known for its majestic and grand character. It features unique interval patterns that create a sophisticated sound.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Listen to Sikah</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Sabah Fakhri - Sikah Grand</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="activeItem === 'ajam'" x-transition class="space-y-6">
            <h1 class="text-4xl font-bold text-accent dark:text-soft">Maqam Ajam</h1>
            <p class="text-lg text-primary font-semibold">The Major Maqam</p>

            <div class="bg-primary/10 border-l-4 border-primary rounded p-6">
                <p class="text-accent/70 dark:text-soft/70 leading-relaxed">
                    Ajam is the maqam closest to the Western major scale. Despite its Western similarities, it maintains a unique Arabic character through ornamentation.
                </p>
            </div>

            <div class="bg-primary/20 border border-primary/40 rounded-lg p-6">
                <h3 class="font-bold text-accent dark:text-soft mb-4">🎵 Listen to Ajam</h3>
                <div class="space-y-4">
                    <div class="bg-soft dark:bg-darkbg rounded-lg p-4">
                        <p class="text-sm font-semibold text-accent dark:text-soft mb-2">Mohammed Abdo - Ajam Joy</p>
                        <audio controls class="w-full" style="accent-color: #C08552;">
                            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
