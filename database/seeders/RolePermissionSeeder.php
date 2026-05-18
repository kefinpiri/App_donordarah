<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'manage users',
            'manage donors',
            'manage blood stock',
            'manage blood requests',
            'manage distributions',
            'view reports',

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $admin = Role::firstOrCreate([
            'name' => 'admin'
        ]);

        $petugas = Role::firstOrCreate([
            'name' => 'petugas'
        ]);

        $donor = Role::firstOrCreate([
            'name' => 'donor'
        ]);

        $pemohon = Role::firstOrCreate([
            'name' => 'pemohon'
        ]);

        $admin->givePermissionTo(Permission::all());

        $petugas->givePermissionTo([
            'manage blood stock',
            'manage blood requests',
            'manage distributions',
        ]);
    }
}
