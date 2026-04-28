<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {

    }

 public function store(Request $request)

    {
        $rules = [
            'name'                  => 'required|string|max:255',
            'legendary_artists'     => 'required|string',
            'characteristics'       => 'required|string',
            'description'           => 'nullable|string',
            'examples'              => 'nullable|string',
            'cover_image'           => 'nullable|image|max:5120',
            'examples_audio_url'    => 'nullable|array|max:3',
            'examples_audio_url.*'  => 'nullable|file|mimes:mp3,wav,ogg,m4a|max:20480',
        ];

        if (!$request->hasFile('examples_audio_url')) {
            unset($rules['examples_audio_url']);
            unset($rules['examples_audio_url.*']);
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('genres', 'public');
            $validated['cover_image'] = '/storage/' . $path;
        }

        if ($request->hasFile('examples_audio_url')) {
            $paths = [];
            foreach ($request->file('examples_audio_url') as $file) {
                $paths[] = '/storage/' . $file->store('genres/audio', 'public');
            }
            $validated['examples_audio_url'] = $paths;
        } else {
            $validated['examples_audio_url'] = null;
        }

        Genre::create($validated);
        return redirect()->back()->with('success', 'Genre created successfully.');
    }

    public function show(Genre $genre)
    {

    }

    public function edit(Genre $genre)
    {

    }

 public function update(Request $request, Genre $genre)

    {
        $rules = [
            'name'                  => 'required|string|max:255',
            'legendary_artists'     => 'required|string',
            'characteristics'       => 'required|string',
            'description'           => 'nullable|string',
            'examples'              => 'nullable|string',
            'cover_image'           => 'nullable|image|max:5120',
            'examples_audio_url'    => 'nullable|array|max:3',
            'examples_audio_url.*'  => 'nullable|file|mimes:mp3,wav,ogg,m4a|max:20480',
        ];

        if (!$request->hasFile('examples_audio_url')) {
            unset($rules['examples_audio_url']);
            unset($rules['examples_audio_url.*']);
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('genres', 'public');
            $validated['cover_image'] = '/storage/' . $path;
        } else {
            unset($validated['cover_image']);
        }

        if ($request->hasFile('examples_audio_url')) {
            $paths = [];
            foreach ($request->file('examples_audio_url') as $file) {
                $paths[] = '/storage/' . $file->store('genres/audio', 'public');
            }
            $validated['examples_audio_url'] = $paths;
        } else {
            unset($validated['examples_audio_url']);
        }

        $genre->update($validated);
        return redirect()->back()->with('success', 'Genre updated successfully.');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->back()->with('success', 'Genre deleted successfully.');
    }
}