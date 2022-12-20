<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(UserRole::ADMIN);
        if (!blank($role)) {
            $role->givePermissionTo(Permission::all());
        }

        $role = Role::find(UserRole::RESTAURANTOWNER);
        if (!blank($role)) {
            $restaurantOwnerPermission[]['name'] = 'dashboard';
            $restaurantOwnerPermission[]['name'] = 'role';
            $restaurantOwnerPermission[]['name'] = 'role_create';
            $restaurantOwnerPermission[]['name'] = 'role_show';


            $restaurantOwnerPermission[]['name'] = 'product';
            $restaurantOwnerPermission[]['name'] = 'product_create';
            $restaurantOwnerPermission[]['name'] = 'product_edit';
            $restaurantOwnerPermission[]['name'] = 'product_show';
            $restaurantOwnerPermission[]['name'] = 'product_delete';


            $permissions                         = Permission::whereIn('name', $restaurantOwnerPermission)->get();
            $role->givePermissionTo($permissions);
        }

        $role = Role::find(UserRole::CUSTOMER);
        if (!blank($role)) {
            $customerPermission[]['name'] = 'dashboard';
            $customerPermission[]['name'] = 'role_show';
            $customerPermission[]['name'] = 'product_show';

            $permissions                     = Permission::whereIn('name', $customerPermission)->get();
            $role->givePermissionTo($permissions);
        }
    }
}
