<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.destroy']);
        Permission::create(['name' => 'users.change_role']);


        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.manage']);

        Permission::create(['name' => 'platforms.index']);
        Permission::create(['name' => 'platforms.manage']);

        //TODO
        Permission::create(['name' => 'shows.index']);
        Permission::create(['name' => 'shows.manage']);


        $userRole = Role::findByName(config('auth.roles.admin'));
        $userRole->givePermissionTo('users.index');
        $userRole->givePermissionTo('users.store');
        $userRole->givePermissionTo('users.destroy');
        $userRole->givePermissionTo('users.change_role');

        $userRole->givePermissionTo('categories.index');
        $userRole->givePermissionTo('categories.manage');

        $userRole->givePermissionTo('platforms.index');
        $userRole->givePermissionTo('platforms.manage');

        $userRole->givePermissionTo('shows.index');
        $userRole->givePermissionTo('shows.manage');

        // EDYTORA FILMÓW
        $userRole = Role::findByName(config('auth.roles.editor'));
        $userRole->givePermissionTo('categories.index');
        $userRole->givePermissionTo('categories.manage');

        $userRole->givePermissionTo('shows.index');
        $userRole->givePermissionTo('shows.manage');

        $userRole->givePermissionTo('platforms.index');


        // UŻYTKOWNIKA SYSTEMU
        $userRole = Role::findByName(config('auth.roles.user'));

    }
}
