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
        Schema::create('home_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teachers_id')->constrained('teachers','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('classrooms_id')->constrained('classrooms','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('periodes_id')->constrained('periodes','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('is_open')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_rooms');
    }
};
