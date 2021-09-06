<?php

namespace App\Http\Controllers;

use App\Http\Livewire\PointTracker;
use App\Models\Reward;
use App\Models\UserLevel;
use App\Models\UserReward;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $rewards = Reward::all();

        if($request->wantsJson()) {
            return response()->json([
               'rewards' => $rewards,
            ]);
        }

        return view('dashboard.rewards.index', compact('rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function show(Reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reward $reward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        //
    }

    public function submit(Request $request)
    {

        $reward = Reward::where('code', $request->reward)->first();

        if($reward) {

            $userReward = UserReward::where(['user_id' => Auth::id(), 'reward_id' => $reward->id])->first();

            if($userReward) {
                return response()->json([
                    'status' => 'already claimed',
                    'message' => 'Reward is already claimed',
                ]);
            }

            (new \App\Http\Livewire\PointTracker)->codeSubmitted($request->reward);

            return response()->json([
                'status' => 'claimed',
                'message' => 'Successfully claimed reward',
                'reward' => Reward::where('code', $request->reward)->first(),
            ],200);
        }

        return response()->json([
            'status' => 'not found',
            'message' => 'No reward found',
        ]);
    }

    public function loadRewards() {

        $rewards = Reward::all();

        return response()->json([
            'rewards' => $rewards,
        ]);
    }

    public function loadExperience() {

        $userLevel = UserLevel::where('user_id', Auth::id())->first();

        return response()->json([
            'user' => $userLevel,
        ]);
    }
}
