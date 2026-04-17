@extends('layouts.admin')
@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-accent dark:text-soft">Maqams Management</h2>
            <p class="text-sm opacity-70">Update melodic systems, scores, and audio files.</p>
        </div>
        <button class="bg-primary text-soft px-4 py-2 rounded-lg text-sm font-medium hover:bg-accent transition">
            + Add Maqam
        </button>
    </div>

    <div class="bg-soft dark:bg-darkbg border border-primary/20 rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary/10 text-xs uppercase tracking-wider text-primary border-b border-primary/20">
                    <th class="p-4">Maqam Name</th>
                    <th class="p-4">Score / Audio Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-primary/10 text-sm">
                <tr class="hover:bg-primary/5 transition">
                    <td class="p-4 font-semibold text-accent dark:text-soft">Bayati</td>
                    <td class="p-4 opacity-80">Score Uploaded | Audio Uploaded</td>
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
