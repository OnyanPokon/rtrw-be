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
        $role2 = Role::findOrCreate('kasir');

        // Permissions
        $permissions_admin = [
            'manajemen_produk',
            'manajemen_cabang',
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


        // Bendahara
        $kasir = User::create([
            'name' => 'kasir',
            'email' => 'kasir@app.id',
            'password' => bcrypt('password'),
        ]);

        $kasir_permissions = [
            'manajemen_produk',
        ];

        $kasir->assignRole('kasir');
        $kasir->givePermissionTo($kasir_permissions);

       
    }
}
