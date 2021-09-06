<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;

class UserCard extends Component
{
    public $user, $index;

    public function render()
    {
        return view('livewire.admin.roles.user-card');
    }
}
