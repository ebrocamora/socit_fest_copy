<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for rewards
        Permission::create(['name' => 'rewards:redeem']);
        Permission::create(['name' => 'rewards:create']);
        Permission::create(['name' => 'rewards:read']);
        Permission::create(['name' => 'rewards:update']);
        Permission::create(['name' => 'rewards:delete']);

        // create permissions for roles
        Permission::create(['name' => 'role:create']);
        Permission::create(['name' => 'role:read']);
        Permission::create(['name' => 'role:update']);
        Permission::create(['name' => 'role:delete']);
        Permission::create(['name' => 'role:assign']);

        // create permissions for accounts
        Permission::create(['name' => 'account:create']);
        Permission::create(['name' => 'account:read']);
        Permission::create(['name' => 'account:update']);
        Permission::create(['name' => 'account:delete']);

        // create role 'Super-Admin' which gets all permissions granted
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);

        // create role 'Admin' and give permissions
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('role:create');
        $roleAdmin->givePermissionTo('role:read');
        $roleAdmin->givePermissionTo('role:update');
        $roleAdmin->givePermissionTo('role:delete');
        $roleAdmin->givePermissionTo('role:assign');
        $roleAdmin->givePermissionTo('rewards:redeem');
        $roleAdmin->givePermissionTo('rewards:create');
        $roleAdmin->givePermissionTo('rewards:read');
        $roleAdmin->givePermissionTo('rewards:update');
        $roleAdmin->givePermissionTo('rewards:delete');
        $roleAdmin->givePermissionTo('account:create');
        $roleAdmin->givePermissionTo('account:read');
        $roleAdmin->givePermissionTo('account:update');
        $roleAdmin->givePermissionTo('account:delete');

        // create role 'Guest' and give permissions
        $roleGuest = Role::create(['name' => 'guest']);
        $roleGuest->givePermissionTo('rewards:redeem');
        $roleGuest->givePermissionTo('rewards:read');
        $roleGuest->givePermissionTo('account:create');
        $roleGuest->givePermissionTo('account:read');
        $roleGuest->givePermissionTo('account:update');
        $roleGuest->givePermissionTo('account:delete');

        // create super-admin account
        $user = User::create([
            'first_name' => 'admin',
            'last_name' => 'account',
            'email' => 'admin@apc.edu.ph',
            'username' => 'admin',
            'password' => bcrypt('admin2021'),
        ]);

        $user->assignRole($roleSuperAdmin);

        $userLevel = UserLevel::create([
           'user_id' => $user->id,
        ]);

        // create guest account
        $user = User::create([
            'first_name' => 'student',
            'last_name' => 'account',
            'email' => 'student@student.apc.edu.ph',
            'username' => 'student',
            'password' => bcrypt('guest2021'),
        ]);

        $user->assignRole($roleGuest);

        $userLevel = UserLevel::create([
            'user_id' => $user->id,
        ]);
    }
}
