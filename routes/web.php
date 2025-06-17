<?php

use App\Models\LifeStage;
use App\Models\Pet;
use App\Models\Specie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pets', function () {
    $pets = Pet::with('specie')->latest()->paginate(15);
    return view('pets.index', ['pets' => $pets]);
});
Route::post('/pets', function () {
    Pet::create([
            'name'=>request('name'),
            'birthdate'=>request('birthday'),
            'rescue_date'=>request('rescue_date'),
            'gender'=>request('gender'),
            'size'=>request('size'),
            'history'=>request('history'),
            'description'=>request('description'),
            'image'=>request('image'),
            'is_neutered'=>request('is_neutered')?1:0,
            'has_disability'=>request('has_disability')?1:0,
            'country'=>request('country'),
            'state'=>request('state'),
            'city'=>request('city'),
            'life_stage_id'=>request('lifestage_id'),
            'specie_id'=>request('specie_id'),
            'rescuer_id'=>1,
    ]);
    return redirect('/pets');
});
Route::get('/pet/create', function () {
    $species = Specie::all();
    $lifeStages = LifeStage::all();
    return view('pets.create', ['species' => $species, 'lifeStages'=>$lifeStages]);
});

Route::get('/pet/{id}', function ($id) {
    $pet = Pet::find($id);
    return view('pets.show', ['pet' => $pet]);
});
