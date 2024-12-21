<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => 'Hany Mohamed Sabry',
            // 'email' => 'hany@msn.com',
            // 'password' => Hash::make('123456'),
            // 'username' => 'admin',
            // 'picture' => 'default.jpg',
            // 'address' => 'Saad Abn Aby Wakkas Ard El gamaya  , Imbaba',
            // 'phone' => '01064229395',
            // 'birthdate' => date_format(date_create("1987-02-15"),"Y/m/d H:i:s"),
            // 'role' => 'admin',
            // 'status' => 'active',
            // 'by' => 'admin',
            // 'ip_address' => '127.0.0.1',

            'name' => fake()->name(),
            'email' => fake()->freeEmail(),
            'password' => Hash::make('123456'),
            'username' => fake()->username(),
            'picture' => 'admin/admin/photo/default.jpg',
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'birthdate' => fake()->date(),
            'role' => 'admin',
            'status' => 'active',
            'by' => 'admin',
            'ip_address' => fake()->ipv4(),
        ];
    }
}
