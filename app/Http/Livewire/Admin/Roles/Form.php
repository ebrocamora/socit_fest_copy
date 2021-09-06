<?php

namespace App\Http\Livewire\Admin\Roles;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Livewire\Component;

class Form extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|min:3|unique:roles,name',
    ];

    protected $messages = [
        'name.unique' => 'The role already exists.'
    ];

    public function submit()
    {
        if(Gate::allows('role:create')) {
            $validatedData = $this->validate();

            $role = Role::create([
                'name' => $this->name,
            ]);

            $this->name = '';
            return $this->emit('status', [
                'type' => 'success',
                'title' => 'Role "' . $role->name . '" was created.',
                'toast' => true,
            ]);
        }

        return $this->emit('status', [
            'type' => 'error',
            'title' => 'You are not allowed to create roles',
            'toast' => true,
        ]);

    }
    public function render()
    {
        return view('livewire.admin.roles.form');
    }
}
