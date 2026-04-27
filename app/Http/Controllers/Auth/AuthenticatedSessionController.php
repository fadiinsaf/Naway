<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.signin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = \App\Models\User::withTrashed()->where('email', $request->email)->first();
        if ($user && $user->trashed() && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            return redirect()->route('account.banned');
        }

        $request->authenticate();

        if ($request->user()->status === 'SUSPENDED') {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('account.suspended');
        }

        $request->session()->regenerate();

        return $request->user()->role === 'member'
        ? redirect()->intended('/home')->with('welcome_popup', true)->with('auth_theme', $request->user()->theme_mode)
        : redirect()->intended('/admin/dashboard')->with('welcome_popup', true)->with('auth_theme', $request->user()->theme_mode);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}