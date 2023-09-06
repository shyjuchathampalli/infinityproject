<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['view-dashboard','product_list','product-create','product-edit','product-delete'];

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }
}
