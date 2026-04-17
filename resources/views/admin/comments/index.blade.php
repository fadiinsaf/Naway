@extends('layouts.admin')
@section('content')
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
                    <th class="p-4 text-right">Moderation Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/10 text-sm">
                <tr class="hover:bg-primary/5 transition">
                    <td class="p-4 font-semibold text-accent dark:text-soft">Ahmed Y.</td>
                    <td class="p-4 opacity-80 max-w-md truncate">This is a great explanation of the Kurd scale!</td>
                    <td class="p-4 text-right flex justify-end gap-2">
                        <button
                            class="px-3 py-1 bg-primary/20 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Approve</button>
                        <button
                            class="px-3 py-1 border border-primary/50 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Delete
                            (Spam)</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
