<?php

namespace Ocus\LaravelLaunchDarkly\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ocus\LaravelLaunchDarkly\Tests\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string|null
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
