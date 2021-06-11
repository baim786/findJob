<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create permissions
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'delete post']);
        Permission::create(['name' => 'show post']);
        Permission::create(['name' => 'all posts']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'admin dashboard']);

        // create roles and Assign permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo(['delete post', 'show post', 'all posts', 'dashboard']);

        // Create Users and Assign role
        $user = User::create([
            'name' => 'Ibrahim',
            'email' => 'ibrahim@example.com',
            'password' => Hash::make('1234567'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'amer',
            'email' => 'amer@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');
    }
}
