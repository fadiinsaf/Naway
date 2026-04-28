@extends('layouts.admin')
@section('content')
    <div x-data="{
                createModalOpen: false,
                editModalOpen: false,
                deleteModalOpen: false,
                bioModalOpen: false,
                currentItem: null,
                deleteUrl: '',
                playingUrl: null,
                audioPlayer: new Audio()
            }" x-init="
                audioPlayer.addEventListener('ended', () => { playingUrl = null; });
                $watch('playingUrl', url => {
                    if(url) {
                        audioPlayer.src = url;
                        audioPlayer.play();
                    } else {
                        audioPlayer.pause();
                    }
                });
            " class="relative">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-accent dark:text-soft">Artists Management</h2>
                <p class="text-sm opacity-70">Add, edit, or delete artist profiles.</p>
            </div>
            <button @click="createModalOpen = true"
                class="bg-primary text-soft px-4 py-2 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                + Add Artist
            </button>
        </div>

        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-4 rounded-xl mb-6">
                <ul class="list-disc list-inside text-sm font-bold">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-soft dark:bg-darkbg border border-primary/20 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary/5 text-xs uppercase tracking-wider text-primary border-b border-primary/20">
                        <th class="p-4">Artist</th>
                        <th class="p-4">Biography</th>
                        <th class="p-4">Top Songs (Audio Examples)</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-primary/10 text-sm">
                    @forelse($artists as $artist)
                        <tr class="hover:bg-primary/5 transition group">
                            <td class="p-4 flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full border border-primary/30 overflow-hidden shrink-0 shadow-sm">
                                    <img src="{{ $artist->image ?? 'https://images.unsplash.com/photo-1493225457124-a1a2a5f5f4f7?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80' }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <span class="font-bold text-accent dark:text-soft text-base">{{ $artist->name }}</span>
                                    <div class="text-xs opacity-60 mt-0.5">{{ $artist->nationality ?? 'Unknown' }}</div>
                                </div>
                            </td>
                            <td class="p-4">
                                @if($artist->biography)
                                    <p class="opacity-80 text-xs max-w-[200px] truncate mb-1">
                                        {{ Str::limit($artist->biography, 50) }}</p>
                                    <button @click="currentItem = {{ json_encode($artist) }}; bioModalOpen = true"
                                        class="text-xs text-primary hover:underline font-medium">Read more</button>
                                @else
                                    <span class="opacity-50 text-xs">No biography</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="flex flex-wrap gap-2">
                                    @if($artist->audio_examples && is_array($artist->audio_examples))
                                        @foreach($artist->audio_examples as $index => $song)
                                            <button
                                                @click="if(playingUrl === '{{ $song }}') { playingUrl = null; } else { playingUrl = '{{ $song }}'; }"
                                                class="inline-flex items-center gap-2 px-2.5 py-1 bg-primary/10 text-primary border border-primary/20 rounded-lg text-xs font-medium hover:bg-primary hover:text-soft transition">
                                                <i class="fa-solid text-[10px]"
                                                    :class="playingUrl === '{{ $song }}' ? 'fa-pause' : 'fa-play'"></i>
                                                Example {{ $index + 1 }}
                                            </button>
                                        @endforeach
                                    @else
                                        <span class="opacity-50 text-xs">No top songs</span>
                                    @endif
                                </div>
                            </td>
                            <td class="p-4 text-right">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button @click="currentItem = {{ json_encode($artist) }}; editModalOpen = true"
                                        class="px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary hover:text-soft rounded-lg transition text-xs font-bold">Edit</button>
                                    <button
                                        @click="currentItem = {{ json_encode($artist) }}; deleteUrl = '{{ route('admin.artists.destroy', $artist) }}'; deleteModalOpen = true"
                                        class="px-3 py-1.5 border border-red-500/50 text-red-500 hover:bg-red-500 hover:text-soft rounded-lg transition text-xs font-bold">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center opacity-70">No artists found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div x-show="createModalOpen" x-cloak
            class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm"
            x-transition.opacity>
            <div @click.away="createModalOpen = false"
                class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative"
                x-transition.scale.90>
                <h3 class="text-xl font-bold text-accent dark:text-soft mb-6">Add Artist</h3>
                <form action="{{ route('admin.artists.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4 max-h-[70vh] overflow-y-auto pr-1">

                        <div>
                            <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" placeholder="Artist Name" required
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Nationality <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="nationality" placeholder="e.g. American" required
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">City <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="city" placeholder="e.g. New York" required
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Birthday <span
                                        class="text-red-500">*</span></label>
                                <input type="date" name="birth_day" required
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Date of Death</label>
                                <input type="date" name="date_of_death"
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Years Active <span class="text-red-500">*</span></label>
                                <input required type="number" name="years_active" placeholder="e.g. 25" min="0"
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Songs <span class="text-red-500">*</span></label>
                                <input required type="number" name="songs" placeholder="e.g. 120" min="0"
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Films <span class="text-red-500">*</span></label>
                            <input required type="number" name="films" placeholder="e.g. 4"  min="0"
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                                                
                        <div>
                            <label class="block text-sm font-medium mb-1">Biography <span class="text-red-500">*</span></label>
                            <textarea required name="biography" rows="3" placeholder="Artist Biography"
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Image Upload <span class="text-red-500">*</span></label>
                            <input required type="file" name="image" accept="image/*"
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Audio Examples (Max 3 files) <span class="text-red-500">*</span></label>
                            <input required type="file" name="audio_examples[]" accept="audio/*" multiple
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>

                    </div>
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="createModalOpen = false"
                            class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                        <button type="submit"
                            class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Create
                            Artist</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="editModalOpen" x-cloak
            class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm"
            x-transition.opacity>
            <div @click.away="editModalOpen = false"
                class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative"
                x-transition.scale.90>
                <h3 class="text-xl font-bold text-accent dark:text-soft mb-6">Edit Artist</h3>
                <form :action="currentItem ? '/admin/artists/' + currentItem.id : '#'" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4 max-h-[70vh] overflow-y-auto pr-1">

                        <div>
                            <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" x-model="currentItem.name" required
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Nationality <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="nationality" x-model="currentItem.nationality"
                                    placeholder="e.g. American" required
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">City <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="city" x-model="currentItem.city" placeholder="e.g. New York"
                                    required
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Birthday <span
                                        class="text-red-500">*</span></label>
                                <input type="date" name="birth_day" x-model="currentItem.birth_day" required
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Date of Death</label>
                                <input type="date" name="date_of_death" x-model="currentItem.date_of_death"
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium mb-1">Years Active <span class="text-red-500">*</span></label>
                                <input required type="number" name="years_active" x-model="currentItem.years_active" placeholder="e.g. 25" min="0"
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Songs <span class="text-red-500">*</span></label>
                                <input required type="number" name="songs" x-model="currentItem.songs" placeholder="e.g. 120" min="0"
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Films <span class="text-red-500">*</span></label>
                            <input required type="number" name="films" x-model="currentItem.films" placeholder="e.g. 4"  min="0"
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Biography <span class="text-red-500">*</span></label>
                            <textarea required name="biography" x-model="currentItem.biography" rows="3"
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Image Upload <span
                                    class="opacity-50 font-normal">(leave empty to keep current)</span></label>
                            <div class="flex items-center gap-3">
                                <img :src="currentItem?.image ?? 'https://images.unsplash.com/photo-1493225457124-a1a2a5f5f4f7?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'"
                                    class="w-10 h-10 rounded-full object-cover border border-primary/30 shrink-0">
                                <input type="file" name="image" accept="image/*"
                                    class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Audio Examples (Max 3 files) <span
                                    class="opacity-50 font-normal">(leave empty to keep current)</span></label>
                            <input type="file" name="audio_examples[]" accept="audio/*" multiple
                                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="editModalOpen = false"
                            class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                        <button type="submit"
                            class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="deleteModalOpen" x-cloak
            class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm"
            x-transition.opacity>
            <div @click.away="deleteModalOpen = false"
                class="bg-soft dark:bg-darkbg rounded-2xl border border-red-500/30 p-6 max-w-md w-full mx-4 shadow-2xl relative"
                x-transition.scale.90>
                <h3 class="text-xl font-bold text-red-600 dark:text-red-400 mb-2">Delete Artist</h3>
                <p class="text-sm opacity-80 mb-6">Are you sure you want to delete <span class="font-bold"
                        x-text="currentItem?.name"></span>? This action cannot be undone.</p>
                <div class="flex justify-end gap-3">
                    <button @click="deleteModalOpen = false"
                        class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                    <form :action="deleteUrl" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-5 py-2 rounded-lg text-sm font-medium bg-red-600 text-white hover:bg-red-700 transition shadow-sm">Delete
                            Forever</button>
                    </form>
                </div>
            </div>
        </div>

        <div x-show="bioModalOpen" x-cloak
            class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm"
            x-transition.opacity>
            <div @click.away="bioModalOpen = false"
                class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-2xl w-full mx-4 shadow-2xl relative"
                x-transition.scale.90>
                <button @click="bioModalOpen = false"
                    class="absolute top-4 right-4 text-primary hover:text-accent transition">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
                <h3 class="text-2xl font-bold text-accent dark:text-soft mb-2" x-text="currentItem?.name"></h3>
                <p class="text-xs text-primary uppercase tracking-wider font-bold mb-6">Biography</p>

                <div class="prose prose-sm dark:prose-invert max-w-none max-h-[60vh] overflow-y-auto whitespace-pre-wrap text-accent dark:text-soft/80"
                    x-text="currentItem?.biography"></div>
            </div>
        </div>

    </div>
@endsection
