<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role
        $role1 = Role::findOrCreate('admin');

        // Permissions
        $permissions_admin = [
            'manajemen_wilayah',
            'manajemen_polaruang',
            'manajemen_klasifikasi',
            'manajemen_rtrw',
            'manajemen_periode',
            'manajemen_dasar_hukum',
        ];

        foreach ($permissions_admin as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        $role1->givePermissionTo($permissions_admin);

        // Admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@app.id',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');


       
    }
}
