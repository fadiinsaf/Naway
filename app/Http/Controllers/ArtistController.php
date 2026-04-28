<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    
    public function index()
    {
        $artists = Artist::all();
        return view('admin.artists.index', compact('artists'));
    }

    public function create()
    {

    }

 public function store(Request $request)
    {
        
        $rules = [
            'name'             => 'required|string|max:255',
            'nationality'      => 'required|string|max:255',
            'city'             => 'required|string|max:255',
            'birth_day'        => 'required|date',
            'date_of_death'    => 'nullable|date|after:birth_day',
            'years_active'     => 'nullable|integer|min:0',
            'songs'            => 'nullable|integer|min:0',
            'films'            => 'nullable|string|max:255',
            'biography'        => 'nullable|string',
            'image'            => 'nullable|image|max:5120',
            'audio_examples'   => 'nullable|array|max:3',
            'audio_examples.*' => 'nullable|file|mimes:mp3,wav,ogg,m4a|max:20480',
        ];

        if (!$request->hasFile('audio_examples')) {
            unset($rules['audio_examples']);
            unset($rules['audio_examples.*']);
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('artists', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        if ($request->hasFile('audio_examples')) {
            $paths = [];
            foreach ($request->file('audio_examples') as $file) {
                $paths[] = '/storage/' . $file->store('artists/audio', 'public');
            }
            $validated['audio_examples'] = $paths;
        } else {
            $validated['audio_examples'] = null;
        }

        Artist::create($validated);
        return redirect()->back()->with('success', 'Artist created successfully.');
    }

    public function show(Artist $artist)
    {

    }

    public function edit(Artist $artist)
    {

    }

    public function update(Request $request, Artist $artist)
    {
        $rules = [
            'name'             => 'required|string|max:255',
            'nationality'      => 'required|string|max:255',
            'city'             => 'required|string|max:255',
            'birth_day'        => 'required|date',
            'date_of_death'    => 'nullable|date|after:birth_day',
            'years_active'     => 'nullable|integer|min:0',
            'songs'            => 'nullable|integer|min:0',
            'films'            => 'nullable|string|max:255',
            'biography'        => 'nullable|string',
            'image'            => 'nullable|image|max:5120',
            'audio_examples'   => 'nullable|array|max:3',
            'audio_examples.*' => 'nullable|file|mimes:mp3,wav,ogg,m4a|max:20480',
        ];

        if (!$request->hasFile('audio_examples')) {
            unset($rules['audio_examples']);
            unset($rules['audio_examples.*']);
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('artists', 'public');
            $validated['image'] = '/storage/' . $path;
        } else {
            unset($validated['image']);
        }

        if ($request->hasFile('audio_examples')) {
            $paths = [];
            foreach ($request->file('audio_examples') as $file) {
                $paths[] = '/storage/' . $file->store('artists/audio', 'public');
            }
            $validated['audio_examples'] = $paths;
        } else {
            unset($validated['audio_examples']);
        }

        $artist->update($validated);
        return redirect()->back()->with('success', 'Artist updated successfully.');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->back()->with('success', 'Artist deleted successfully.');
    }
}
