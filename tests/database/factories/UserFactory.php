<?php

namespace BradyRenting\FilamentPasswordless\Tests\Database\Factories;

use BradyRenting\FilamentPasswordless\Tests\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->safeEmail,
        ];
    }
}
