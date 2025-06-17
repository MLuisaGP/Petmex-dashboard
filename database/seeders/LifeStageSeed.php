<?php

namespace Database\Seeders;

use App\Models\LifeStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LifeStageSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LifeStage::factory()->create(['name' => 'Poppy' , 'min_age'=>'0','max_age'=>'1']);
        LifeStage::factory()->create(['name' => 'Young' , 'min_age'=>'2','max_age'=>'3']);
        LifeStage::factory()->create(['name' => 'Adult' , 'min_age'=>'4','max_age'=>'7']);
        LifeStage::factory()->create(['name' => 'Senior', 'min_age'=>'8','max_age'=>'100']);
    }
}
