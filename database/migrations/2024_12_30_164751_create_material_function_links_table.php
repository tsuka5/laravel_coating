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
        Schema::create('material_function_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained('material_details')->cascadeOnDelete();
            $table->foreignId('function_id')->constrained('material_functions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_function_links');
    }
};
