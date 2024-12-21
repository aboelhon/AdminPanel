<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin\Admin;
use App\Models\Supervisor\Supervisor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::factory()->create([
            'name' => 'Admin Hany',
            'email' => 'hany@msn.com',
            'password' => Hash::make('123456'),
            'username' => 'admin',
            'picture' => 'admin/admin/photo/default.jpg',
            'address' => 'Saad Abn Aby Wakkas Ard El gamaya  , Imbaba',
            'phone' => '01064229395',
            'birthdate' => date_format(date_create("1987-02-15"), "Y/m/d H:i:s"),
            'role' => 'admin',
            'status' => 'active',
            'by' => 'admin',
            'ip_address' => request()->ip(),
        ]);
        Supervisor::factory()->create([
            'name' => 'Supervisor Hany',
            'email' => 'supervisor@msn.com',
            'password' => Hash::make('123456'),
            'username' => 'admin',
            'picture' => 'admin/supervisor/photo/default.jpg',
            'address' => 'Saad Abn Aby Wakkas Ard El gamaya  , Imbaba',
            'phone' => '01064229395',
            'birthdate' => date_format(date_create("1987-02-15"), "Y/m/d H:i:s"),
            'role' => 'supervisor',
            'status' => 'active',
            'by' => 'admin',
            'ip_address' => request()->ip(),
        ]);
        // Admin::factory(5)->create();
    }
}
