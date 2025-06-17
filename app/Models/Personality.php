<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personality extends Model
{
    /** @use HasFactory<\Database\Factories\PersonalityFactory> */
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    public function pets(){
        return $this->belongsToMany(Pet::class);
    }
}
