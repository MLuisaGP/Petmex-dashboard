<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /** @use HasFactory<\Database\Factories\PetFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'birthdate',
        'rescue_date',
        'gender',
        'size',
        'history',
        'description',
        'image',
        'is_neutered',
        'adopted',
        'has_disability',
        'country',
        'state',
        'city',
        'life_stage_id',
        'specie_id',
        'rescuer_id',
        'owner_id',
    ];

    public function rescuer(){
        return $this->belongsTo(Person::class,'rescuer_id');
    }
    public function owner(){
        return $this->belongsTo(Person::class,'owner_id');
    }
    public function lifeStage(){
        return $this->belongsTo(LifeStage::class);
    }
    public function specie(){
        return $this->belongsTo(Specie::class);
    }

    public function personalities(){
        return $this->belongsToMany(Personality::class);
    }
}
