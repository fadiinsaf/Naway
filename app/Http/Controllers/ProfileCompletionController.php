<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileCompletionController extends Controller
{
    public function edit()
    {
        return view('profile.complete');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_image' => 'nullable|image|max:2048',
            'speciality' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        if ($user->role === 'admin') {
            $user->speciality = 'admin';
        } else {
            $user->speciality = $request->speciality;
        }

        $user->country = $request->country;
        $user->city = $request->city;
        $user->is_profile_completed = true;

        $user->save();

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard')->with('status', 'Profile completed!');
        }

        return redirect('/home')->with('status', 'Profile completed!');
    }
}
