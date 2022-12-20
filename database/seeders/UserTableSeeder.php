<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'     => 'Josep Entony',
            'email'    => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $role     = Role::find(UserRole::ADMIN);
        $admin->assignRole($role->name);

        $restaurnOwner = User::create([
            'name'     => 'John Doh',
            'email'    => 'restaurantowner@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $role     = Role::find(UserRole::RESTAURANTOWNER);
        $restaurnOwner->assignRole($role->name);

        $customer = User::create([
            'name'     => 'Alex Joh',
            'email'    => 'customer@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $role     = Role::find(UserRole::CUSTOMER);
        $customer->assignRole($role->name);
    }
}
