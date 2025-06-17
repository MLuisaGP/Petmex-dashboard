<?php

use App\Models\LifeStage;
use App\Models\Person;
use App\Models\Specie;
use App\Models\Species;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthdate')->nullable();
            $table->date('rescue_date')->nullable();
            $table->enum('gender',['male','female','unknown']);
            $table->enum('size',['S','M','L','XL'])->nullable();
            $table->text('history');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_neutered');//esterilizado
            $table->boolean('adopted')->default(false);
            $table->boolean('has_disability')->default(false);
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->foreignIdFor(LifeStage::class);
            $table->foreignIdFor(Specie::class);
            $table->foreignIdFor(Person::class,'rescuer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Person::class,'owner_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
