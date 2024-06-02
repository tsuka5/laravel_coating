<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnzymeValuesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('enzyme_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('composition_id')
            ->references('id')->on('material_compositions')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('day')->nullable();
            $table->float('enzyme_activity')->nullable();
            $table->text('memo')->nullable();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enzyme_values');
    }
};
