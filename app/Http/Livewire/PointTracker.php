<?php

namespace App\Http\Livewire;

use App\Models\Reward;
use App\Models\User;
use App\Models\UserLevel;
use App\Models\UserReward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class PointTracker extends Component
{
    public $points;

    protected $listeners = [
        'codeSubmitted' => 'codeSubmitted',
        'rewardGiven' => 'getCurrentUserPoints'
    ];

    public function codeSubmitted(string $code)
    {
        if(auth()->user()->isNotBanned()) {
            $reward = $this->getReward($code);

            if (!$reward) {
                $this->dispatchBrowserEvent('code:error', ['code' => $code]);
                return $this->emit('code:error', $code);
            }

            $userReward = $this->getUserReward($reward->id);

            if ($userReward) {
                $this->dispatchBrowserEvent('code:exists', ['reward' => $reward]);
                return $this->emit('code:exists', $reward->name);
            }

            $this->redeemReward($reward);

            return $this->emit('rewardGiven', $reward);
        }

        $this->dispatchBrowserEvent('user:banned');
        return $this->emit('user:banned');
    }

    private function getReward(string $code)
    {
        return Reward::where('code', $code)->first();
    }

    private function getUserReward(int $rewardId)
    {
        return UserReward::where([
            ['user_id', Auth::id()],
            ['reward_id', $rewardId]
        ])->first();
    }

    private function redeemReward(Reward $reward)
    {
        $userReward = new UserReward();
        $userReward->user_id = Auth::id();
        $userReward->reward_id = $reward->id;
        $userReward->save();

        $userLevel = UserLevel::where('user_id', auth()->user()->id)->first();

        if(!$userLevel) {
            $userLevel = new UserLevel();
            $userLevel->user_id = Auth::id();
            $userLevel->level = 1;
            $userLevel->experience_points += $reward->point_count;
            $userLevel->created_at = now();
            $userLevel->save();
        } else {
            $userLevel->level = 1;
            $userLevel->experience_points += $reward->point_count;
            $userLevel->save();
        }

        $userLevel = UserLevel::where('user_id', auth()->user()->id)->first();

        if($userLevel->experience_points > ($userLevel->level * 100)) {
            $userLevel->level = intdiv($userLevel->experience_points, ($userLevel->level * 100)) + 1;
            $userLevel->save();
        }

//        dd($answer);

//        if($answer > ) {
//            $userLevel->level = $userLevel->experience_points, ($userLevel->level * 100));
//            $userLevel->save();
//        }

//        activity()->withoutLogs(function () use ($reward) {
//            $user = User::find(Auth::id());
//            $user->total_points += $reward->point_count;
//            $user->save();
//        });
//
//        activity()
//            ->causedBy(auth()->id())
//            ->on($userReward)
//            ->event('redeemed')
//            ->withProperties(['attributes' => ['name' => $reward->name]])
//            ->log('redeemed');

        $this->emit('code:success', $reward->code);
        $this->dispatchBrowserEvent('rewardGiven', ['reward' => $reward]);
    }

    public function getCurrentUserPoints()
    {
        $this->points = auth()->user()->total_points;
    }

    public function mount()
    {
        $this->getCurrentUserPoints();
    }

    public function render()
    {
        return view('livewire.point-tracker');
    }
}
