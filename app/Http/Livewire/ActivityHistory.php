<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class ActivityHistory extends Component
{
    public function render()
    {
        $userActivities = Activity::where('causer_id', auth()->user()->id)
            ->orWhere('subject_id', auth()->user()->id)
            ->get();

        $history = collect();

        foreach($userActivities as $activity) {
            $type = $activity->subject_type;
            $causer = $activity->causer_id;
            $subject = $activity->subject_id;
            $description = $activity->description;

//            dd($activity);
            if($type === 'App\Models\User' && $subject === auth()->user()->id) {
                if($description === 'assigned') {
                    $history->prepend([
                        'type' => 'role',
                        'description' => 'Account <strong>' . auth()->user()->username . '</strong> was ' . $activity->event . ' as <strong>' . $activity->properties['attributes']['role'] . '</strong>',
                        'created_at' => Carbon::parse($activity->created_at)->format('F d, Y'),
                    ]);
                } else {
                    $history->prepend([
                        'type' => 'user',
                        'description' => 'Account <strong>' . auth()->user()->username . '</strong> was ' . $activity->event,
                        'created_at' => Carbon::parse($activity->created_at)->format('F d, Y'),
                    ]);
                }
            }
            if($type === 'App\Models\UserReward' && $causer === auth()->user()->id) {
                $history->prepend([
                    'type' => 'reward',
                    'description' => 'Reward <strong>' . $activity->properties['attributes']['name'] . '</strong> was ' . $activity->event,
                    'created_at' => Carbon::parse($activity->created_at)->format('F d, Y'),
                ]);
            }
        }
//        dd($history, $user);

        return view('livewire.activity-history', [
            'history' => $this->paginate($history, 15),
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
}
