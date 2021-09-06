<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

//        if(!session()->has('url.intended'))
//        {
//            session(['url.intended' => url()->previous()]);
//        }
        return redirect()->intended(RouteServiceProvider::HOME)->with('status', [
            'title' => 'Logged in',
            'type' => 'success',
            'toast' => 'true',
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::user()->tokens()->delete();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back()->with('status', [
            'title' => 'Logged out',
            'type' => 'info',
            'toast' => 'true',
        ]);
    }
}
