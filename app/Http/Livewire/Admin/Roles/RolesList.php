<?php

namespace App\Http\Livewire\Admin\Roles;

use Spatie\Permission\Models\Role;
use Livewire\Component;

class RolesList extends Component
{
    public function render()
    {
        $roles = Role::with('permissions')->get();

//        dd($roles);

        return view('livewire.admin.roles.roles-list', [
            'roles' => $roles,
        ]);
    }
}
