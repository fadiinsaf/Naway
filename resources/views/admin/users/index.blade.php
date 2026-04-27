@extends('layouts.admin')
@section('content')
<div x-data="{ deleteModalOpen: false, currentItem: null, deleteUrl: '' }" class="relative">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-accent dark:text-soft">User Management</h2>
            <p class="text-sm opacity-70">Suspend or remove accounts to maintain community safety.</p>
        </div>
    </div>

    <div class="bg-soft dark:bg-darkbg border border-primary/20 rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary/10 text-xs uppercase tracking-wider text-primary border-b border-primary/20">
                    <th class="p-4">Name / Email</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/10 text-sm">
                @forelse($users as $user)
                <tr class="hover:bg-primary/5 transition">
                    <td class="p-4">
                        <div class="font-semibold text-accent dark:text-soft">{{ $user->name }}</div>
                        <div class="opacity-70 text-xs">{{ $user->email }}</div>
                    </td>
                    <td class="p-4">
                        @if($user->trashed())
                        <span class="bg-gray-500/20 text-gray-500 text-xs px-2 py-1 rounded font-bold">Deleted (Banned)</span>
                        @elseif($user->status === 'SUSPENDED')
                        <span class="bg-red-500/20 text-red-500 text-xs px-2 py-1 rounded font-bold">Suspended</span>
                        @else
                        <span class="bg-primary/20 text-primary text-xs px-2 py-1 rounded font-bold">Active</span>
                        @endif
                    </td>
                    <td class="p-4 text-right flex justify-end gap-2">
                        @if($user->role !== 'admin')
                            @if($user->trashed())
                            <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 bg-green-500/20 text-green-500 hover:bg-green-500 hover:text-white rounded transition text-xs font-bold">Restore</button>
                            </form>
                            @else
                                @if($user->status !== 'SUSPENDED')
                                <form action="{{ route('admin.users.suspend', $user) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-1 bg-primary/20 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Suspend</button>
                                </form>
                                @else
                                <form action="{{ route('admin.users.unsuspend', $user) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-1 bg-green-500/20 text-green-500 hover:bg-green-500 hover:text-white rounded transition text-xs font-bold">Unsuspend</button>
                                </form>
                                @endif
                                <button type="button" @click='currentItem = {{ json_encode($user->name) }}; deleteUrl = "{{ route('admin.users.destroy', $user) }}"; deleteModalOpen = true'
                                    class="px-3 py-1 border border-primary/50 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Delete
                                    User</button>
                            @endif
                        @else
                            <span class="text-xs opacity-50 font-medium select-none px-2 py-1"><i class="fa-solid fa-shield-halved mr-1"></i> Admin Protected</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-4 text-center opacity-70">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Delete Modal -->
    <div x-show="deleteModalOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
        <div @click.away="deleteModalOpen = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-red-500/30 p-6 max-w-md w-full mx-4 shadow-2xl relative" x-transition.scale.90>
            <h3 class="text-xl font-bold text-red-600 dark:text-red-400 mb-2">Ban User</h3>
            <p class="text-sm opacity-80 mb-6">Are you sure you want to permanently ban <span class="font-bold" x-text="currentItem"></span>? This action cannot be undone.</p>
            <div class="flex justify-end gap-3">
                <button @click="deleteModalOpen = false" class="px-5 py-2 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition">Cancel</button>
                <form :action="deleteUrl" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium bg-red-600 text-white hover:bg-red-700 transition shadow-sm">Ban Forever</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
