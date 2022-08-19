<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'account_number' => $this->faker->randomNumber(5, true),
            'email' => $this->faker->userName . '@mailhog.local',
            'type' => $this->faker->randomElement(['common', 'shopkeeper']),
            'document' => $this->setDocumet(),
            'password' => $this->faker->password,
        ];
    }

    public function setDocumet(): string
    {
        return strval(rand(11111111111, 99999999999));
    }
}
