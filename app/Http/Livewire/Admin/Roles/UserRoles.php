<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRoles extends Component
{
    public $users;

//    protected $listeners = [''];

    /**
     * Mount the users
     */
    public function mount()
    {
        $this->users = User::all();
    }

    /**
     * Render component
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.admin.roles.user-roles');
    }
}
