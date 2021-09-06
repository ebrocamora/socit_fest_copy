<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(Request $request) {
        return view('admin.roles');
    }

    public function viewRole(Request $request) {
        $request->only([
            'role'
        ]);

//        if(Gate::allows(''))
        $role = Role::where('name', $request->role)->first();

        if($role) {
            return view('admin.roles.view', compact('role'));
        }

        abort(404, 'Role not found');
    }

    public function viewRoles(Request $request)
    {
        return view('admin.roles');
    }
}
