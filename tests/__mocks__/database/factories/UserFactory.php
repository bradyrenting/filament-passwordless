<?php

namespace BradyRenting\FilamentPasswordless\Tests\__mocks__\database\factories;

use BradyRenting\FilamentPasswordless\Tests\__mocks__\Models\User;
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
