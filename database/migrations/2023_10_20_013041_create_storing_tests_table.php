<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoringTestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('storing_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experiment_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('s_name')->nullable();
            $table->integer('storing_days')->nullable();
            $table->float('mass_loss_rate')->nullable();
            $table->float('color_l')->nullable();
            $table->float('color_a')->nullable();
            $table->float('color_b')->nullable();
            $table->float('color_e')->nullable();
            $table->float('ph')->nullable();
            $table->float('tss')->nullable();
            $table->float('hardness')->nullable();
            $table->float('moisture_content')->nullable();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storing_tests');
    }
};
