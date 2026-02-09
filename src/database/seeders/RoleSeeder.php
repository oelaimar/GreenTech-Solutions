<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'create_post',
            'edit_post',
            'delete_post',
            'ban_user',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'name' => $perm
            ]);
        }

        // Fetch permissions
        $allPermissions = Permission::all();

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $moderator = Role::firstOrCreate(['name' => 'Moderator']);

        // Attach permissions
        $admin->permissions()->sync($allPermissions->pluck('id'));

        $moderator->permissions()->sync(
            Permission::whereIn('name', ['edit_post', 'delete_post'])->pluck('id')
        );
    }
}
