<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(Request $user) {
        $user = Auth::user();

        $roles = auth()->user()->roles();

        return view('account.profile', compact('user'));
    }

    public function redirectToUserProfile(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('account.profile', ['user' => Auth::user()->username]);
    }

    public function settings(Request $request) {
        return view('account.settings');
    }

    public function checkBan() {
        if(auth()->user()->isBanned()) {
            return view('account.banned');
        }
        return redirect()->route('account.me');

    }
}
