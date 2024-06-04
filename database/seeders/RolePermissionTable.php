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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdasdasd'),
        ]);

        $user->assignRole($roleAdmin);

        product::create([
            'product_name' => 'Makaroni Pedas',
            'product_number' => 'MK0001',
            'product_category' => 'Makaroni',
            'product_price' => 15000,
            'product_stock' => 100,
            'product_description' => 'Makaroni pedas makyuss',
            'discount_percentage' => 10,
            'minimum_order_amount' => 100000,
            'discount_period_start' => now(),
            'discount_period_end' => now(),
            'product_tag' => 'makaroni, pedas, makyuss',
            'product_weight' => 500,
            'product_length' => 100,
            'product_breadth' => 100,
            'product_width' => 100,
            'product_images' => 'default.jpg'
        ]);
    }
}
