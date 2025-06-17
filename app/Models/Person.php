<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'email',
        'phone',
        'address',
        'country',
        'state',
        'city',
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
    public function rescuedPets(){
        return $this->hasMany(Pet::class,'rescuer_id');
    }
    public function adoptedPets(){
        return $this->hasMany(Pet::class,'owner_id');
    }

}
