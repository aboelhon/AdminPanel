<?php

namespace Database\Factories\Supervisor;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supervisor\Supervisor>
 */
class SupervisorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
