<?php

namespace App\Http\Livewire\Game;

use App\Models\UserLevel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Experience extends Component
{
    public $exp, $lvl, $ratio;

    public $listeners = ['code:success' => 'getExperience'];

    public function getExperience() {
        $userLevel = UserLevel::where('user_id', auth()->user()->id)->first();

        if(!$userLevel) {
            $userLevel = new UserLevel();
            $userLevel->user_id = Auth::id();
            $userLevel->created_at = now();
            $userLevel->save();
        }
        $this->exp = $userLevel->experience_points;
        $this->lvl = $userLevel->level * 100;
        if($this->exp / $this->lvl === 0) {
            $this->ratio = 0;
        } else {
            $this->ratio = $this->exp / $this->lvl;
        }

//        dd($this->ratio);
    }

    public function mount() {
        $this->getExperience();
    }

    public function render()
    {
        return view('livewire.game.experience');
    }
}
