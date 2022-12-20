<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;

        $permissionArray[$i]['name']       = 'dashboard';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_edit';
        $permissionArray[$i]['guard_name'] = 'web';
        $i++;
        $permissionArray[$i]['name']       = 'role_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'product';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'product_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'product_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'product_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'product_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'user';
        $permissionArray[$i]['guard_name'] = 'web';

        Permission::insert($permissionArray);
    }
}
