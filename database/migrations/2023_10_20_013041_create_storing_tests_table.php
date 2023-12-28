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
            $table->bigInteger('storing_fruit_id')->nullable();
            $table->float('storing_temperature')->nullable();
            $table->float('storing_humidity')->nullable();
            $table->integer('storing_day')->nullable();
            $table->float('mass_loss_rate')->nullable();
            $table->float('l')->nullable();
            $table->float('a')->nullable();
            $table->float('b')->nullable();
            $table->float('e')->nullable();
            $table->float('ph')->nullable();
            $table->float('tss')->nullable();
            $table->float('hardness')->nullable();
            $table->float('moisture_content')->nullable();
            $table->float('ta')->nullable();
            $table->float('vitamin_c')->nullable();
            $table->float('rr')->nullable();
            $table->text('sem')->nullable();
            $table->text('clsm')->nullable();
            $table->text('afm')->nullable();
            $table->text('ftir')->nullable();
            $table->text('dsc')->nullable();
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
