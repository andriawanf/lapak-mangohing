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

        $user1 = User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdasdasd'),
            'confirm_password' => bcrypt('asdasdasd'),
            'is_active' => true
        ]);

        $user1->assignRole($roleAdmin);

        $user2 = User::create([
            'username' => 'Andriawan Firmansyah',
            'email' => 'andriawanf98@gmail.com',
            'password' => bcrypt('asdasdasd'),
            'confirm_password' => bcrypt('asdasdasd'),
            'is_active' => true
        ]);

        $user2->assignRole($roleUser);
    }
}
