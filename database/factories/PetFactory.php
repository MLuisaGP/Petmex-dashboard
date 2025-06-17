<?php

namespace Database\Factories;

use App\Models\LifeStage;
use App\Models\Person;
use App\Models\Specie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->firstName(),
            'birthdate'=>fake()->date(),
            'rescue_date'=>fake()->date(),
            'gender'=>fake()->randomElement(['male','female','unknown']),
            'size'=>fake()->randomElement(['S','M','L','XL']),
            'history'=>fake()->paragraph(),
            'description'=>fake()->paragraph(),
            'image'=>fake()->imageUrl(width:640,height:480),
            'is_neutered'=>fake()->boolean(),
            'adopted'=>false,
            'has_disability'=>fake()->boolean(),
            'country'=>fake()->country(),
            'state'=>fake()->state(),
            'city'=>fake()->city(),
            'life_stage_id'=>LifeStage::inRandomOrder()->value('id'),
            'specie_id'=>Specie::inRandomOrder()->value('id'),
            'rescuer_id'=>Person::inRandomOrder()->value('id'),
            'owner_id'=>null
        ];
    }

    public function adopted():static{
        return $this->state(fn (array $attributes) => [
            'adopted' => true,
            'owner_id'=>Person::factory()
        ]);
    }
}
