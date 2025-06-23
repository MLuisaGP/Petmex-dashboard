<?php

use App\Models\LifeStage;
use App\Models\Pet;
use App\Models\Specie;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pets', function () {
    $pets = Pet::with('specie')->latest()->paginate(15);
    return view('pets.index', ['pets' => $pets]);
})->name('pets.index');

Route::post('/pets', function () {
    request()->validate([
        'name'=>['required','min:3'],
        'birthday'=>['date'],
        'rescue_date'=>['date'],
        'gender'=>['required','in:male,female, unknown'],
        'size'=>['required','in:S,M,L,XL'],
        'life_stage'=>['required','integer'],
        'specie'=>['required','integer']
    ]);
    Pet::create([
            'name'=>request('name'),
            'birthdate'=>request('birthday'),
            'rescue_date'=>request('rescue_date'),
            'gender'=>request('gender'),
            'size'=>request('size'),
            'history'=>request('history'),
            'description'=>request('description'),
            'is_neutered'=>(bool)request('is_neutered',0),
            'has_disability'=>(bool)request('has_disability',0),
            'country'=>request('country'),
            'state'=>request('state'),
            'city'=>request('city'),
            'life_stage_id'=>request('life_stage'),
            'specie_id'=>request('specie'),
            'rescuer_id'=>1,
    ]);
    return redirect()->route('pets.index');
})->name('pets.store');

Route::put('/pets/{pet}', function (Pet $pet) {
    request()->validate([
        'name'=>['required','min:3'],
        'birthdate'=>['date'],
        'rescue_date'=>['date'],
        'gender'=>['required','in:male,female, unknown'],
        'size'=>['required','in:S,M,L,XL'],
        'life_stage'=>['required','integer'],
        'specie'=>['required','integer']
    ]); 
    $pet->update([
            'name'=>request('name'),
            'birthdate'=>request('birthdate'),
            'rescue_date'=>request('rescue_date'),
            'gender'=>request('gender'),
            'size'=>request('size'),
            'history'=>request('history'),
            'description'=>request('description'),
            'is_neutered'=>(bool)request('is_neutered',0),
            'has_disability'=>(bool)request('has_disability',0),
            'country'=>request('country'),
            'state'=>request('state'),
            'city'=>request('city'),
            'life_stage_id'=>request('life_stage'),
            'specie_id'=>request('specie'),
            'rescuer_id'=>1,
    ]);
    // dd('ok');
    return redirect('/pets');
})->name('pets.patch');

Route::delete('/pets/{pet}', function (Pet $pet) {
    $pet->delete();
    return redirect('/pets');
})->name('pets.delete');

Route::get('/pets/create', function () {
    $species = Specie::all();
    $lifeStages = LifeStage::all();
    return view('pets.create', ['species' => $species, 'lifeStages'=>$lifeStages]);
})->name('pets.create');

Route::get('/pets/{pet}', function (Pet $pet) {
    return view('pets.show', ['pet' => $pet]);
})->name('pets.show');

Route::get('/pets/{pet}/edit', function (Pet $pet) {
    $species = Specie::all();
    $lifeStages = LifeStage::all();
    return view('pets.edit', ['pet' => $pet,'species' => $species, 'lifeStages'=>$lifeStages]);
})->name('pets.edit');
