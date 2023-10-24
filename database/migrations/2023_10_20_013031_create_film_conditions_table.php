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
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('degassing_temperature')->nullable();
            $table->text('dish_type')->nullable();
            $table->float('dish_area')->nullable();
            $table->float('casting_ml')->nullable();
            $table->text('incubator_type')->nullable();
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
