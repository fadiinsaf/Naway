<?php

namespace App\Http\Controllers;

use App\Models\Maqam;
use Illuminate\Http\Request;

class MaqamController extends Controller
{
    
    public function index()
    {
        $maqams = Maqam::all();
        return view('admin.maqams.index', compact('maqams'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'audio_url' => 'nullable|file|mimes:mp3,wav,ogg,m4a|max:20480',
            'score_url' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('audio_url')) {
            $path = $request->file('audio_url')->store('maqams/audio', 'public');
            $validated['audio_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('score_url')) {
            $path = $request->file('score_url')->store('maqams/scales', 'public');
            $validated['score_url'] = '/storage/' . $path;
        }

        Maqam::create($validated);
        return redirect()->back()->with('success', 'Maqam created successfully.');
    }

    public function show(Maqam $maqam)
    {

    }

    public function edit(Maqam $maqam)
    {

    }

    public function update(Request $request, Maqam $maqam)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'audio_url' => 'nullable|file|mimes:mp3,wav,ogg,m4a|max:20480',
            'score_url' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('audio_url')) {
            $path = $request->file('audio_url')->store('maqams/audio', 'public');
            $validated['audio_url'] = '/storage/' . $path;
        } else {
            unset($validated['audio_url']);
        }

        if ($request->hasFile('score_url')) {
            $path = $request->file('score_url')->store('maqams/scales', 'public');
            $validated['score_url'] = '/storage/' . $path;
        } else {
            unset($validated['score_url']);
        }

        $maqam->update($validated);
        return redirect()->back()->with('success', 'Maqam updated successfully.');
    }

    public function destroy(Maqam $maqam)
    {
        $maqam->delete();
        return redirect()->back()->with('success', 'Maqam deleted successfully.');
    }
}
