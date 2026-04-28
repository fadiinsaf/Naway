@extends('layouts.admin')
@section('content')
    <div x-data="{ viewModalOpen: false, currentComment: '', deleteModalOpen: false, deleteUrl: '' }" class="relative">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-accent dark:text-soft">Comment Moderation</h2>
                <p class="text-sm opacity-70">Review, approve, or delete user comments.</p>
            </div>
        </div>

    <div class="bg-soft dark:bg-darkbg border border-primary/20 rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary/10 text-xs uppercase tracking-wider text-primary border-b border-primary/20">
                    <th class="p-4">User</th>
                    <th class="p-4">Comment Content</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Moderation Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/10 text-sm">
                @forelse($comments as $comment)
                <tr class="hover:bg-primary/5 transition">
                    <td class="p-4 font-semibold text-accent dark:text-soft">{{ $comment->user->name ?? 'Unknown' }}</td>
                    <td class="p-4 opacity-80 max-w-md truncate cursor-pointer hover:opacity-100 hover:text-primary transition" title="Click to read full comment" @click="currentComment = {{ json_encode($comment->content) }}; viewModalOpen = true">{{ $comment->content }}</td>
                    <td class="p-4">
                        @if($comment->trashed())
                        <span class="bg-red-500/20 text-red-500 text-xs px-2 py-1 rounded font-bold">Deleted</span>
                        @elseif($comment->approved)
                        <span class="bg-green-500/20 text-green-500 text-xs px-2 py-1 rounded font-bold">Approved</span>
                        @else
                        <span class="bg-yellow-500/20 text-yellow-600 dark:text-yellow-400 text-xs px-2 py-1 rounded font-bold">Pending</span>
                        @endif
                    </td>
                    <td class="p-4 text-right flex justify-end gap-2">
                        @if(!$comment->approved && !$comment->trashed())
                        <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 bg-primary/20 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Approve</button>
                        </form>
                        @endif
                        @if(!$comment->trashed())
                        <button type="button" @click="deleteUrl = '{{ route('admin.comments.destroy', $comment) }}'; deleteModalOpen = true"
                            class="px-3 py-1 border border-primary/50 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Delete</button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-4 text-center opacity-70">No comments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div x-show="viewModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
        <div @click.away="viewModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-primary/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative" x-transition.scale.90>
            <h3 class="text-xl font-bold text-accent dark:text-soft mb-4">Read Comment</h3>
            <div class="space-y-4 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                <p class="text-sm opacity-90 leading-relaxed whitespace-pre-wrap" x-text="currentComment"></p>
            </div>
            <div class="mt-8 flex justify-end">
                <button @click="viewModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium bg-primary text-soft hover:bg-accent transition shadow-sm">Close</button>
            </div>
        </div>
    </div>

    <div x-show="deleteModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
        <div @click.away="deleteModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-red-500/30 p-6 max-w-md w-full mx-4 shadow-2xl relative" x-transition.scale.90>
            <h3 class="text-xl font-bold text-red-600 dark:text-red-400 mb-2">Delete Comment</h3>
            <p class="text-sm opacity-80 mb-6">Are you sure you want to delete this comment? This action cannot be undone.</p>
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
</div>
@endsection
