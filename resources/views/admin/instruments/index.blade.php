@extends('layouts.admin')
@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-accent dark:text-soft">Instruments</h2>
            <p class="text-sm opacity-70">Manage images and historical descriptions.</p>
        </div>
        <button class="bg-primary text-soft px-4 py-2 rounded-lg text-sm font-medium hover:bg-accent transition">
            + Add Instrument
        </button>
    </div>

    <div class="bg-soft dark:bg-darkbg border border-primary/20 rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary/10 text-xs uppercase tracking-wider text-primary border-b border-primary/20">
                    <th class="p-4">Instrument & Image</th>
                    <th class="p-4">Historical Description</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/10 text-sm">
                <tr class="hover:bg-primary/5 transition">
                    <td class="p-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-primary/20 rounded border border-primary/30"></div>
                        <span class="font-semibold">Oud</span>
                    </td>
                    <td class="p-4 opacity-80 max-w-md truncate">Considered one of the most ancient and central
                        instruments...</td>
                    <td class="p-4 text-right flex justify-end gap-2">
                        <button
                            class="px-3 py-1 bg-primary/20 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Edit</button>
                        <button
                            class="px-3 py-1 border border-primary/50 text-primary hover:bg-primary hover:text-soft rounded transition text-xs font-bold">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
