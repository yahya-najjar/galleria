<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@galleria.com',
            'username' => 'admin.galleria',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $admin = Admin::first();

        $Admin = Role::findOrCreate('Admin');
        $admin->syncRoles($Admin->id);

        foreach ( config('permission.permissions') as $permission) {
            Permission::findOrCreate($permission);
            $Admin->givePermissionTo($permission);
        }

    }
}
