<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin   = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);

        $permission_read   = Permission::create(['name' => 'read articles']);
        $permission_edit   = Permission::create(['name' => 'edit articles']);
        $permission_write  = Permission::create(['name' => 'write articles']);
        $permission_delete = Permission::create(['name' => 'delete articles']);

        $permission_user = Permission::create(['name' => 'user']);
        $permission_role = Permission::create(['name' => 'role']);

        $permissions_admin = [$permission_read, $permission_edit, $permission_write, $permission_delete,$permission_user,$permission_role];


        $admin->syncPermissions($permissions_admin);
        $manager->givePermissionTo($permission_read);
    }
}
