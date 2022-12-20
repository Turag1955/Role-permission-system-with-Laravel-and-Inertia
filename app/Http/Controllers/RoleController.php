<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::whereNotIn('id', [UserRole::ADMIN])->get();
        $permissions          = Permission::get();
        return Inertia::render('Role', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function permissionShow(Role $role)
    {
        $role = Role::findOrFail($role->id);
        $permissions          = Permission::get();
        $rolePermission = $role->permissions->pluck('id', 'id');
        return Inertia::render('RolePermission', ['role' => $role, 'permissions' => $permissions, 'rolePermission' => $rolePermission]);
    }
    public function permission(Role $role, Permission $permission)
    {
        $role       = Role::findOrFail($role->id);
        $permission = Permission::where('id', $permission->id)->get();
        $role->givePermissionTo($permission);
        return redirect()->route('permission', $role);
    }

    public function permissionRemove(Role $role, Permission $permission)
    {
        $role       = Role::findOrFail($role->id);
        $permission = Permission::where('id', $permission->id)->get();
        $role->revokePermissionTo($permission);
        return redirect()->route('permission', $role);
    }
}
