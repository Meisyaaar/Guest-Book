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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     if($request->user()->role ==='admin') {
    //         return redirect('admin/dashboard');
    //     }

    //     return redirect()->intended(route('dashboard', absolute: false));
    // }

    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     // Redirect berdasarkan role
    //     switch($request->user()->role) {
    //         case 'ADM':
    //             return redirect()->route('admin.dashboard');
    //         case 'FO':
    //             return redirect()->route('fo.dashboard');
    //         case 'PEG':
    //             return redirect()->route('pegawai.dashboard');
    //         default:
    //             return redirect()->route('dashboard');
    //     }
    // }


    /**
     * Destroy an authenticated session.
     */


    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    // Pastikan user ada
    if (!$request->user()) {
        return redirect('/')->withErrors(['message' => 'Login failed']);
    }

    // Redirect berdasarkan role
    switch($request->user()->role) {
        case 'ADM':
            return redirect()->route('admin.dashboard');
        case 'FO':
            return redirect()->route('fo.dashboard');
        case 'PEG':
            return redirect()->route('pegawai.dashboard');
        default:
            return redirect()->route('dashboard');
    }

    // if($request->user()->role == 'ADM')
    // {
    //     return redirect()->route('admin.dashboard');
    // }

}

 public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
