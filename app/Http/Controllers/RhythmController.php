<?php

namespace App\Http\Controllers;

use App\Models\Rhythm;
use Illuminate\Http\Request;

class RhythmController extends Controller
{
    
    public function index()
    {
        $rhythms = Rhythm::all();
        return view('admin.rhythms.index', compact('rhythms'));
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
            $path = $request->file('audio_url')->store('rhythms/audio', 'public');
            $validated['audio_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('score_url')) {
            $path = $request->file('score_url')->store('rhythms/scores', 'public');
            $validated['score_url'] = '/storage/' . $path;
        }

        Rhythm::create($validated);
        return redirect()->back()->with('success', 'Rhythm created successfully.');
    }

    public function show(Rhythm $rhythm)
    {

    }

    public function edit(Rhythm $rhythm)
    {

    }

    public function update(Request $request, Rhythm $rhythm)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'audio_url' => 'nullable|file|mimes:mp3,wav,ogg,m4a|max:20480',
            'score_url' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('audio_url')) {
            $path = $request->file('audio_url')->store('rhythms/audio', 'public');
            $validated['audio_url'] = '/storage/' . $path;
        } else {
            unset($validated['audio_url']);
        }

        if ($request->hasFile('score_url')) {
            $path = $request->file('score_url')->store('rhythms/scores', 'public');
            $validated['score_url'] = '/storage/' . $path;
        } else {
            unset($validated['score_url']);
        }

        $rhythm->update($validated);
        return redirect()->back()->with('success', 'Rhythm updated successfully.');
    }

    public function destroy(Rhythm $rhythm)
    {
        $rhythm->delete();
        return redirect()->back()->with('success', 'Rhythm deleted successfully.');
    }
}
