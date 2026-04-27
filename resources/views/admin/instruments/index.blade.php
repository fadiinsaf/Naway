@extends('layouts.admin')
@section('content')
    <div x-data="{ createModalOpen: false, editModalOpen: false, deleteModalOpen: false, descModalOpen: false, currentItem: null, deleteUrl: '' }" class="relative">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-accent dark:text-soft">Instruments</h2>
                <p class="text-sm opacity-70">Manage images and historical descriptions.</p>
            </div>
            <button @click="createModalOpen = true" class="bg-primary text-soft px-4 py-2 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                + Add Instrument
            </button>
        </div>

        <div class="bg-soft dark:bg-darkbg border border-primary/20 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary/5 text-xs uppercase tracking-wider text-primary border-b border-primary/20">
                        <th class="p-4">Instrument & Image</th>
                        <th class="p-4">Historical Description</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-primary/10 text-sm">
                    @forelse($instruments as $instrument)
                    <tr class="hover:bg-primary/5 transition group">
                        <td class="p-4 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg border border-primary/30 overflow-hidden shrink-0 shadow-sm">
                                <img src="{{ $instrument->image ?? 'https://images.unsplash.com/photo-1605335198897-4061a58b5e9f?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80' }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <span class="font-bold text-accent dark:text-soft text-base">{{ $instrument->name }}</span>
                                <div class="text-xs opacity-60 mt-0.5">{{ $instrument->type?? 'Unknown Family' }}</div>
                            </div>
                        </td>
                        <td class="p-4">
                            @if($instrument->historical_description)
                                <p class="opacity-80 text-xs max-w-[200px] truncate mb-1">{{ Str::limit($instrument->historical_description, 50) }}</p>
                                <button @click="currentItem = {{ json_encode($instrument) }}; descModalOpen = true" class="text-xs text-primary hover:underline font-medium">Read more</button>
                            @else
                                <span class="opacity-50 text-xs">No description</span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button @click="currentItem = {{ json_encode($instrument) }}; editModalOpen = true" class="px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary hover:text-soft rounded-lg transition text-xs font-bold">Edit</button>
                                <button @click="currentItem = {{ json_encode($instrument) }}; deleteUrl = '{{ route('admin.instruments.destroy', $instrument) }}'; deleteModalOpen = true" class="px-3 py-1.5 border border-red-500/50 text-red-500 hover:bg-red-500 hover:text-soft rounded-lg transition text-xs font-bold">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-4 text-center opacity-70">No instruments found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

<!-- Create Modal -->
<div x-show="createModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
    <div @click.away="createModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative" x-transition.scale.90>
        <h3 class="text-xl font-bold text-accent dark:text-soft mb-6">Add Instrument</h3>
        <form action="{{ route('admin.instruments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" placeholder="Instrument Name" required
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                </div>

                {{-- Type & Origin --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium mb-1">Type <span class="text-red-500">*</span></label>
                        <input type="text" name="type" placeholder="e.g. String, Percussion" required
                            class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Origin <span class="text-red-500">*</span></label>
                        <input type="text" name="origin" placeholder="e.g. Italy, China" required
                            class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Image Upload <span class="text-red-500">*</span></label>
                    <input required type="file" name="image" accept="image/*"
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Historical Description <span class="text-red-500">*</span></label>
                    <textarea required name="historical_description" rows="4" placeholder="Enter historical description..."
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3">
                <button type="button" @click="createModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Create Instrument</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div x-show="editModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
    <div @click.away="editModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative" x-transition.scale.90>
        <h3 class="text-xl font-bold text-accent dark:text-soft mb-6">Edit Instrument</h3>
        <form :action="currentItem ? '/admin/instruments/' + currentItem.id : '#'" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" x-model="currentItem.name" required
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                </div>

                {{-- Type & Origin --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium mb-1">Type <span class="text-red-500">*</span></label>
                        <input type="text" name="type" x-model="currentItem.type" placeholder="e.g. String, Percussion" required
                            class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Origin <span class="text-red-500">*</span></label>
                        <input type="text" name="origin" x-model="currentItem.origin" placeholder="e.g. Italy, China" required
                            class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Image Upload <span class="opacity-50 font-normal">(leave empty to keep current)</span></label>
                    <div class="flex items-center gap-3">
                        <img :src="currentItem?.image ?? 'https://images.unsplash.com/photo-1605335198897-4061a58b5e9f?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'"
                            class="w-10 h-10 rounded-lg object-cover border border-primary/30 shrink-0">
                        <input type="file" name="image" accept="image/*"
                            class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Historical Description <span class="text-red-500">*</span></label>
                    <textarea required name="historical_description" rows="4" x-model="currentItem.historical_description"
                        class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-2.5 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft resize-none"></textarea>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3">
                <button type="button" @click="editModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Save Changes</button>
            </div>
        </form>
    </div>
</div>

        <!-- Delete Modal -->
        <div x-show="deleteModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-red-500/30 p-6 max-w-md w-full mx-4 shadow-2xl relative" x-transition.scale.90>
                <h3 class="text-xl font-bold text-red-600 dark:text-red-400 mb-2">Delete Instrument</h3>
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
                <p class="text-xs text-primary uppercase tracking-wider font-bold mb-6">Historical Description</p>

                <div class="prose prose-sm dark:prose-invert max-w-none max-h-[60vh] overflow-y-auto whitespace-pre-wrap text-accent dark:text-soft/80" x-text="currentItem?.historical_description"></div>
            </div>
        </div>

    </div>
@endsection
