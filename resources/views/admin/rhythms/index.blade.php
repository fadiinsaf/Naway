@extends('layouts.admin')
@section('content')
    <div x-data="{ 
            createModalOpen: false, 
            editModalOpen: false, 
            deleteModalOpen: false, 
            descModalOpen: false, 
            currentItem: null, 
            deleteUrl: '',
            playingUrl: null,
            audioPlayer: new Audio()
        }" 
        x-init="
            audioPlayer.addEventListener('ended', () => { playingUrl = null; });
            $watch('playingUrl', url => {
                if(url) {
                    audioPlayer.src = url;
                    audioPlayer.play();
                } else {
                    audioPlayer.pause();
                }
            });
        "
        class="relative">
        
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-accent dark:text-soft">Rhythms (Iqa'at)</h2>
                <p class="text-sm opacity-70">Manage rhythmic structures, audio, and notation.</p>
            </div>
            <button @click="createModalOpen = true" class="bg-primary text-soft px-4 py-2 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                + Add Rhythm
            </button>
        </div>

        <div class="bg-soft dark:bg-darkbg border border-primary/20 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary/5 text-xs uppercase tracking-wider text-primary border-b border-primary/20">
                        <th class="p-4">Rhythm</th>
                        <th class="p-4">Audio / Score Preview</th>
                        <th class="p-4">Description</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-primary/10 text-sm">
                    @forelse($rhythms as $rhythm)
                    <tr class="hover:bg-primary/5 transition group">
                        <td class="p-4 font-bold text-accent dark:text-soft text-base">{{ $rhythm->name }}</td>
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <button 
                                    @if($rhythm->audio_url)
                                        @click="if(playingUrl === '{{ $rhythm->audio_url }}') { playingUrl = null; } else { playingUrl = '{{ $rhythm->audio_url }}'; }"
                                    @endif
                                    class="w-8 h-8 rounded-full flex items-center justify-center transition {{ $rhythm->audio_url ? 'bg-primary/10 text-primary hover:bg-primary hover:text-soft cursor-pointer' : 'bg-gray-200 text-gray-400 dark:bg-gray-800 cursor-not-allowed opacity-50' }}">
                                    <i class="fa-solid text-xs" :class="playingUrl === '{{ $rhythm->audio_url }}' ? 'fa-pause' : 'fa-play ml-0.5'"></i>
                                </button>
                                <span class="inline-block bg-primary/10 border border-primary/20 text-primary font-medium text-xs px-2 py-1 rounded">{{ $rhythm->audio_url ? 'Audio file' : 'No Audio' }}</span>
                                <span class="inline-block bg-primary/10 border border-primary/20 text-primary font-medium text-xs px-2 py-1 rounded">{{ $rhythm->score_url ? 'Notation image' : 'No Notation' }}</span>
                            </div>
                        </td>
                        <td class="p-4">
                            @if($rhythm->description)
                                <p class="opacity-80 text-xs max-w-[200px] truncate mb-1">{{ Str::limit($rhythm->description, 50) }}</p>
                                <button @click="currentItem = {{ json_encode($rhythm) }}; descModalOpen = true" class="text-xs text-primary hover:underline font-medium">Read more</button>
                            @else
                                <span class="opacity-50 text-xs">No description</span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button @click="currentItem = {{ json_encode($rhythm) }}; editModalOpen = true" class="px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary hover:text-soft rounded-lg transition text-xs font-bold">Edit</button>
                                <button @click="currentItem = {{ json_encode($rhythm) }}; deleteUrl = '{{ route('admin.rhythms.destroy', $rhythm) }}'; deleteModalOpen = true" class="px-3 py-1.5 border border-red-500/50 text-red-500 hover:bg-red-500 hover:text-soft rounded-lg transition text-xs font-bold">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-4 text-center opacity-70">No rhythms found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div x-show="createModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
            <div @click.away="createModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative" x-transition.scale.90>
                <h3 class="text-xl font-bold text-accent dark:text-soft mb-6">Add Rhythm</h3>
                <form action="{{ route('admin.rhythms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" placeholder="Rhythm Name" required class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Description <span class="text-red-500">*</span></label>
                            <textarea required name="description" rows="3" placeholder="Rhythm Description" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Audio File <span class="text-red-500">*</span></label>
                            <input required type="file" name="audio_url" accept="audio/*" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Notation Image <span class="text-red-500">*</span></label>
                            <input required type="file" name="score_url" accept="image/*" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end gap-3">
                        <button type="button" @click="createModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                        <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Create Rhythm</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="editModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
            <div @click.away="editModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative" x-transition.scale.90>
                <h3 class="text-xl font-bold text-accent dark:text-soft mb-6">Edit Rhythm</h3>
                <form :action="currentItem ? '/admin/rhythms/' + currentItem.id : '#'" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" x-model="currentItem.name" required class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Description <span class="text-red-500">*</span></label>
                            <textarea required name="description" x-model="currentItem.description" rows="3" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Audio File (Leave empty to keep current)</label>
                            <input type="file" name="audio_url" accept="audio/*" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Notation Image (Leave empty to keep current)</label>
                            <input type="file" name="score_url" accept="image/*" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end gap-3">
                        <button type="button" @click="editModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                        <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="deleteModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-red-500/30 p-6 max-w-md w-full mx-4 shadow-2xl relative" x-transition.scale.90>
                <h3 class="text-xl font-bold text-red-600 dark:text-red-400 mb-2">Delete Rhythm</h3>
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
