<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnzymeTestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('enzyme_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experiment_id')
            ->references('id')->on('experiments')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->bigInteger('enzyme_id')->nullable();
            $table->float('enzyme_concentration')->nullable();
            $table->bigInteger('substrate_id')->nullable();
            $table->float('substrate_concentration')->nullable();
            $table->float('ph')->nullable();
            $table->float('temperature')->nullable();
            $table->float('volume')->nullable();
            $table->float('time')->nullable();
            $table->text('memo')->nullable();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enzyme_tests');
    }
};
