<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experiment_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->float('price')->nullable();
            $table->float('concentration')->nullable();
            $table->boolean('heat')->nullable();
            $table->float('water_temperature')->nullable();
            $table->float('water_rate')->nullable();
            $table->float('material_rate')->nullable();
            $table->float('staler_speed')->nullable();
            $table->integer('repeat')->nullable();
            $table->integer('staler_time')->nullable();
            $table->boolean('ph_adjustment')->nullable();
            $table->text('ph_material')->nullable();
            $table->float('ph_target')->nullable();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
