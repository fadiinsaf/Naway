<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function toggle(Request $request)
    {
        $validated = $request->validate([
            'likeable_id' => 'required|integer',
            'likeable_type' => 'required|string',
        ]);

        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $like = Like::where('user_id', $user->id)
            ->where('likeable_id', $validated['likeable_id'])
            ->where('likeable_type', $validated['likeable_type'])
            ->first();

        if ($like) {
            $like->delete();
            return response()->json(['liked' => false]);
        } else {
            Like::create([
                'user_id' => $user->id,
                'likeable_id' => $validated['likeable_id'],
                'likeable_type' => $validated['likeable_type'],
            ]);
            return response()->json(['liked' => true]);
        }
    }
}
