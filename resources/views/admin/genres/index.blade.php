@extends('layouts.admin')
@section('content')
    <div x-data="{ createModalOpen: false, editModalOpen: false, deleteModalOpen: false, descModalOpen: false, currentItem: null, deleteUrl: '', playingUrl: null }" class="relative">
        <audio x-ref="audioPlayer" :src="playingUrl" @ended="playingUrl = null" class="hidden" x-init="$watch('playingUrl', val => { if(val) $refs.audioPlayer.play(); else $refs.audioPlayer.pause(); })"></audio>

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-accent dark:text-soft">Musical Genres</h2>
                <p class="text-sm opacity-70">Manage categories, descriptions, and examples.</p>
            </div>
            <button @click="createModalOpen = true" class="bg-primary text-soft px-4 py-2 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                + Add Genre
            </button>
        </div>

        <div class="bg-soft dark:bg-darkbg border border-primary/20 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary/5 text-xs uppercase tracking-wider text-primary border-b border-primary/20">
                        <th class="p-4">Genre Name</th>
                        <th class="p-4">Description</th>
                        <th class="p-4">Audio Examples</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-primary/10 text-sm">
                    @forelse($genres as $genre)
                    <tr class="hover:bg-primary/5 transition group">
                        <td class="p-4 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg border border-primary/30 overflow-hidden shrink-0 shadow-sm">
                                <img src="{{ $genre->cover_image ?? 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80' }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <span class="font-bold text-accent dark:text-soft text-base">{{ $genre->name }}</span>
                            </div>
                        </td>
                        <td class="p-4">
                            @if($genre->description)
                                <p class="opacity-80 text-xs max-w-[200px] truncate mb-1">{{ Str::limit($genre->description, 50) }}</p>
                                <button @click="currentItem = {{ json_encode($genre) }}; descModalOpen = true" class="text-xs text-primary hover:underline font-medium">Read more</button>
                            @else
                                <span class="opacity-50 text-xs">No description</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="flex flex-wrap gap-2">
                            @if($genre->examples_audio_url && is_array($genre->examples_audio_url))
                                @foreach($genre->examples_audio_url as $index => $song)
                                    <button
                                        @click="if(playingUrl === '{{ $song }}') { playingUrl = null; } else { playingUrl = '{{ $song }}'; }"
                                        class="inline-flex items-center gap-2 px-2.5 py-1 bg-primary/10 text-primary border border-primary/20 rounded-lg text-xs font-medium hover:bg-primary hover:text-soft transition">
                                        <i class="fa-solid text-[10px]" :class="playingUrl === '{{ $song }}' ? 'fa-pause' : 'fa-play'"></i>
                                        Example {{ $index + 1 }}
                                    </button>
                                @endforeach
                            @else
                                <span class="text-xs opacity-50">No audio uploaded</span>
                            @endif
                            </div>
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button @click="currentItem = {{ json_encode($genre) }}; editModalOpen = true" class="px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary hover:text-soft rounded-lg transition text-xs font-bold">Edit</button>
                                <button @click="currentItem = {{ json_encode($genre) }}; deleteUrl = '{{ route('admin.genres.destroy', $genre) }}'; deleteModalOpen = true" class="px-3 py-1.5 border border-red-500/50 text-red-500 hover:bg-red-500 hover:text-soft rounded-lg transition text-xs font-bold">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-4 text-center opacity-70">No genres found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

<!-- Create Modal -->
<div x-show="createModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
    <div @click.away="createModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative" x-transition.scale.90>
        <h3 class="text-xl font-bold text-accent dark:text-soft mb-6">Add Genre</h3>
        <form action="{{ route('admin.genres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4 max-h-[70vh] overflow-y-auto pr-1">
                <div>
                    <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" placeholder="Genre Name" required
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Legendary Artists <span class="text-red-500">*</span></label>
                    <textarea name="legendary_artists" rows="2" placeholder="e.g. Miles Davis, John Coltrane, Billie Holiday" required
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Characteristics <span class="text-red-500">*</span></label>
                    <textarea name="characteristics" rows="3" placeholder="Describe the key characteristics of this genre ... Disperse with coma ," required
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Description <span class="text-red-500">*</span></label>
                    <textarea required name="description" rows="3" placeholder="Enter description..."
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Examples <span class="text-red-500">*</span></label>
                    <textarea required name="examples" rows="2" placeholder="e.g. Song names, albums, or notable works..."
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Cover Image <span class="text-red-500">*</span></label>
                    <input required type="file" name="cover_image" accept="image/*"
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Audio Examples (Max 3) <span class="text-red-500">*</span></label>
                    <input required type="file" name="examples_audio_url[]" accept="audio/*" multiple
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                    <p class="text-xs opacity-60 mt-1">Select up to 3 MP3 files.</p>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" @click="createModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Create Genre</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div x-show="editModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
    <div @click.away="editModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative" x-transition.scale.90>
        <h3 class="text-xl font-bold text-accent dark:text-soft mb-6">Edit Genre</h3>
        <form :action="currentItem ? '/admin/genres/' + currentItem.id : '#'" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-4 max-h-[70vh] overflow-y-auto pr-1">
                <div>
                    <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" x-model="currentItem.name" required
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Legendary Artists <span class="text-red-500">*</span></label>
                    <textarea name="legendary_artists" x-model="currentItem.legendary_artists" rows="2" placeholder="e.g. Miles Davis, John Coltrane, Billie Holiday" required
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Characteristics <span class="text-red-500">*</span></label>
                    <textarea name="characteristics" x-model="currentItem.characteristics" rows="3" placeholder="Describe the key characteristics of this genre..." required
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Description <span class="text-red-500">*</span></label>
                    <textarea required name="description" x-model="currentItem.description" rows="3"
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Examples <span class="text-red-500">*</span></label>
                    <textarea required name="examples" x-model="currentItem.examples" rows="2" placeholder="e.g. Song names, albums, or notable works..."
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Cover Image <span class="opacity-50 font-normal">(leave empty to keep current)</span></label>
                    <div class="flex items-center gap-3">
                        <img :src="currentItem?.cover_image ?? 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'"
                            class="w-10 h-10 rounded-lg object-cover border border-primary/30 shrink-0">
                        <input type="file" name="cover_image" accept="image/*"
                            class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Audio Examples <span class="opacity-50 font-normal">(leave empty to keep current)</span></label>
                    <input type="file" name="examples_audio_url[]" accept="audio/*" multiple
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" @click="editModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Save Changes</button>
            </div>
        </form>
    </div>
</div>

        <!-- Delete Modal -->
        <div x-show="deleteModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-red-500/30 p-6 max-w-md w-full mx-4 shadow-2xl relative" x-transition.scale.90>
                <h3 class="text-xl font-bold text-red-600 dark:text-red-400 mb-2">Delete Genre</h3>
                <p class="text-sm opacity-80 mb-6">Are you sure you want to delete <span class="font-bold" x-text="currentItem?.name"></span>? This action cannot be undone.</p>
                <div class="flex justify-end gap-3">
                    <button @click="deleteModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                    <form :action="deleteUrl" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium bg-red-600 text-white hover:bg-red-700 transition shadow-sm">Delete Forever</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Description Modal -->
        <div x-show="descModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
            <div @click.away="descModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-2xl w-full mx-4 shadow-2xl relative" x-transition.scale.90>
                <button @click="descModalOpen = false" class="absolute top-4 right-4 text-primary hover:text-accent transition">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
                <h3 class="text-2xl font-bold text-accent dark:text-soft mb-2" x-text="currentItem?.name"></h3>
                <p class="text-xs text-primary uppercase tracking-wider font-bold mb-6">Description</p>

                <div class="prose prose-sm dark:prose-invert max-w-none max-h-[60vh] overflow-y-auto whitespace-pre-wrap text-accent dark:text-soft/80" x-text="currentItem?.description"></div>
            </div>
        </div>

    </div>
@endsection
