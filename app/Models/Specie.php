<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    /** @use HasFactory<\Database\Factories\SpeciesFactory> */
    use HasFactory;

    protected  $fillable=[
        'name',
        'description',
        'image',
    ];
    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
