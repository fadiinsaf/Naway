@extends('layouts.admin')
@section('content')
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
                <tr class="hover:bg-primary/5 transition">
                    <td class="p-4">
                        <div class="font-semibold text-accent dark:text-soft">Test User</div>
                        <div class="opacity-70 text-xs">user@naway.test</div>
                    </td>
                    <td class="p-4">
                        <span class="bg-primary/20 text-primary text-xs px-2 py-1 rounded font-bold">Active</span>
                    </td>
                    <td class="p-4 text-right flex justify-end gap-2">
                        <button
                            class="px-3 py-1 bg-primary/20 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Suspend</button>
                        <button
                            class="px-3 py-1 border border-primary/50 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Delete
                            User</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
