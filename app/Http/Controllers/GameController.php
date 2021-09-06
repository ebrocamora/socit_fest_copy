<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $rewards = Reward::all();

        return view('game.tracker.index', compact('rewards'));
    }

    public function tracker(Request $request) {

        $rewards = Reward::all();

        return view('game.tracker.index', compact('rewards'));
    }
}
