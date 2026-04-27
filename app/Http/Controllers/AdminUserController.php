<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('admin.users.index', compact('users'));
    }

    public function suspend(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'You cannot suspend an admin account.');
        }

        $user->update(['status' => 'SUSPENDED']);
        return redirect()->back()->with('success', 'User suspended successfully.');
    }

    public function unsuspend(User $user)
    {
        $user->update(['status' => 'ACTIVE']);
        return redirect()->back()->with('success', 'User unsuspended successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'You cannot ban an admin account.');
        }

        $user->delete(); // Soft delete effectively bans the user
        return redirect()->back()->with('success', 'User permanently banned.');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back()->with('success', 'User restored successfully.');
    }
}
