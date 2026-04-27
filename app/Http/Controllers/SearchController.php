<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Instrument;
use App\Models\Maqam;
use App\Models\Rhythm;
use App\Models\Genre;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->query('q');
        if (!$q) {
            return response()->json([]);
        }

        $results = [];

        // Search Users
        $users = \App\Models\User::whereRaw('LOWER(name) LIKE ?', [strtolower($q) . '%'])->limit(3)->get();
        foreach ($users as $user) {
            $results[] = [
                'type' => 'User',
                'name' => $user->name,
                'url' => '#', // Link to user profile if available, else #
                'image' => $user->profile_image ? asset('storage/' . $user->profile_image) : null
            ];
        }

        // Search Artists
        $artists = Artist::where('is_published', true)->whereRaw('LOWER(name) LIKE ?', [strtolower($q) . '%'])->limit(3)->get();
        foreach ($artists as $artist) {
            $results[] = [
                'type' => 'Artist',
                'name' => $artist->name,
                'url' => route('artists.show', $artist->id),
                'image' => $artist->image ? asset($artist->image) : null
            ];
        }

        // Search Instruments
        $instruments = Instrument::where('is_published', true)->whereRaw('LOWER(name) LIKE ?', [strtolower($q) . '%'])->limit(3)->get();
        foreach ($instruments as $instrument) {
            $results[] = [
                'type' => 'Instrument',
                'name' => $instrument->name,
                'url' => route('instruments.show', $instrument->id),
                'image' => $instrument->image ? asset($instrument->image) : null
            ];
        }

        // Search Maqams
        $maqams = Maqam::where('is_published', true)->whereRaw('LOWER(name) LIKE ?', [strtolower($q) . '%'])->limit(3)->get();
        foreach ($maqams as $maqam) {
            $results[] = [
                'type' => 'Maqam',
                'name' => $maqam->name,
                'url' => url('/maqams?id=' . $maqam->id),
                'image' => null // Maqams typically don't have cover images
            ];
        }

        // Search Rhythms
        $rhythms = Rhythm::where('is_published', true)->whereRaw('LOWER(name) LIKE ?', [strtolower($q) . '%'])->limit(3)->get();
        foreach ($rhythms as $rhythm) {
            $results[] = [
                'type' => 'Rhythm',
                'name' => $rhythm->name,
                'url' => url('/rhythms?id=' . $rhythm->id),
                'image' => null
            ];
        }

        // Search Genres
        $genres = Genre::where('is_published', true)->whereRaw('LOWER(name) LIKE ?', [strtolower($q) . '%'])->limit(3)->get();
        foreach ($genres as $genre) {
            $results[] = [
                'type' => 'Genre',
                'name' => $genre->name,
                'url' => url('/genres?id=' . $genre->id),
                'image' => $genre->cover_image ? asset($genre->cover_image) : null
            ];
        }

        return response()->json($results);
    }
}
