<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmConditionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('film_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experiment_id')
            ->references('id')->on('material_compositions')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('casting_amount')->nullable();
            $table->float('petri_dish_area')->nullable();
            $table->float('degas_temperature')->nullable();
            $table->float('drying_temperature')->nullable();
            $table->float('drying_humidity')->nullable();
            $table->float('drying_time')->nullable();
        });

        Schema::enableForeignKeyConstraints();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_conditions');
    }
};