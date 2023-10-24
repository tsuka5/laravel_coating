<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntibacteriaTestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('antibacteria_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experiment_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->float('bacteria_rate')->nullable();
            $table->float('moisture_content')->nullable();
            $table->binary('afm')->nullable();
            $table->binary('sem')->nullable();
            $table->binary('dsc')->nullable();
            $table->binary('ftir')->nullable();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antibacteria_test');
    }
};
