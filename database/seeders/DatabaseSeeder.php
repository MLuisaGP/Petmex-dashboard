<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeed::class);
        $this->call(PersonalitySeed::class);
        $this->call(SpecieSeed::class);
        $this->call(LifeStageSeed::class);
        $this->call(PetSeed::class);
    }
}
