<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $roles = [
            'admin' => Role::create(['name' => 'admin']),
            'petugas' => Role::create(['name' => 'petugas']),
            'manajer' => Role::create(['name' => 'manajer'])
        ];

        // Create permissions for admin
        $adminPermissions = [
            'create-users',
            'read-users',
            'update-users',
            'delete-users',
            'manage-roles',
            'manage-permissions',
            'view-reports'
        ];

        // Create permissions for petugas
        $petugasPermissions = [
            'create-inventory',
            'read-inventory',
            'update-inventory',
            'delete-inventory'
        ];

        // Create permissions for manajer
        $manajerPermissions = [
            'read-inventory',
            'view-reports',
            'approve-transactions'
        ];

        // Create all permissions
        $allPermissions = array_merge($adminPermissions, $petugasPermissions, $manajerPermissions);
        $uniquePermissions = array_unique($allPermissions);

        foreach ($uniquePermissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        foreach ($adminPermissions as $permission) {
            $roles['admin']->givePermissionTo($permission);
        }

        foreach ($petugasPermissions as $permission) {
            $roles['petugas']->givePermissionTo($permission);
        }

        foreach ($manajerPermissions as $permission) {
            $roles['manajer']->givePermissionTo($permission);
        }

        // Create default admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123')
        ]);
        $admin->assignRole('admin');

        // Create default petugas user
        $petugas = User::create([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'password' => bcrypt('password123')
        ]);
        $petugas->assignRole('petugas');

        // Create default manajer user
        $manajer = User::create([
            'name' => 'Manajer',
            'email' => 'manajer@example.com',
            'password' => bcrypt('password123')
        ]);
        $manajer->assignRole('manajer');
    }
}
