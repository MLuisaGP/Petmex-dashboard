<?php

namespace Database\Seeders;

use App\Models\Personality;
use Illuminate\Database\Seeder;

class PersonalitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Personality::factory()->create(['name' => 'Friendly']);
        Personality::factory()->create(['name' => 'Playful']);
        Personality::factory()->create(['name' => 'Protective']);
        Personality::factory()->create(['name' => 'Curious']);
        Personality::factory()->create(['name' => 'Shy']);
        Personality::factory()->create(['name' => 'Energetic']);
        
    }
}
