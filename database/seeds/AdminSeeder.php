<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage-party',
            'reception',
            'receiving',
            'issuing',
            'bath-overview',
            'refine-monthly-overview',
            'testing-report',
            'edit-receiving',
            'fireassay',
            'refine',
            'stock',
            'ledger',
            'manage-user',
            'create-user',
            'edit-user',
            'delete-user',
            'roles',
            'roles-create',
            'roles-update',
            'roles-delete',
            'roles-permissions',
            'permissions',
            'permission-create',
            'permission-update',
            'permission-delete',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $operatorRole = Role::firstOrCreate(['name' => 'operator']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $adminRole->syncPermissions($permissions);

        $adminUser = User::updateOrCreate(
            ['email' => 'admin@chcgold.local'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        $adminUser->syncRoles([$adminRole]);
    }
}
