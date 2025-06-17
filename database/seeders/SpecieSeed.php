<?php

namespace Database\Seeders;

use App\Models\Specie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecieSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specie::factory()->create(['name' => 'Dog']);
        Specie::factory()->create(['name' => 'Cat']);
    }
}
