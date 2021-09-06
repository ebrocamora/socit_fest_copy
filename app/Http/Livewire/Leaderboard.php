<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserReward;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Leaderboard extends Component
{
    use WithPagination;

    public function render()
    {

//        $users = Cache::remember('users', 60, function() {
//            return User::withCount('reward', 'referral', 'referrer')
//                ->orderBy('total_points', 'DESC')
//                ->get();
//        });

        $users = User::withCount('reward', 'referral', 'referrer')
            ->orderBy('total_points', 'DESC')
//            ->withoutBanned()
            ->get();

        $usersCollection = collect();

//        $users = User::with(['reward', 'referral', 'referrer'])->get();

        foreach($users as $index => $user) {
            $points = $user->total_points;
            $usersCollection->push([
                'position' => $index,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'points' => $points,
            ]);
        }

        return view('livewire.leaderboard', [
            'users' => $this->paginate($usersCollection, 15),
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     *
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, int $perPage = 5, $page = null, $options = []): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function getPositionColorClass(array $user) {
        switch($user['position']) {
            case 0:
                return "text-yellow-300 glowing-gold";
            case 1:
                return "text-gray-300";
            case 2:
                return "text-yellow-600";
            default:
                return "text-white";
        }
    }
}
