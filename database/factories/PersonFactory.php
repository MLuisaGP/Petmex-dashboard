<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=>fake()->firstName(),
            'last_name'=>fake()->lastName(),
            'birthdate'=>fake()->date(),
            'gender'=>fake()->randomElement(['male','female','other']),
            'email'=>fake()->email(),
            'phone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'country'=>fake()->country(),
            'state'=>fake()->state(),
            'city'=>fake()->city(),
        ];
    }


}
