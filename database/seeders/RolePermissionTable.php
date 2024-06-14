<?php

namespace Database\Seeders;

use App\Models\product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'customer']);

        $user = User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdasdasd'),
            'confirm_password' => bcrypt('asdasdasd'),
            'is_active' => true
        ]);

        $user->assignRole($roleAdmin);
    }
}
