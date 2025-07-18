<?php

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
        Schema::create('personalities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('personality_pet', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Personality::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(App\Models\Pet::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalities');
        Schema::dropIfExists('personality_pet');
    }
};
