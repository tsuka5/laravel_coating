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
            $table->bigInteger('bacteria_id')->nullable();
            $table->bigInteger('antibacteria_fruit_id')->nullable();
            $table->bigInteger('test_id')->nullable();
            $table->boolean('invivo_invitro')->nullable();
            $table->float('bacteria_concentration')->nullable();
            $table->float('mic')->nullable();
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
