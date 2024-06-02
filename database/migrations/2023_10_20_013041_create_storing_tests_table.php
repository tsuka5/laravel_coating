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
            ->references('id')->on('experiments')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->bigInteger('storing_fruit_id')->nullable();
            $table->float('storing_temperature')->nullable();
            $table->float('storing_humidity')->nullable();
            $table->float('storing_day')->nullable();
            $table->text('memo')->nullable();
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
