<?php

namespace Database\Seeders;

use App\Models\Personality;
use App\Models\Pet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  'specie_id'=>Specie::inRandomOrder()->value('id'),
        Pet::factory(100)->create()->each(function ($pet) {
            $personality = Personality::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $pet->personalities()->attach($personality);
        });
        Pet::factory(50)->adopted()->create()->each(function ($pet) {
            $personality = Personality::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $pet->personalities()->attach($personality);
        });
    }
}
