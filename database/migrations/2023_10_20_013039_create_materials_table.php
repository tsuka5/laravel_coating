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
            $table->foreignId('composition_id')
            ->references('id')->on('material_compositions')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->bigInteger('material_id')->nullable();
            $table->float('concentration')->nullable();
            $table->bigInteger('solvent_id')->nullable();
            $table->float('solvent_concentration')->nullable();
            $table->boolean('ph_adjustment')->nullable();
            $table->bigInteger('ph_material_id')->nullable();
            $table->float('ph_purpose')->nullable();
            $table->text('memo')->nullable();
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
