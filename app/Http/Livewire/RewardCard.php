<?php

namespace App\Http\Livewire;

use App\Models\Reward;
use App\Models\UserReward;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RewardCard extends Component
{
    public $reward, $rewardReceived, $claimedOn;

    protected $listeners = ['rewardGiven' => 'reloadCard'];

    public function reloadCard($item) {
        if($item['id'] === $this->reward->id) {
            $userReward = UserReward::where([
                ['user_id', Auth::id()],
                ['reward_id', $item['id']]
            ])->first();

            if($userReward) {
                $this->rewardReceived = true;
                $this->claimedOn = Carbon::parse($userReward->created_at)->format('F j, Y', );
            }
        }
    }

    public function mount() {
        $this->reloadCard($this->reward);
    }

    public function render()
    {
        return view('livewire.reward-card');
    }
}
