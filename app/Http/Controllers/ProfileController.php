<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $isAdminRoute = $request->routeIs('admin.*');
        $layout = $isAdminRoute ? 'layouts.admin' : 'layouts.app';
        
        return view('profile.edit', [
            'user' => $request->user(),
            'layout' => $layout,
            'updateRoute' => $isAdminRoute ? route('admin.profile.update') : route('profile.update'),
            'destroyRoute' => $isAdminRoute ? route('admin.profile.destroy') : route('profile.destroy'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('profile_image')) {
            if ($request->user()->profile_image) {
                Storage::disk('public')->delete($request->user()->profile_image);
            }
            $path = $request->file('profile_image')->store('profile_pictures', 'public');
            $request->user()->profile_image = $path;
        }

        $request->user()->save();

        if ($request->routeIs('admin.*')) {
            return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    /**
     * Update the user's theme mode.
     */
    public function updateTheme(Request $request)
    {
        $request->validate([
            'theme_mode' => ['required', 'in:LIGHT,DARK'],
        ]);

        $request->user()->update([
            'theme_mode' => $request->theme_mode,
        ]);

        return response()->json(['status' => 'success']);
    }
}
