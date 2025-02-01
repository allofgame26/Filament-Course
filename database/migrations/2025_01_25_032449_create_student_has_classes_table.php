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
        Schema::create('student_has_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('students_id')->constrained('students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('homerooms_id')->constrained('home_rooms','id')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('student_has_classes');
    }
};
