<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateEditorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Editor User',
            'email' => 'teststoreeditor@gmail.com',
            'password' =>bcrypt('editor2023!')
        ]);

        $role = Role::create(['name'=>'Editor']);

        $permissions = Permission::pluck('id','id')->except([1])->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
